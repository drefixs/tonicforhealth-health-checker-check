<?php

namespace TonicHealthCheck\Check;

/**
 * Class CheckException
 * @package TonicHealthCheck\Exception
 */
class CheckException extends \Exception
{
    const EXCEPTION_NAME = 'healthCheck';

    /**
     * HttpCheckException constructor.
     * @param string          $message
     * @param null|int        $code
     * @param null|\Exception $previous
     */
    public function __construct($message = '', $code = null, \Exception $previous = null)
    {
        if ($code == 0) {
            $code = -1;
        }
        parent::__construct(static::EXCEPTION_NAME.": ".$message, $code, $previous);
    }
}
