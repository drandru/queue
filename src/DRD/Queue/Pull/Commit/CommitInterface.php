<?php

namespace DRD\Queue\Pull\Commit;

use PhpAmqpLib\Message\AMQPMessage;

/**
 * Interface CommitInterface
 * @package DRD\Queue\Pull\Commit
 */
interface CommitInterface
{
    /**
     * @param AMQPMessage $message
     * @return null
     */
    public function commit(AMQPMessage $message);
}
