<?php

namespace DRD\Queue\Common\Channel;

use DRD\Queue\Common\Queue\QueueInterface;
use PhpAmqpLib\Channel\AbstractChannel;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;

/**
 * Class ChannelFactory
 * @package DRD\Queue\Common\Channel
 */
class ChannelFactory implements ChannelFactoryInterface
{
    /**
     * @var AMQPStreamConnection
     */
    private $client;

    /**
     * @var QueueInterface
     */
    private $queue;

    /**
     * @var AbstractChannel
     */
    private $channel;

    /**
     * @param AMQPStreamConnection $client
     * @param QueueInterface $queue
     */
    public function __construct(AMQPStreamConnection $client, QueueInterface $queue)
    {
        $this->client = $client;
        $this->queue = $queue;
    }

    /**
     * {@inheritdoc}
     */
    public function getChannel(): AMQPChannel
    {
        if (!$this->channel) {
            $this->channel = $this->client->channel();

            $this->channel->
                queue_declare(
                    $this->queue->getQueueName()
                    , $this->queue->isPassive()
                    , $this->queue->isDurable()
                    , $this->queue->isExclusive()
                    , $this->queue->isAutoDelete()
                );
        }

        return $this->channel;
    }
}
