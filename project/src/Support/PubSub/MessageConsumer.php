<?php

namespace Support\PubSub;

interface MessageConsumer
{
    public function open(string $exchangeName): void;

    public function receive(
        string   $exchangeName,
        callable $callback,
    ): void;

    public function close(string $exchangeName);
}
