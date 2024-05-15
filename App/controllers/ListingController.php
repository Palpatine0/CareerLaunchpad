<?php

namespace App\controllers;

use Framework\Database;
use Framework\Validation;

class ListingController {

    protected $db;

    public function __construct() {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index() {
        $listing = $this->db->query('SELECT * FROM listing')->fetchAll(\PDO::FETCH_OBJ);
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
        $newListingData['user_id'] = 1;
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
        $this->db->query('DELETE FROM listing WHERE id = :id', $params);
        $_SESSION['success_message'] = "The occupation was successfully deleted!";
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
            $_SESSION['success_message'] = "The occupation was successfully updated!";
            redirect('/public/listings/' . $id);
        }
    }

}