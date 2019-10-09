<?php

namespace DRD\Queue\Push\Message\Transformer;

use DRD\Queue\Common\Message\MessageInterface;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Interface TransformerInterface
 * @package DRD\Queue\Push\Message\Transformer
 */
interface TransformerInterface
{
    /**
     * @param MessageInterface $message
     * @return AMQPMessage
     */
    public function transform(MessageInterface $message): string;
}
