<?php

namespace TonicHealthCheck\Check;

use Collections\Collection;

/**
 * Class AbstractCheckCollection
 */
abstract class AbstractCheckCollection extends Collection implements CheckCollectionInterface
{
    const OBJECT_CLASS = CheckInterface::class;

    /**
     * ProcessingCheckCollection constructor.
     */
    public function __construct()
    {
        parent::__construct(static::OBJECT_CLASS);
    }
}
