<?php

namespace DRD\Queue\Push\Protocol;

use DRD\Queue\Common\Channel\ChannelFactoryInterface;
use DRD\Queue\Common\Message\MessageInterface;
use DRD\Queue\Common\Queue\QueueInterface;
use DRD\Queue\Push\Message\Factory\MessageFactoryInterface;

/**
 * Class Protocol
 * @package DRD\Queue\Push\Protocol
 */
class Protocol implements ProtocolInterface
{
    /**
     * @var ChannelFactoryInterface
     */
    private $channelFactory;

    /**
     * @var QueueInterface
     */
    private $queue;

    /**
     * @var MessageFactoryInterface
     */
    private $messageFactory;
    /**
     * @var string
     */
    private $exchange;

    /**
     * @param ChannelFactoryInterface $channelFactory
     * @param QueueInterface $queue
     * @param MessageFactoryInterface $messageFactory
     * @param string $exchange
     */
    public function __construct(
        ChannelFactoryInterface $channelFactory
        , QueueInterface $queue
        , MessageFactoryInterface $messageFactory
        , string $exchange
    ) {
        $this->channelFactory = $channelFactory;
        $this->queue = $queue;
        $this->messageFactory = $messageFactory;
        $this->exchange = $exchange;
    }

    /**
     * {@inheritdoc}
     */
    public function toQueue(MessageInterface $event): ProtocolInterface
    {
        $this->
            channelFactory->
            getChannel()->
            basic_publish(
                $this->messageFactory->toAMQPMessage($event),
                $this->exchange,
                $this->queue->getQueueName()
            );

        return $this;
    }
}
