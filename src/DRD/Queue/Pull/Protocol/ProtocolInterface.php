<?php

namespace DRD\Queue\Pull\Protocol;

use DRD\Queue\Pull\Processor\ProcessorInterface;

interface ProtocolInterface
{
    /**
     * @param ProcessorInterface $processor
     * @param int $count
     * @return ProtocolInterface
     */
    public function pull(ProcessorInterface $processor, int $count = -1): ProtocolInterface;
}
