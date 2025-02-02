<?php
require __DIR__ . '/users.php';

$userId = $_GET['id'];
$user = getUserById($userId);

?>
<?php require __DIR__ . '/partials/header.php'; ?>
<div class="container">
    <table class="table">
        <tbody>
        <tr>
            <th>Name:</th>
            <td><?= $user['name'] ?></td>
        </tr>
        <tr>
            <th>Username:</th>
            <td><?= $user['username'] ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?= $user['email'] ?></td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td><?= $user['phone'] ?></td>
        </tr>
        <tr>
            <th>Website:</th>
            <td><?= $user['website'] ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?= $user['name'] ?></td>
        </tr>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
