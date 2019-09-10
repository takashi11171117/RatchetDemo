<?php

namespace App;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class Chat implements MessageComponentInterface
{
    use ChatEventsTrait;

    protected $clients;

    protected $user;

    function onOpen(ConnectionInterface $connection)
    {
        $this->clients[$connection->resourceId] = $connection;
    }

    function onMessage(ConnectionInterface $connection, $message)
    {
        $payload = json_decode($message);

        if (method_exists($this, $method = 'handle' . ucfirst($payload->event))) {
            $this->{$method}($connection, $payload);
        }
    }

    function onClose(ConnectionInterface $connection)
    {
        unset($this->clients[$connection->resourceId]);
    }

    function onError(ConnectionInterface $connection, Exception $e)
    {
        $connection->close();
    }
}