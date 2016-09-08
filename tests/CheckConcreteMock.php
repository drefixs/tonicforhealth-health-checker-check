<?php

namespace TonicHealthCheck\Tests\Check;

use TonicHealthCheck\Check\AbstractCheck;
use TonicHealthCheck\Check\CheckException;

/**
 * Class CheckConcreteMock.
 */
class CheckConcreteMock extends AbstractCheck
{
    const GROUP = 'mock';
    const COMPONENT = 'Concrete';
    const CHECK = 'concrete-mock-check';

    /**
     * @var CheckException|null
     */
    protected $exception;

    /**
     * CheckConcreteMock constructor.
     *
     * @param string|null         $checkNode
     * @param CheckException|null $exception
     */
    public function __construct($checkNode, $exception = null)
    {
        parent::__construct($checkNode);
        $this->exception = $exception;
    }

    /**
     * @return bool
     */
    public function performCheck()
    {
        if (null !== $this->exception) {
            throw $this->exception;
        }
    }
}
