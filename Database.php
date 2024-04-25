<?php

class Database {
    public $conn;

    public function __construct($config) {

        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password']);
            // echo "Connection established!";
        } catch (PDOException $e) {
            throw new Exception("Database connection failed:{$e->getMessage()}");
        }
    }

    public function query($query) {
        try {
            $sth = $this->conn->prepare($query);
            $sth->execute();
            return $sth;
        } catch (PDOException $e) {
            throw new Exception("Database connection failed:{$e->getMessage()}");
        }
    }
}


