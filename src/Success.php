<?php

namespace TonicHealthCheck\Check;

use ZendDiagnostics\Result\SuccessInterface;

/**
 * Class Success.
 */
class Success extends AbstractResult implements SuccessInterface
{
    /**
     * Success constructor.
     *
     * @param int $status
     */
    public function __construct($status = self::STATUS_OK)
    {
        parent::__construct($status);
    }
}
