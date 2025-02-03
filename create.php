<?php
require __DIR__ . '/users/users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = createUser($_POST);
    uploadImage($_FILES['avatar'], $user);

    header('Location: index.php');
}

include __DIR__ . '/partials/header.php';
?>

<div class="container">
    <form method="POST" action="" enctype="multipart/form-data" class="mt-5 card p-4">
        <div class="card-header mb-4">
            <h1>Create user</h1>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username:</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone:</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Website:</label>
            <input type="text" name="website" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image:</label>
            <input type="file" name="avatar" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit">Create</button>
    </form>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
