<?php

use Ratchet\ConnectionInterface;

trait ChatEventsTrait
{
    function handleJoined(ConnectionInterface $connection, $payload)
    {
        $this->users[$connection->resourceId] = $payload->data->user;
    }
}