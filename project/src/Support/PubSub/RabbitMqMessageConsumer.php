<?php

namespace Support\PubSub;

use PhpAmqpLib\Message\AMQPMessage;

class RabbitMqMessageConsumer extends RabbitMqMessaging implements MessageConsumer
{
    public function receive(
        string $exchangeName,
        callable $callback,
    ): void {
        $this->channel->basic_consume(
            $exchangeName,
            function (AMQPMessage $message) use ($callback) {
                $callback($message->body);
            }
        );

        while (count($this->channel->callbacks)) {
            $this->channel->wait();
        }
    }
}
