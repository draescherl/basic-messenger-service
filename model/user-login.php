<?php

include 'model/utils.php';

function authorizeLogin(string $username, string $password) : bool
{
    // Connect to database and get data :
    $db  = dbConnect();
    $req = $db->prepare('SELECT * FROM users WHERE username = :username');
    $req->execute(array(
        'username' => $username
    ));

    // If the username doesn't exist :
    if ($req->rowCount() === 0) {
        return false;
    }

    // Check if password is correct :
    $data = $req->fetch();
    $res = password_verify($password, $data['password']);
    $req->closeCursor();
    return $res;
}

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$res = (authorizeLogin($username, $password)) ? 'success':'failed';
echo $res;