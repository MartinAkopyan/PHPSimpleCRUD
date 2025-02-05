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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = array_merge($user, $_POST);

    $isValid = validateUser($user,$errors);


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
