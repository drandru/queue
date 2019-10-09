<?php

namespace DRD\Queue\Common\Channel;

use PhpAmqpLib\Channel\AMQPChannel;

/**
 * Interface ChannelFactoryInterface
 * @package DRD\Queue\Common\Channel
 */
interface ChannelFactoryInterface
{
    /**
     * @return AMQPChannel
     */
    public function getChannel(): AMQPChannel;
}
