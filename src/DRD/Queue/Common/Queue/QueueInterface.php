<?php

namespace DRD\Queue\Common\Queue;

/**
 * Interface QueueInterface
 * @package DRD\Queue\Common\Queue
 */
interface QueueInterface
{
    /**
     * @return string
     */
    public function getQueueName(): string;

    /**
     * @return bool
     */
    public function isPassive(): bool;

    /**
     * @return bool
     */
    public function isDurable(): bool;

    /**
     * @return bool
     */
    public function isExclusive(): bool;

    /**
     * @return bool
     */
    public function isAutoDelete(): bool;
}
