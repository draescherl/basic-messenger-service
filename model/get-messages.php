<?php

include 'utils.php';

function getMessages(int $senderID, int $receiverID)
{
    // Get data from database :
    $db    = dbConnect();
    $query = 'SELECT * FROM messages WHERE (sender-id = :sender AND receiver-id = :receiver) OR (sender-id = :receiver AND receiver-id = :sender) ORDER BY timestamp DESC';
    $req   = $db->prepare($query);
    $req->execute(array(
        'sender'   => $senderID,
        'receiver' => $receiverID
    ));
    $rawMessages = $req->fetchAll();

    // Save only content :
    $messages = array();
    foreach ($rawMessages as $message) {
        array_push($messages, $message['contents']);
    }

    return $messages;
}