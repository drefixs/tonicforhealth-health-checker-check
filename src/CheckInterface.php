<?php

namespace TonicHealthCheck\Check;

use Stomp\StatefulStomp as StatefulStomp;
use Stomp\Transport\Message;
use Stomp\Exception\StompException;
use TonicHealthCheck\Check\ActiveMQ\ActiveMQCheckException;

/**
 * Class AbstractCheck
 * @package TonicHealthCheck\Checker
 */
interface CheckInterface
{
    const CHECK_NODE_DEFAULT = 'main';
    const COMPONENT = 'noname';
    const GROUP     = 'all';
    const CHECK     = 'main';

    /**
     * @return string
     */
    public function getCheckComponent();

    /**
     * @return string
     */
    public function getCheckGroup();

    /**
     * @return null|string
     */
    public function getCheckIdent();

    /**
     * @return null|string
     */
    public function getCheckNode();

    /**
     * @return null
     */
    public function getIndent();

    /**
     * @return bool
     */
    public function check();

    /**
     * @return CheckResult
     */
    public function performCheck();
}