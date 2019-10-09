<?php

namespace DRD\Queue\Push\Protocol;

use DRD\Queue\Common\Message\MessageInterface;

/**
 * Interface ProtocolInterface
 * @package DRD\Queue\Push\Protocol
 */
interface ProtocolInterface
{
    /**
     * @param MessageInterface $message
     * @return ProtocolInterface
     */
    public function toQueue(MessageInterface $message): ProtocolInterface;
}
