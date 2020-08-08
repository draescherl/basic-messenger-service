<?php

include_once 'utils.php';

function getUsers(string $username)
{
    // Get data from database :
    $db    = dbConnect();
    $query = 'SELECT * FROM users WHERE username != :username';
    $req   = $db->prepare($query);
    $req->execute(array(
        'username' => $username
    ));
    $rawUsers = $req->fetchAll();

    // Save only usernames :
    $users = array();
    foreach ($rawUsers as $user) {
        array_push($users, $user['username']);
    }

    return $users;
}