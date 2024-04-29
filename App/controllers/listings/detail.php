<?php
$config = require basePath('config/db.php');
$db = new Database($config);

//$id = $_GET['id'] ?? '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

$params = [
    'id' => $id
];

$listing = $db->query('SELECT * FROM listing WHERE id = :id', $params)->fetch();
loadView('listings/detail',
    ['listing' => $listing]
);