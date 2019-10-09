<?php

namespace DRD\Queue\Common\Qos;

/**
 * Class Qos
 * @package DRD\Queue\Common\Qos
 */
class Qos implements QosInterface
{
    /**
     * @var int
     */
    private $prefetchSize;

    /**
     * @var int
     */
    private $prefetchCount;

    /**
     * @var int
     */
    private $aGlobal;

    /**
     * @param int $prefetchSize
     * @param int $prefetchCount
     * @param bool $aGlobal
     */
    public function __construct(int $prefetchSize, int $prefetchCount, bool $aGlobal)
    {
        $this->prefetchSize = $prefetchSize;
        $this->prefetchCount = $prefetchCount;
        $this->aGlobal = $aGlobal;
    }

    /**
     * {@inheritdoc}
     */
    public function getPrefetchSize(): int
    {
        return $this->prefetchSize;
    }

    /**
     * {@inheritdoc}
     */
    public function getPrefetchCount(): int
    {
        return $this->prefetchCount;
    }

    /**
     * {@inheritdoc}
     */
    public function getAGlobal(): bool
    {
        return $this->aGlobal;
    }
}
