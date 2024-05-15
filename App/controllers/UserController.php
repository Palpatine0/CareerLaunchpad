<?php

namespace App\controllers;

use Framework\Database;
use Framework\Validation;

class UserController {
    protected $db;

    /**
     * @return mixed
     */
    public function __construct() {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function login() {
        loadView('user/login');
    }

    public function register() {
        loadView('user/register');
    }
}
