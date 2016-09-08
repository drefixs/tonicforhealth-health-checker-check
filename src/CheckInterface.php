<?php

namespace TonicHealthCheck\Check;

use ZendDiagnostics\Check\CheckInterface as ZendDiagnosticsCheckInterface;

/**
 * Class AbstractCheck.
 */
interface CheckInterface extends ZendDiagnosticsCheckInterface
{
    const CHECK_NODE_DEFAULT = 'main';
    const COMPONENT = 'noname';
    const GROUP = 'all';
    const CHECK = 'main';

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
     * @return null|string
     */
    public function getIndent();

    /**
     * @return \TonicHealthCheck\Check\ResultInterface
     */
    public function check();

    /**
     * @return bool
     */
    public function performCheck();
}
