<?php

namespace TonicHealthCheck\Check;

use Exception;

/**
 * Class AbstractCheck.
 */
abstract class AbstractCheck implements CheckInterface
{
    /**
     * @var null|string
     */
    protected $checkNode = self::CHECK_NODE_DEFAULT;

    /**
     * @var ResultInterface
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
     * @return null|string
     */
    public function getLabel()
    {
        return $this->getIndent();
    }

    /**
     * @return ResultInterface
     */
    public function getLastCheckResult()
    {
        return $this->lastCheckResult;
    }

    /**
     * @return ResultInterface
     */
    public function check()
    {
        try {
            $this->performCheck();
            $checkResult = new Success();
        } catch (CheckException $exception) {
            $checkResult = new Failure($exception->getCode(), $exception);
        } catch (Exception $exception) {
            $errorUnexpected  = CheckUnexpectedException::catchUnexpectedError(__CLASS__, __METHOD__, $exception);
            $checkResult = new Failure($errorUnexpected->getCode(), $errorUnexpected);
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
     * @param ResultInterface $lastCheckResult
     */
    protected function setLastCheckResult(ResultInterface $lastCheckResult)
    {
        $this->lastCheckResult = $lastCheckResult;
    }
}
