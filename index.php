<?php
require __DIR__ . '/users/users.php';
include __DIR__ . '/partials/header.php';

$users = getUsers();
?>

<?php ?>

    <div class="container">
        <a href="create.php" class="btn btn-outline-success my-4">Create new user</a>
        <table class="table">
            <thead>
            <tr>
                <th>image</th>
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
                    <td>
                        <?php if (isset($user['extension'])): ?>
                            <img style="width: 60px"
                                 src="<?php echo "users/images/" . $user['id'] . '.' . $user['extension'] ?>" alt="">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $user['name'] ?></td>
                    <td><?php echo $user['username'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['phone'] ?></td>
                    <td><a href="<?= 'https://' . $user['website'] ?>"
                           target="_blank"><?php echo $user['website'] ?></a></td>
                    <td class="d-flex gap-2">
                        <a href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                        <a href="delete.php?id=<?php echo $user['id'] ?>"
                           class="btn btn-sm btn-outline-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php include __DIR__ . '/partials/footer.php'; ?>