<?php

include 'utils.php';

function usernameAlreadyExists(string $username) : bool
{
    $db  = dbConnect();
    $req = $db->prepare('SELECT username FROM users WHERE username = :username');
    $req->execute(array(
        'username' => $username
    ));

    return ($req->rowCount() > 0);
}

function isValid(string $item, string $type = 'password')
{
    $valid = true;
    $error = '';

    if ($type === 'username') {
        // Check if username already exists :
        if (usernameAlreadyExists($item)) {
            $valid = false;
            $error = 'exists';
        }
    }

    // Check if username/password has a space in it :
    if ($valid && preg_match('/\s/', $item)) {
        $valid = false;
        $error = 'space';
    }

    // Check if username/password length is longer than 20 characters :
    if ($valid && (strlen($item) > 20)) {
        $valid = false;
        $error = 'long';
    }

    // Check if username/password length is shorter than 3 characters :
    if ($valid && (strlen($item) < 3)) {
        $valid = false;
        $error = 'short';
    }

    $res = ($valid) ? true:$error;
    return $res;
}

function passwordsMatch(string $password, string $confirm) : bool
{
    return ($password === $confirm);
}



// Get data :
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$confirm  = htmlspecialchars($_POST['confirm']);

// Check :
$username_valid  = isValid($username, 'username');
$password_valid  = isValid($password);
$passwords_match = passwordsMatch($password, $confirm);

if (!$passwords_match) {
    echo 'not-match';
} elseif ($password_valid !== true) {
    echo 'password-' . $password_valid;
} elseif ($username_valid !== true) {
    echo 'username-' . $username_valid;
} else {
    $db  = dbConnect();
    $req = $db->prepare('INSERT INTO users(username, password, role) VALUES (:username, :password, :role)');
    $req->execute(array(
        'username' => $username,
        'password' => password_hash(htmlspecialchars($password), PASSWORD_DEFAULT),
        'role' => 'user'
    ));
    echo 'success';
}