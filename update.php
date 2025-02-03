<?php
require __DIR__ . '/users/users.php';

if (!isset($_GET['id'])) {
    include 'partials/not_found.php';
    exit;
}

$userId = $_GET['id'];

$user = updateUser($_POST, $userId);
uploadImage($_FILES['avatar'], $user);

header("Location: index.php");


