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
    file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
    return $data;
}

function updateUser($data, $id)
{
    $updateUser = [];
    $users = getUsers();

    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
//            if ($user['extension']) {
//                $data['extension'] = $user['extension'];
//            }
            $updateUser = array_merge($user, $data);
            $users[$i] = array_merge($user, $data);
        }
    }

    file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));

    return $updateUser;
}

function deleteUser($id)
{

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