<?php


namespace Ling\Installer;

use Ling\Installer\Operation\OperationInterface;
use Ling\Installer\Report\ReportInterface;

interface InstallerInterface
{
    public function addOperation(OperationInterface $operation);

    public function run(ReportInterface $report);
}