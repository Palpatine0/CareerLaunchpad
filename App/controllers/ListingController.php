<?php

namespace App\Controllers;

use Framework\Database;

class ListingController {

    protected $db;

    public function __construct() {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index() {
        $listing = $this->db->query('SELECT * FROM listing')->fetchAll();
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
}