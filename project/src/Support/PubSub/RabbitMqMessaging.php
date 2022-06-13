<?php

namespace Support\PubSub;

use Exception;
use PhpAmqpLib\Connection\AMQPLazyConnection;

abstract class RabbitMqMessaging
{
    public function __construct(protected AMQPLazyConnection $connection, protected $channel = null)
    {
    }

    private function connect(string $exchangeName): void
    {
        if ($this->channel !== null) return;

        var_dump($this->connection->channel());

        $channel = $this->connection->channel();

        $channel->exchange_declare($exchangeName, 'fanout', false, true, false);

        $channel->queue_declare($exchangeName, false, true, false, false);

        $channel->queue_bind($exchangeName, $exchangeName);

        $this->channel = $channel;
    }

    public function open(string $exchangeName): void
    {
        $this->connect($exchangeName);
    }

    protected function channel(string $exchangeName)
    {
        $this->connect($exchangeName);

        return $this->channel;
    }

    /**
     * @throws Exception
     */
    public function close(string $exchangeName): void
    {
        $this->channel->close();
        $this->connection->close();
    }
}
