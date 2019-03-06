<?php


namespace Ling\Installer\Operation;


use Ling\Installer\Exception\AbortInstallException;
use Ling\Installer\Report\ReportInterface;

interface OperationInterface
{

    /**
     * @param ReportInterface $report
     * @throws AbortInstallException to abort the whole install process
     * @throws \Exception to signal something unexpected
     */
    public function execute(ReportInterface $report);
}