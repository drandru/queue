<?php

namespace DRD\Queue\Pull\Processor;

use PhpAmqpLib\Message\AMQPMessage;

/**
 * Interface ProcessorInterface
 * @package DRD\Queue\Pull\Processor
 */
interface ProcessorInterface
{
    /**
     * @param AMQPMessage $message
     * @return void
     */
    public function __invoke(AMQPMessage $message);
}
