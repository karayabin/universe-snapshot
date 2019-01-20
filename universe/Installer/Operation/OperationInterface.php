<?php


namespace Installer\Operation;


use Installer\Exception\AbortInstallException;
use Installer\Report\ReportInterface;

interface OperationInterface
{

    /**
     * @param ReportInterface $report
     * @throws AbortInstallException to abort the whole install process
     * @throws \Exception to signal something unexpected
     */
    public function execute(ReportInterface $report);
}