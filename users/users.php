<?php

function getUsers() {
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}

function getUserById($id) {
    $users = getUsers();

    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }

    return NULL;
}

function createUser($data) {

}

function updateUser($data, $id) {
    $updateUser = [];
    $users = getUsers();

    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
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