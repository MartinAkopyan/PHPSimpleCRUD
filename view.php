<?php
ob_start();
require __DIR__ . '/users/users.php';
include __DIR__ . '/partials/header.php';

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

$errors = [
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
];

$isValid = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = array_merge($user, $_POST);

    // Validation
    if (!$user['name']) {
        $isValid = false;
        $errors['name'] = 'Name is required';
    }

    if (!$user['username'] || strlen($user['username']) < 6 || strlen($user['username']) > 16) {
        $isValid = false;
        $errors['username'] = 'Username must be between 6-16 characters';
    }

    if (!$user['email'] || !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $errors['email'] = 'Email is required and must be a valid email address';
    }

    if ($user['phone'] && !filter_var($user['phone'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['phone'] = 'Phone number must be a valid phone number';
    }

    if ($isValid) {
        $user = updateUser($_POST, $userId);
        uploadImage($_FILES['avatar'], $user);
        header("Location: index.php");
        exit;
    }
}
?>

<?php include '_form.php' ?>

<?php ob_end_flush(); ?>
<?php include __DIR__ . '/partials/footer.php'; ?>