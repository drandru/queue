<?php

namespace DRD\Queue\Common\Queue;

/**
 * Class Consume
 * @package DRD\Queue\Common\Queue
 */
class Consume implements ConsumeInterface
{
    /**
     * @var string
     */
    private $queueName;

    /**
     * @var string
     */
    private $consumerTag;

    /**
     * @var bool
     */
    private $noLocal;

    /**
     * @var bool
     */
    private $noAck;

    /**
     * @var bool
     */
    private $exclusive;

    /**
     * @var bool
     */
    private $nowait;

    /**
     * @param string $queueName
     * @param string $consumerTag
     * @param bool $noLocal
     * @param bool $noAck
     * @param bool $exclusive
     * @param bool $nowait
     */
    public function __construct(
        string $queueName
        , string $consumerTag
        , bool $noLocal
        , bool $noAck
        , bool $exclusive
        , bool $nowait
    ) {
        $this->queueName = $queueName;
        $this->consumerTag = $consumerTag;
        $this->noLocal = $noLocal;
        $this->noAck = $noAck;
        $this->exclusive = $exclusive;
        $this->nowait = $nowait;
    }

    /**
     * {@inheritdoc}
     */
    public function getQueueName(): string
    {
        return $this->queueName;
    }

    /**
     * {@inheritdoc}
     */
    public function getConsumerTag(): string
    {
        return $this->consumerTag;
    }

    /**
     * {@inheritdoc}
     */
    public function isNoLocal(): bool
    {
        return $this->noLocal;
    }

    /**
     * {@inheritdoc}
     */
    public function isNoAck(): bool
    {
        return $this->noAck;
    }

    /**
     * {@inheritdoc}
     */
    public function isExclusive(): bool
    {
        return $this->exclusive;
    }

    /**
     * {@inheritdoc}
     */
    public function isNowait(): bool
    {
        return $this->nowait;
    }
}
