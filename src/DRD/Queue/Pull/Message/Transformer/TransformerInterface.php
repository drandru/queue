<?php

namespace DRD\Queue\Pull\Message\Transformer;

use DRD\Queue\Common\Message\MessageInterface;
use Exception;

/**
 * Interface TransformerInterface
 * @package DRD\Queue\Pull\Message\Transformer
 */
interface TransformerInterface
{
    /**
     * @param string $data
     * @return MessageInterface
     * @throws Exception
     */
    public function transform(string $data): MessageInterface;
}
