<?php

namespace TonicHealthCheck\Tests\Check;

use Exception;

/**
 * Class CheckExceptionTest.
 */
class CheckExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testDebug()
    {
        $exceptionMsg = 'Unexpected error msg text';
        $exceptionCode = 0;
        $exception = new Exception($exceptionMsg, $exceptionCode);
        $concreteCheckException = new ConcreteCheckException(
            $exception->getMessage(),
            $exception->getCode(),
            $exception
        );
        $debugStr = $concreteCheckException->getNestedDebug();
        self::assertContains(
            sprintf(
                'ERROR CLASS:%s',
                get_class($concreteCheckException)
            ),
            $debugStr
        );
        self::assertContains('ERROR CODE:-1', $debugStr);
        self::assertContains(
            sprintf(
                'ERROR CLASS:%s',
                get_class($exception)
            ),
            $debugStr
        );

        self::assertContains(
            sprintf(
                'ERROR CODE:%d',
                $exceptionCode
            ),
            $debugStr
        );
        self::assertContains('ERROR CODE:0', $debugStr);
        self::assertContains($exceptionMsg, $debugStr);
    }
}
