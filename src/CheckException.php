<?php

namespace TonicHealthCheck\Check;

use Exception;

/**
 * Class CheckException.
 */
class CheckException extends \Exception
{
    const EXCEPTION_NAME = 'healthCheck';

    /**
     * HttpCheckException constructor.
     *
     * @param string          $message
     * @param null|int        $code
     * @param null|\Exception $previous
     */
    public function __construct($message = '', $code = null, \Exception $previous = null)
    {
        if (0 === $code || null === $code) {
            $code = -1;
        }
        parent::__construct(static::EXCEPTION_NAME.': '.$message, $code, $previous);
    }

    /**
     * @param int $depth
     *
     * @return string
     */
    public function getNestedDebug($depth = -1)
    {
        return static::getDebug($this, $depth);
    }

    /**
     * @param Exception $exception
     *
     * @return string
     */
    protected static function getDebug(Exception $exception, $depth = -1)
    {
        $errorDebugMsg = sprintf(
            "ERROR CLASS:%s\nERROR CODE:%d\nERROR FILE:%s\nERROR MESSAGE:%s\nERROR TRACE:\n%s",
            get_class($exception),
            $exception->getCode(),
            $exception->getFile(),
            $exception->getMessage(),
            $exception->getTraceAsString()
        );

        if (($depth == -1 || $depth > 0) && $exception->getPrevious() instanceof Exception) {
            $depth -= $depth > 0 ? 1 : 0;
            $errorDebugMsg = sprintf(
                "%s\n\nPRIVIOUS EXCEPTION:\n%s",
                $errorDebugMsg,
                static::getDebug($exception->getPrevious(), $depth)
            );
        }

        return $errorDebugMsg;
    }
}
