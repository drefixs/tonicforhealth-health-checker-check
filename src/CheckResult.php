<?php

namespace TonicHealthCheck\Check;

/**
 * Class CheckResult
 * @package TonicHealthCheck\Check
 */
class CheckResult
{
    const STATUS_OK = 0;

    /**
     * @var int
     */
    protected $status;

    /**
     * @var CheckException
     */
    protected $error;

    /**
     * CheckResult constructor.
     * @param int            $status
     * @param CheckException $error
     */
    public function __construct($status, CheckException $error = null)
    {
        $this->setStatus($status);
        $this->setError($error);
    }

    /**
     * @return CheckResult
     */
    public static function okResult()
    {
        return new self(static::STATUS_OK);
    }

    /**
     * @param int            $status
     * @param CheckException $error
     * @return CheckResult
     */
    public static function errorResult($status, CheckException $error)
    {
        return new self($status, $error);
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return CheckException
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return bool
     */
    public function isOk()
    {
        return $this->getStatus() == static::STATUS_OK;
    }

    /**
     * @param int $status
     */
    protected function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param CheckException $error
     */
    protected function setError(CheckException $error = null)
    {
        $this->error = $error;
    }

}