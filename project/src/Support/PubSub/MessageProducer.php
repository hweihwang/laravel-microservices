<?php

namespace Support\PubSub;

interface MessageProducer
{
    public function open(string $exchangeName): void;

    public function send(
        string $exchangeName,
        string $message,
        string $messageType,
        string $messageId,
        int    $messageTime,
        int    $messageVersion,
    );

    public function close(string $exchangeName);
}
