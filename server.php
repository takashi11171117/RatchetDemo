<?php

use Ratchet\Http\HttpServer;
use Ratchet\Server\IOServer;
use Ratchet\WebSocket\WsServer;
use App\Chat;

require_once 'vendor/autoload.php';

$server = IOServer::factory(
    new HttpServer(
        new WsServer(
            new Chat()
        )
    ),
    8080
);

$server->run();
