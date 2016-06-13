<?php

namespace TonicHealthCheck\Tests\Check;

use PHPUnit_Framework_TestCase;

/**
 * Class AbstractCheckTest
 */
class AbstractCheckTest extends PHPUnit_Framework_TestCase
{
    /**
     * test all getters
     */
    public function testGetters()
    {
        $nodeName = 'testnode';

        $checkConcreteMock = new CheckConcreteMock($nodeName);

        $this->assertEquals(CheckConcreteMock::COMPONENT, $checkConcreteMock->getCheckComponent());

        $this->assertEquals(CheckConcreteMock::GROUP, $checkConcreteMock->getCheckGroup());

        $this->assertEquals(CheckConcreteMock::CHECK, $checkConcreteMock->getCheckIdent());

        $this->assertEquals($nodeName, $checkConcreteMock->getCheckNode());

        $this->assertNull($checkConcreteMock->getLastCheckResult());

        $this->assertRegExp('#'.$checkConcreteMock->getCheckNode().'.'.$checkConcreteMock->getCheckGroup().'.'.$checkConcreteMock->getCheckComponent().'.'.$checkConcreteMock->getCheckIdent().'#', $checkConcreteMock->getIndent());
    }
}
