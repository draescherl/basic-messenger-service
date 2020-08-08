<?php

include_once 'utils.php';

function insertMessage(int $senderID, int $receiverID, string $contents, int $deleted=0) : bool
{
    $db    = dbConnect();
    $query = 'INSERT INTO messages(senderID, receiverID, contents, deleted) VALUES(:sender, :receiver, :contents, :deleted)';
    $data  = array(
        'sender'    =>  $senderID,
        'receiver'  =>  $receiverID,
        'contents'  =>  $contents,
        'deleted'   =>  $deleted
    );
    $req = $db->prepare($query);
    return $req->execute($data);
}


if (isset($_POST['sender']) && isset($_POST['receiver']) && isset($_POST['contents'])) {
    $senderID   = usernameToID($_POST['sender']);
    $receiverID = usernameToID($_POST['receiver']);
    $contents   = $_POST['contents'];
    
    $res = (insertMessage($senderID, $receiverID, $contents)) ? 'success':'failure';
    echo $res; 
}