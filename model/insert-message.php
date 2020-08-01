<?php

include_once 'utils.php';

function insertMessage(int $senderID, int $receiverID, string $contents, int $deleted=0)
{
    $db    = dbConnect();
    $query = 'INSERT INTO messages(sender-id, receiver-id, contents, deleted) VALUES(:sender, :receiver, :contents, :deleted)';
    $data  = array(
        'sender'    =>  $senderID,
        'receiver'  =>  $receiverID,
        'contents'  =>  $contents,
        'deleted'   =>  $deleted
    );
    return $req->execute($data);
}