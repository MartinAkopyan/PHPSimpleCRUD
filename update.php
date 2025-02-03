<?php
require __DIR__ . '/users/users.php';

if (!isset($_GET['id'])) {
    include 'partials/not_found.php';
    exit;
}

$userId = $_GET['id'];

$user = updateUser($_POST, $userId);
if (isset($_FILES['avatar'])) {
    if (!is_dir(__DIR__ . '/users/images/')) {
        mkdir(__DIR__ . '/users/images/');
    }
    $fileName = $_FILES['avatar']['name'];
    $dotPosition = strrpos($fileName, '.');
    $extension = substr($fileName, $dotPosition + 1);
    $filePath = __DIR__ . '/users/images/' . $userId . '.' . $extension;
    move_uploaded_file($_FILES['avatar']['tmp_name'], $filePath);
    $user['extension'] = $extension;
    updateUser($user, $userId);
}
header("Location: index.php");


