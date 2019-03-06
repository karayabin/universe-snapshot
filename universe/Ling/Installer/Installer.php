<?php


namespace Ling\Installer;


use Ling\Installer\Exception\AbortInstallException;
use Ling\Installer\Operation\OperationInterface;
use Ling\Installer\Report\ReportInterface;


/**
 *
 * Install process is composed of many operations
 *
 * Each operation can add messages to the Report.
 *
 * An operation can throw an AbortInstallException, which would stop the
 * whole process.
 *
 * An operation can throw any other exception, which would automatically be added
 * to the report.
 *
 */
class Installer implements InstallerInterface
{


    private $operations;

    public function __construct()
    {
        $this->operations = [];
    }


    public function addOperation(OperationInterface $operation)
    {
        $this->operations[] = $operation;
        return $this;
    }


    public function run(ReportInterface $report)
    {
        foreach ($this->operations as $operation) {
            try {
                $operation->execute($report);
            } catch (AbortInstallException $e) {
                $className = get_class($operation);
                $msg = "Procedure was aborted because of operation $className";
                $report->addMessage($msg);
                $report->addMessage($e);
                break;
            } catch (\Exception $e) {
                $report->addMessage($e);
            }
        }
    }

}