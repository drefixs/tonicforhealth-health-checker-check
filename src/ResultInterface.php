<?php

namespace TonicHealthCheck\Check;

use ZendDiagnostics\Result\ResultInterface as ZendDiagnosticsResultInterface;

/**
 * Class AbstractResult.
 */
interface ResultInterface extends ZendDiagnosticsResultInterface
{
    const STATUS_OK = 0;

    /**
     * @return int
     */
    public function getStatus();

    /**
     * @return CheckException|null
     */
    public function getError();

    /**
     * @return bool
     */
    public function isOk();

    /**
     * Get message related to the result.
     *
     * @return string
     */
    public function getMessage();

    /**
     * Get detailed info on the test result (if available).
     *
     * @return mixed|null
     */
    public function getData();
}
