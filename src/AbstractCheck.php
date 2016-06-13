<?php

namespace TonicHealthCheck\Check;

/**
 * Class AbstractCheck
 */
abstract class AbstractCheck implements CheckInterface
{
    /**
     * @var null|string
     */
    protected $checkNode = self::CHECK_NODE_DEFAULT;

    /**
     * @var CheckResult
     */
    protected $lastCheckResult = null;

    /**
     * AbstractCheck constructor.
     *
     * @param null $checkNode
     */
    public function __construct($checkNode = null)
    {
        if (null !== $checkNode) {
            $this->setCheckNode($checkNode);
        }
    }

    /**
     * @return string
     */
    public function getCheckComponent()
    {
        return static::COMPONENT;
    }

    /**
     * @return string
     */
    public function getCheckGroup()
    {
        return static::GROUP;
    }

    /**
     * @return null|string
     */
    public function getCheckNode()
    {
        return $this->checkNode;
    }

    /**
     * @return string
     */
    public function getCheckIdent()
    {
        return static::CHECK;
    }

    /**
     * @return null|string
     */
    public function getIndent()
    {
        return $this->getCheckNode().'.'.$this->getCheckGroup().'.'.$this->getCheckComponent().'.'.$this->getCheckIdent();
    }

    /**
     * @return CheckResult
     */
    public function getLastCheckResult()
    {
        return $this->lastCheckResult;
    }

    /**
     * @return CheckResult
     */
    public function performCheck()
    {
        try {
            $this->check();
            $checkResult = CheckResult::okResult();
        } catch (CheckException $error) {
            $checkResult = CheckResult::errorResult($error->getCode(), $error);
        }

        $this->setLastCheckResult($checkResult);

        return $checkResult;
    }

    /**
     * @param string $checkNode
     */
    protected function setCheckNode($checkNode)
    {
        $this->checkNode = $checkNode;
    }

    /**
     * @param CheckResult $lastCheckResult
     */
    protected function setLastCheckResult(CheckResult $lastCheckResult)
    {
        $this->lastCheckResult = $lastCheckResult;
    }
}
