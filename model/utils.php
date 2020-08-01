<?php

function dbConnect()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    } catch(Exception $e) {
        die('Error : ' . $e->getMessage());
    }
}

function usernameToID(string $username)
{
    // Connect to database and gather data
    $db    = dbConnect();
    $query = 'SELECT * FROM users WHERE username = :username';
    $req   = $db->prepare($query);
    $req->execute(array(
        'username' => $username
    ));

    // Get ID :
    $data = $req->fetch();
    $ID = $data['id'];

    return $ID;
}