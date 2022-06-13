<?php

namespace Support\PubSub;

use PhpAmqpLib\Message\AMQPMessage;

class RabbitMqMessageProducer extends RabbitMqMessaging implements MessageProducer
{
    public function send(
        string $exchangeName,
        string $message,
        string $messageType,
        string $messageId,
        int    $messageTime,
        int    $messageVersion
    )
    {
        try {
            $this->channel($exchangeName)->basic_publish(
                new AMQPMessage(
                    $message,
                    [
                        'content_type' => $messageType,
                        'delivery_mode' => 2,
                        'message_id' => $messageId,
                        'timestamp' => $messageTime,
                        'type' => $messageType,
                        'version' => $messageVersion,
                    ],
                ),
                $exchangeName,
            );
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
