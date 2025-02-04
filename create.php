<?php
require __DIR__ . '/users/users.php';

$user = [
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
];

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

    if (!$user['name']) {
        $isValid = false;
        $user['name'] = '';
        $errors['name'] = 'Name is required';
    }

    if (!$user['username'] || strlen($user['username']) < 6 || strlen($user['username']) > 16) {
        $isValid = false;
        $user['username'] = '';
        $errors['username'] = 'Username must be between 6-16 characters';
    }

    if (!$user['email'] || !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $user['email'] = '';
        $errors['email'] = 'Email is required and must be a valid email address';
    }

    if ($user['phone'] && !filter_var($user['phone'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $user['phone'] = '';
        $errors['phone'] = 'Phone number must be a valid phone number';
    }

    if ($isValid) {
        $user = createUser($_POST);
        uploadImage($_FILES['avatar'], $user);
        header('Location: index.php');
    }
}

include __DIR__ . '/partials/header.php';
?>

<?php include '_form.php'?>


<?php include __DIR__ . '/partials/footer.php'; ?>
