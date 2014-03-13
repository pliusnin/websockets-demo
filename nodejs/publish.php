<?php

if (!isset($argv[1])) {
    echo "Usage: php publish.php message\n";
    exit;
}

$context = new ZMQContext();

$pub = $context->getSocket(ZMQ::SOCKET_PUB);
$pub->connect('tcp://127.0.0.1:5555');
sleep(1);
$msg = trim($argv[1]);
$pub->send($msg);
