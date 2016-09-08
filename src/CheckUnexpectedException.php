<?php

namespace TonicHealthCheck\Check;

use Exception;

/**
 * Class CheckUnexpectedException.
 */
class CheckUnexpectedException extends CheckException
{
    /**
     * @param string    $className
     * @param string    $methodName
     * @param Exception $error
     *
     * @return self
     */
    public static function catchUnexpectedError($className, $methodName, Exception $error)
    {
        return new self(
            sprintf(
                '%s:%s catch unexpected error:\n%s',
                $className,
                $methodName,
                $error->getMessage()
            ),
            0,
            $error
        );
    }
}
