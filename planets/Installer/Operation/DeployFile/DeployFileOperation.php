<?php


namespace Installer\Operation\DeployFile;


use Bat\FileSystemTool;
use Installer\Exception\AbortInstallException;
use Installer\Operation\OperationInterface;
use Installer\Report\ReportInterface;

class DeployFileOperation implements OperationInterface
{

    private $srcDir;
    private $dstDir;

    public function __construct()
    {

    }

    public static function create()
    {
        return new self();
    }

    public function sourceDir($srcDir)
    {
        $this->srcDir = $srcDir;
        return $this;
    }

    public function destDir($destDir)
    {
        $this->dstDir = $destDir;
        return $this;
    }


    public function execute(ReportInterface $report)
    {
        if (!is_dir($this->srcDir)) {
            $this->abort("Source dir must exist (" . $this->srcDir . ")");
        } elseif (!is_dir($this->dstDir)) {
            $this->abort("Destination dir must exist (" . $this->dstDir . ")");
        } else {
            $errors = [];
            FileSystemTool::copyDir($this->srcDir, $this->dstDir, true, $errors);
            if (count($errors) > 0) {
                $report->addMessage($errors);
            }
        }
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function abort($msg)
    {
        throw new AbortInstallException($msg);
    }

}