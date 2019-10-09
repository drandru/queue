<?php

namespace DRD\Queue\Common\Qos;

/**
 * Interface QosInterface
 * @package DRD\Queue\Common\Qos
 */
interface QosInterface
{
    /**
     * @return int
     */
    public function getPrefetchSize(): int;

    /**
     * @return int
     */
    public function getPrefetchCount(): int;

    /**
     * @return bool
     */
    public function getAGlobal(): bool;
}
