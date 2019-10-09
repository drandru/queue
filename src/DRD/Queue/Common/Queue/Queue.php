<?php

namespace DRD\Queue\Common\Queue;

/**
 * Class Queue
 * @package DRD\Queue\Common\Queue
 */
class Queue implements QueueInterface
{
    /**
     * @var string
     */
    private $queueName;

    /**
     * @var bool
     */
    private $passive;

    /**
     * @var bool
     */
    private $durable;

    /**
     * @var bool
     */
    private $exclusive;

    /**
     * @var bool
     */
    private $autoDelete;

    /**
     * @param string $queueName
     * @param bool $passive
     * @param bool $durable
     * @param bool $exclusive
     * @param bool $autoDelete
     */
    public function __construct(string $queueName, bool $passive, bool $durable, bool $exclusive, bool $autoDelete)
    {
        $this->queueName = $queueName;
        $this->passive = $passive;
        $this->durable = $durable;
        $this->exclusive = $exclusive;
        $this->autoDelete = $autoDelete;
    }

    /**
     * @return string
     */
    public function getQueueName(): string
    {
        return $this->queueName;
    }

    /**
     * @return bool
     */
    public function isPassive(): bool
    {
        return $this->passive;
    }

    /**
     * @return bool
     */
    public function isDurable(): bool
    {
        return $this->durable;
    }

    /**
     * @return bool
     */
    public function isExclusive(): bool
    {
        return $this->exclusive;
    }

    /**
     * @return bool
     */
    public function isAutoDelete(): bool
    {
        return $this->autoDelete;
    }
}
