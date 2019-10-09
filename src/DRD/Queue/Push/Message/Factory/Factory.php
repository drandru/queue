<?php

namespace DRD\Queue\Push\Message\Factory;

use DRD\Queue\Common\Message\MessageInterface;
use DRD\Queue\Push\Message\Transformer\TransformerInterface;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Class Factory
 * @package DRD\Queue\Push\Message\Factory
 */
class Factory implements MessageFactoryInterface
{
    /**
     * @var TransformerInterface
     */
    private $transformer;

    /**
     * @param TransformerInterface $transformer
     */
    public function __construct(TransformerInterface $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * @param MessageInterface $message
     * @return AMQPMessage
     */
    public function toAMQPMessage(MessageInterface $message): AMQPMessage
    {
        $message = new AMQPMessage($this->transformer->transform($message));

        return $message;
    }
}
