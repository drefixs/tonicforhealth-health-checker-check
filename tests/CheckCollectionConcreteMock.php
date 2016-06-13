<?php

namespace TonicHealthCheck\Tests\Check;

use TonicHealthCheck\Check\AbstractCheckCollection;

/**
 * Class CheckCollectionConcreteMock
 */
class CheckCollectionConcreteMock extends AbstractCheckCollection
{
    const OBJECT_CLASS = CheckConcreteMock::class;
}
