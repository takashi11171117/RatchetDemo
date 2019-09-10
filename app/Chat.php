<?php

namespace App;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class Chat implements MessageComponentInterface
{
    function onOpen(ConnectionInterface $connection)
    {

    }

    function onMessage(ConnectionInterface $connection, $message)
    {
        
    }

    function onClose(ConnectionInterface $connection)
    {
        $connection->close();
    }

    function onError(ConnectionInterface $connection, Exception $e)
    {
        
    }
}