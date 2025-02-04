<?php

function getUsers()
{
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}

function getUserById($id)
{
    $users = getUsers();

    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }

    return NULL;
}

function createUser($data)
{
    $users = getUsers();
    $data['id'] = uniqid();

    $users[] = $data;
    putJson($users);
    return $data;
}

function updateUser($data, $id)
{
    $updateUser = [];
    $users = getUsers();

    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $updateUser = array_merge($user, $data);
            $users[$i] = array_merge($user, $data);
        }
    }

    putJson($users);
    return $updateUser;
}

function deleteUser($id)
{
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            if (isset($user['extension'])) {
                if (file_exists(__DIR__ . '/images/' . $id . '.' . $user['extension'])) {
                    unlink(__DIR__ . '/images/' . $id . '.' . $user['extension']);
                }
            }
            array_splice($users, $i, 1);
        }
    }

    putJson($users);
}

function uploadImage($file, $user)
{
    if (isset($_FILES['avatar']) && $_FILES['avatar']['name']) {
        if (!is_dir(__DIR__ . '/images/')) {
            mkdir(__DIR__ . '/images/');
        }
        $fileName = $file['name'];
        $dotPosition = strrpos($fileName, '.');
        $extension = substr($fileName, $dotPosition + 1);
        $filePath = __DIR__ . '/images/' . $user['id'] . '.' . $extension;
        move_uploaded_file($file['tmp_name'], $filePath);
        $user['extension'] = $extension;
        updateUser($user, $user['id']);
    }
}

function putJson($data)
{
    file_put_contents(__DIR__ . '/users.json', json_encode($data, JSON_PRETTY_PRINT));
}

function validateUser($user, &$errors) {
    $isValid = true;

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

    return $isValid;
}