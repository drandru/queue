<?php


namespace DRD\Queue\Pull\Message\Transformer;

use DRD\GeneralBundle\ObjectBuilder\ObjectBuilder;
use DRD\Queue\Common\Message\MessageInterface;
use Exception;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class Transformer
 * @package DRD\Queue\Pull\Message\Transformer
 */
abstract class Transformer implements TransformerInterface
{
    /**
     * @var ObjectBuilder
     */
    private $objectBuilder = null;

    /**
     * @var ValidatorInterface
     */
    private $validation = null;

    /**
     * @return MessageInterface
     */
    abstract protected function getObject(): MessageInterface;

    /**
     * @return string
     */
    abstract protected function getObjectType(): string;

    /**
     * @param string $data
     * @return array
     */
    abstract protected function getData(string $data): array;


    /**
     * Create constructor.
     * @param ObjectBuilder $objectBuilder
     * @param ValidatorInterface $validation
     */
    public function __construct(
        ObjectBuilder $objectBuilder
        , ValidatorInterface $validation
    ) {
        $this->objectBuilder = $objectBuilder;
        $this->validation = $validation;
    }

    /**
     * {@inheritdoc}
     * @throws Exception
     */
    public function transform(string $data): MessageInterface
    {
        $event = $this->buildObject($data);

        $this->validate($event);

        return $event;
    }

    /**
     * @param string $data
     * @return MessageInterface
     */
    private function buildObject(string $data): MessageInterface
    {
        $object = $this->buildBaseObject($this->getObject(), $this->getObjectType(), $this->getData($data));
        /** @var MessageInterface $object */
        return $object;
    }

    /**
     * @param MessageInterface $event
     * @return MessageInterface
     * @throws Exception
     */
    private function validate(MessageInterface $event)
    {
        $errors = $this->validation->validate($event);

        if ($errors->count()) {
            throw new Exception((string) $errors);
        }

        return $event;
    }

    /**
     * @param object $object
     * @param string $type
     * @param array $data
     * @return object
     */
    private function buildBaseObject($object, string $type, array $data)
    {
        return $this->objectBuilder->build($object, $type, $data);
    }
}
