<?php

namespace DRD\Queue\Common\Queue;

interface ConsumeInterface
{
    /**
     * @return string
     */
    public function getQueueName(): string;

    /**
     * @return string
     */
    public function getConsumerTag(): string;

    /**
     * @return bool
     */
    public function isNoLocal(): bool;

    /**
     * @return bool
     */
    public function isNoAck(): bool;

    /**
     * @return bool
     */
    public function isExclusive(): bool;

    /**
     * @return bool
     */
    public function isNowait(): bool;
}
