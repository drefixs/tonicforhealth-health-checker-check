<?php

namespace TonicHealthCheck\Check;

/**
 * Class AbstractResult.
 */
abstract class AbstractResult implements ResultInterface
{
    /**
     * @var int
     */
    protected $status;

    /**
     * @var CheckException|null
     */
    protected $error;

    /**
     * CheckResult constructor.
     *
     * @param int            $status
     * @param CheckException $error
     */
    public function __construct($status, CheckException $error = null)
    {
        $this->setStatus($status);
        $this->setError($error);
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return CheckException|null
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
     * Get message related to the result.
     *
     * @return string
     */
    public function getMessage()
    {
        if ($this->isOk()) {
            return '';
        }

        return $this->getError()->getMessage();
    }

    /**
     * Get detailed info on the test result (if available).
     *
     * @return mixed|null
     */
    public function getData()
    {
        return $this->getStatus();
    }

    /**
     * @param int $status
     */
    protected function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param CheckException|null $error
     */
    protected function setError(CheckException $error = null)
    {
        $this->error = $error;
    }
}
