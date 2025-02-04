<?php

?>

<div class="container">
    <form method="POST" action="" enctype="multipart/form-data" class="mt-5 card p-4">
        <div class="card-header mb-4">
            <h1>
                <?php if ($user['name']): ?>
                    Update user
                <? else: ?>
                    Create user
                <?php endif; ?>
            </h1>
        </div>
        <div class="mb-3 has-validation">
            <label for="exampleInputEmail1" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>"
                   id="exampleInputEmail1" value="<?= $user['name'] ?>">
            <div class="invalid-feedback">
                <?= $errors['name'] ?>
            </div>
        </div>
        <div class="mb-3 has-validation">
            <label for="exampleInputEmail1" class="form-label">Username:</label>
            <input type="text" name="username" class="form-control <?= $errors['username'] ? 'is-invalid' : '' ?>"
                   value="<?= $user['username'] ?>">
            <div class="invalid-feedback">
                <?= $errors['username'] ?>
            </div>
        </div>
        <div class="mb-3 has-validation">
            <label for="exampleInputEmail1" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>"
                   value="<?= $user['email'] ?>">
            <div class="invalid-feedback">
                <?= $errors['email'] ?>
            </div>
        </div>
        <div class="mb-3 has-validation">
            <label for="exampleInputEmail1" class="form-label">Phone:</label>
            <input type="text" name="phone" class="form-control <?= $errors['phone'] ? 'is-invalid' : '' ?>"
                   value="<?= $user['phone'] ?>">
            <div class="invalid-feedback">
                <?= $errors['phone'] ?>
            </div>
        </div>
        <div class="mb-3 has-validation">
            <label for="exampleInputEmail1" class="form-label">Website:</label>
            <input type="text" name="website" class="form-control <?= $errors['website'] ? 'is-invalid' : '' ?>"
                   value="<?= $user['website'] ?>">
            <div class="invalid-feedback">
                <?= $errors['website'] ?>
            </div>
        </div>
        <div class="mb-3 has-validation">
            <label for="exampleInputEmail1" class="form-label">Image:</label>
            <input type="file" name="avatar" class="form-control">
        </div>
        <div class="d-flex gap-3">
            <button class="btn btn-primary" type="submit">
                <?php if ($user['name']): ?>
                    Update
                <? else: ?>
                    Create
                <?php endif; ?>
            </button>
            <?php if ($user['name']): ?>
                <a href="/delete.php?id=<?= $user['id'] ?>" class="btn btn-outline-danger">
                    Delete
                </a>
            <?php endif; ?>
        </div>
    </form>
</div>
