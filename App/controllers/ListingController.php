<?php

namespace App\controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;
use Framework\Authorisation;
use Framework\MiddleWare\Authorise;

class ListingController {

    protected $db;

    public function __construct() {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index() {
//        $listing = $this->db->query('SELECT * FROM listing ORDER BY created_at DESC')->fetchAll(\PDO::FETCH_OBJ);
        $listing = $this->db->query('SELECT * FROM listing ORDER BY created_at DESC')->fetchAll();
        loadView('listings/index', [
            'listings' => $listing
        ]);
    }


    public function publish() {
        loadView('listings/publish');
    }

    public function detail($params) {
        $id = isset($params['id']) ? $params['id'] : '';
        $params = [
            'id' => $id
        ];
        $listing = $this->db->query('SELECT * FROM listing WHERE id = :id', $params)->fetch();
        if (!$listing) {
            ErrorController::notFound("The occupation does not exist!");
            return;
        }
        loadView('listings/detail', [
            'listing' => $listing
        ]);
    }

    public function store() {
        $errors = [];
        $allowedFields = ['title', 'description', 'salary', 'tags', 'company', 'address', 'city', 'state', 'phone', 'email', 'requirements', 'benefits'];
        $newListingData = array_intersect_key($_POST, array_flip($allowedFields));
        $newListingData['user_id'] = Session::get('user')['id'];
        $newListingData = array_map('sanitize', $newListingData);
        $requiredFields = ['title', 'description', 'email', 'city', 'state'];

        foreach ($requiredFields as $field) {
            if (empty($newListingData[$field]) || !is_string($newListingData[$field])) {
                $errors[$field] = ucfirst($field) . ' is required.';
            }
        }

        if (!empty($errors)) {
            loadView('listings/publish', [
                'errors' => $errors,
                'listing' => $newListingData
            ]);
        } else {
            $fields = [];
            foreach ($newListingData as $field => $value) {
                $fields[] = $field;
            }
            $fields = implode(', ', $fields);
            $values = [];
            foreach ($newListingData as $field => $value) {
                if ($value === '') {
                    $newListingData[$field] = null;
                }
                $values[] = ':' . $field;
            }
            $values = implode(', ', $values);
            $query = "INSERT INTO listing ({$fields}) VALUES ({$values})";
            $this->db->query($query, $newListingData);
            Session::setFlashMessage('success_message', 'Job Published!');
            redirect('/public/listings');
        }
    }

    public function destroy($params) {
        $id = $params['id'];
        $params = [
            'id' => $id
        ];
        $listing = $this->db->query('SELECT * FROM listing WHERE id = :id', $params)->fetch();
        if (!$listing) {
            ErrorController::notFound("The occupation does not exist!");
            return;
        }
        if (!Authorisation::isOwner($listing['user_id'])) {
            Session::setFlashMessage('error_message', 'You do not have permission to delete this listing!');
            return redirect('/public/listings/' . $listing['id']);
        }
        $this->db->query('DELETE FROM listing WHERE id = :id', $params);
        Session::setFlashMessage('success_message', 'The occupation was successfully deleted!');
        redirect('/public/listings');
    }

    public function edit($params) {
        $id = isset($params['id']) ? $params['id'] : '';
        $params = [
            'id' => $id
        ];
        $listing = $this->db->query('SELECT * FROM listing WHERE id = :id', $params)->fetch();
        if (!$listing) {
            ErrorController::notFound("The occupation does not exist!");
            return;
        }


        if (!Authorisation::isOwner($listing['user_id'])) {
            Session::setFlashMessage('error_message', 'You do not have permission to edit this listing!');
            return redirect('/public/listings/' . $listing['id']);
        }

        loadView('listings/edit', [
            'listing' => $listing
        ]);

    }

    public function update($params) {
        $id = isset($params['id']) ? $params['id'] : '';
        $params = [
            'id' => $id
        ];
        $listing = $this->db->query('SELECT * FROM listing WHERE id = :id', $params)->fetch();
        if (!$listing) {
            ErrorController::notFound("The occupation does not exist!");
            return;
        }
        $allowedFields = ['title', 'description', 'salary', 'tags', 'company', 'address', 'city', 'state', 'phone', 'email', 'requirements', 'benefits'];
        $updateValues = array_intersect_key($_POST, array_flip($allowedFields));
        $updateValues = array_map('sanitize', $updateValues);
        $requiredFields = ['title', 'description', 'email', 'city', 'state'];
        $error = [];
        foreach ($requiredFields as $field) {
            if (empty($updateValues[$field]) || !Validation::string($updateValues[$field])) {
                $errors[$field] = ucfirst($field) . ' is required.';
            }
        }

        if (!empty($errors)) {
            loadView('listings/edit', [
                'errors' => $errors,
                'listing' => $updateValues
            ]);
            exit;
        } else {
            $updateFields = [];
            foreach (array_keys($updateValues) as $array_key) {
                $updateFields[] = $array_key . ' = :' . $array_key;
            }
            $updateFields = implode(', ', $updateFields);
            $updateQuery = "UPDATE listing SET {$updateFields} WHERE id = :id";
            $updateValues['id'] = $id;
            $this->db->query($updateQuery, $updateValues);
            Session::setFlashMessage('success_message', 'The occupation was successfully updated!');
            redirect('/public/listings/' . $id);
        }
    }

    public function search() {
        // Retrieve keywords and location from GET request, defaulting to empty strings if not provided
        $keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';
        $location = isset($_GET['location']) ? trim($_GET['location']) : '';

        // Construct SQL query to search for listings with keywords in title, description, tags, or company name, and location in city or province
        $query = "
            SELECT * FROM listing WHERE 
            (title LIKE :keywords OR description LIKE :keywords OR tags LIKE :keywords OR company LIKE :keywords) AND 
            (city LIKE :location OR province LIKE :location)
        ";

        // Prepare query parameters, adding wildcard characters for partial matches
        $params = [
            'keywords' => "%{$keywords}%",
            'location' => "%{$location}%"
        ];

        // Execute the query and fetch all matching records
        $listings = $this->db->query($query, $params)->fetchAll();
        // Load the view to display listings, passing the listings and search criteria
        loadView('listings/index', [
            'listings' => $listings,
            'keywords' => $keywords,
            'location' => $location
        ]);
    }

}