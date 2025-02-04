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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = array_merge($user, $_POST);

    $isValid = validateUser($user,$errors);

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