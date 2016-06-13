<?php

namespace TonicHealthCheck\Tests\Check;

use TonicHealthCheck\Check\AbstractCheck;

/**
 * Class CheckConcreteMock
 */
class CheckConcreteMock extends AbstractCheck
{
    const GROUP = 'mock';
    const COMPONENT = 'Concrete';
    const CHECK = 'concrete-mock-check';

    public function __construct($checkNode)
    {
        parent::__construct($checkNode);
    }

    /**
     * @return bool
     */
    public function check()
    {

        // TODO: Implement check() method.
    }
}
