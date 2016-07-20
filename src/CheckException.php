<?php

namespace TonicHealthCheck\Check;

/**
 * Class CheckException
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
     * @param Exception $e
     * @return string
     */
    protected static function getDebug(Exception $e, $depth = -1)
    {
        $errorDebugMsg = sprintf (
            "ERROR CODE:%d\nERROR FILE:%s\nERROR MESSAGE:%sERROR TRACE:%s",
            $e->getCode (),
            $e->getFile (),
            $e->getMessage (),
            $e->getTraceAsString ()
        );

        if( ($depth ==-1 || $depth >0 ) && $e->getPrevious() instanceof Exception){
            $depth -= $depth>0?1:0;
            $errorDebugMsg = sprintf ('%s\n\nPRIVIOUS ERROR:\n', static::getDebug ($e->getPrevious()));
        }

        return $errorDebugMsg;
    }

    public function getNestedDebug($depth = -1)
    {
        return static::getDebug($this, $depth);
    }
}
