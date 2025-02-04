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