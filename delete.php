<?php
require __DIR__ . '/users/users.php';

if (!isset($_GET['id'])) {
    include 'partials/not_found.php';
    exit;
}

$userId = $_GET['id'];
$user = getUserById($userId);

if (!$user) {
    include 'partials/not_found.php';
    exit;
}
deleteUser($userId);

header('Location: index.php');

var_dump($userId);
