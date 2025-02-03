<?php
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
?>

<div class="container">
    <form method="POST" action="update.php?id=<?= $user['id'] ?>" enctype="multipart/form-data" class="mt-5 card p-4">
        <div class="card-header mb-4">
            <h1>Update user</h1>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?= $user['name'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username:</label>
            <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>"">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone:</label>
            <input type="text" name="phone" class="form-control" value="<?= $user['phone'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Website:</label>
            <input type="text" name="website" class="form-control" value="<?= $user['website'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image:</label>
            <input type="file" name="avatar" class="form-control">
        </div>
        <div class="d-flex gap-3">
            <button class="btn btn-primary" type="submit">Update</button>
            <a href="/delete.php?id=<?= $user['id'] ?>" class="btn btn-outline-danger">
                Delete
            </a>
        </div>
    </form>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
