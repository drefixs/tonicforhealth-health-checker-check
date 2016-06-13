<?php

namespace TonicHealthCheck\Tests\Check;

use PHPUnit_Framework_TestCase;

/**
 * Class AbstractCheckCollectionTest
 */
class AbstractCheckCollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * test add is ok
     */
    public function testCollectionOk()
    {
        $nodeName = 'testnode';
        $checkConcreteMock = new CheckConcreteMock('testnode');

        $checkCollection = new CheckCollectionConcreteMock();

        $checkCollection->add($checkConcreteMock);
    }

    /**
     * test add other type of the instance
     *
     * @expectedException \Collections\Exceptions\InvalidArgumentException
     */
    public function testCollectionFail()
    {
        $nodeName = 'testnode';

        $object = (object) ['test'];

        $checkCollection = new CheckCollectionConcreteMock();

        $checkCollection->add($object);
    }
}
