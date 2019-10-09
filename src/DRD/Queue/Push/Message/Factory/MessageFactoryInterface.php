<?php

namespace DRD\Queue\Push\Message\Factory;

use DRD\Queue\Common\Message\MessageInterface;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Interface MessageFactoryInterface
 * @package DRD\Queue\Push\Message\Factory
 */
interface MessageFactoryInterface
{
    /**
     * @param MessageInterface $event
     * @return AMQPMessage
     */
    public function toAMQPMessage(MessageInterface $event): AMQPMessage;
}
