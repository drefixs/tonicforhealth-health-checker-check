<?php

namespace TonicHealthCheck\Tests\Check;

use Exception;
use PHPUnit_Framework_TestCase;
use TonicHealthCheck\Check\CheckException;
use TonicHealthCheck\Check\CheckResult;
use TonicHealthCheck\Check\CheckUnexpectedException;
use TonicHealthCheck\Check\ResultInterface;

/**
 * Class AbstractCheckTest.
 */
class AbstractCheckTest extends PHPUnit_Framework_TestCase
{
    /**
     * test all getters.
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

    /**
     * test check.
     */
    public function testCheckOk()
    {
        $nodeName = 'testnode';

        $checkConcreteMock = new CheckConcreteMock($nodeName);
        $checkResult = $checkConcreteMock->check();

        self::assertEquals(ResultInterface::STATUS_OK, $checkResult->getStatus());
        self::assertEquals(null, $checkResult->getError());
        self::assertEquals(true, $checkResult->isOk());
        self::assertEquals(ResultInterface::STATUS_OK, $checkResult->getData());
        self::assertEquals('', $checkResult->getMessage());
    }

    /**
     * test check.
     */
    public function testCheckFail()
    {
        $nodeName = 'testnode';

        $exceptionMsg = 'Unexpected error msg text';
        $exceptionCode = 32453;

        $exception = new CheckException($exceptionMsg, $exceptionCode);

        $checkConcreteMock = new CheckConcreteMock($nodeName, $exception);
        $checkResult = $checkConcreteMock->check();

        self::assertEquals($exceptionCode, $checkResult->getStatus());
        self::assertEquals($exception, $checkResult->getError());
        self::assertEquals(false, $checkResult->isOk());
        self::assertEquals($exceptionCode, $checkResult->getData());
        self::assertEquals($exception->getMessage(), $checkResult->getMessage());
    }

    /**
     * test check.
     */
    public function testCheckFailZeroCode()
    {
        $nodeName = 'testnode';

        $exceptionMsg = 'Unexpected error msg text';
        $exceptionCode = 0;

        $exception = new ConcreteCheckException($exceptionMsg, $exceptionCode);

        $checkConcreteMock = new CheckConcreteMock($nodeName, $exception);
        $checkResult = $checkConcreteMock->check();

        self::assertEquals(-1, $checkResult->getStatus());
        self::assertEquals($exception, $checkResult->getError());
        self::assertEquals(false, $checkResult->isOk());
    }

    public function testCheckUnexpectedException()
    {
        $nodeName = 'testnode';

        $exceptionMsg = 'Unexpected error msg text';
        $exceptionCode = 0;

        $exception = new Exception($exceptionMsg, $exceptionCode);

        $checkConcreteMock = new CheckConcreteMock($nodeName, $exception);
        $checkResult = $checkConcreteMock->check();

        self::assertEquals(-1, $checkResult->getStatus());
        self::assertInstanceOf(CheckUnexpectedException::class, $checkResult->getError());
        self::assertEquals(false, $checkResult->isOk());
    }

    public function testLabel()
    {
        $nodeName = 'testnode';
        $checkConcreteMock = new CheckConcreteMock($nodeName);

        self::assertEquals(
            $checkConcreteMock->getIndent(),
            $checkConcreteMock->getLabel()
        );

    }
}
