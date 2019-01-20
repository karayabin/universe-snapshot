<?php


namespace Installer\Report;

use Installer\Report\ReportMessage\ReportMessageInterface;

interface ReportInterface
{
    /**
     * msg: can be anything:
     * - exception
     * - string
     * - array (of error strings)
     */
    public function addMessage($msg);

    /**
     * @return ReportMessageInterface[]
     */
    public function getMessages();

    public function hasMessages();
}