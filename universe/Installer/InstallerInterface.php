<?php


namespace Installer;

use Installer\Operation\OperationInterface;
use Installer\Report\ReportInterface;

interface InstallerInterface
{
    public function addOperation(OperationInterface $operation);

    public function run(ReportInterface $report);
}