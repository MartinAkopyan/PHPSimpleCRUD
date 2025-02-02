<?php
require __DIR__ . '/users.php';

echo '<pre>';
//print_r(getUsers());
echo '</pre>';
$users = getUsers();
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>name</th>
            <th>username</th>
            <th>email</th>
            <th>phone</th>
            <th>website</th>
            <th>actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['username'] ?></td>
            <td><?php echo $user['email'] ?></td>
            <td><?php echo $user['phone'] ?></td>
            <td><?php echo $user['website'] ?></td>
            <td class="d-flex gap-2">
                <a href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                <a href="delete.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require __DIR__ . '/partials/footer.php'; ?>