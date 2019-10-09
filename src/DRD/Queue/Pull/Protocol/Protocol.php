<?php

namespace DRD\Queue\Pull\Protocol;

use DRD\Queue\Common\Channel\ChannelFactoryInterface;
use DRD\Queue\Common\Qos\QosInterface;
use DRD\Queue\Common\Queue\ConsumeInterface;
use DRD\Queue\Pull\Processor\ProcessorInterface;

/**
 * Class Protocol
 * @package DRD\Queue\Pull\Protocol
 */
class Protocol implements ProtocolInterface
{
    /**
     * @var ChannelFactoryInterface
     */
    private $channelFactory;

    /**
     * @var QosInterface
     */
    private $qos;

    /**
     * @var ConsumeInterface
     */
    private $consume;

    /**
     * @param ChannelFactoryInterface $channelFactory
     * @param QosInterface $qos
     * @param ConsumeInterface $consume
     */
    public function __construct(ChannelFactoryInterface $channelFactory, QosInterface $qos, ConsumeInterface $consume)
    {
        $this->channelFactory = $channelFactory;
        $this->qos = $qos;
        $this->consume = $consume;
    }

    /**
     * @param ProcessorInterface $processor
     * @param int $count
     * @return ProtocolInterface
     */
    public function pull(ProcessorInterface $processor, int $count = -1): ProtocolInterface
    {
        $channel = $this->channelSetUp($processor);

        for ($i = 0, $count--; $i !== $count; $i++) {
            $channel->wait();
        }

        return $this;
    }

    /**
     * @param ProcessorInterface $callback
     * @return mixed
     */
    private function channelSetUp(ProcessorInterface $callback)
    {
        $channel = $this->channelFactory->getChannel();

        $channel->basic_qos($this->qos->getPrefetchSize(), $this->qos->getPrefetchCount(), $this->qos->getAGlobal());

        $channel->basic_consume(
            $this->consume->getQueueName()
            , $this->consume->getConsumerTag()
            , $this->consume->isNoLocal()
            , $this->consume->isNoAck()
            , $this->consume->isExclusive()
            , $this->consume->isNowait()
            , $callback
        );

        return $channel;
    }
}
