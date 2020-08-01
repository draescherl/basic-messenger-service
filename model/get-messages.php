<?php

include_once 'utils.php';

function getMessages(int $senderID, int $receiverID)
{
    // Get data from database :
    $db    = dbConnect();
    $query = 'SELECT * FROM messages WHERE (senderID = :sender AND receiverID = :receiver) OR (senderID = :receiver AND receiverID = :sender) ORDER BY timestamp';
    $req   = $db->prepare($query);
    $req->execute(array(
        'sender'   => $senderID,
        'receiver' => $receiverID
    ));
    $messages = $req->fetchAll();

    return $messages;
}