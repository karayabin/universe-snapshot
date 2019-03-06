<?php


namespace Ling\Installer\Operation\DeployFile;


use Ling\Bat\FileSystemTool;
use Ling\Installer\Exception\AbortInstallException;
use Ling\Installer\Operation\OperationInterface;
use Ling\Installer\Report\ReportInterface;

class RemoveFileOperation implements OperationInterface
{

    private $_sources;
    private $dstDir;

    public function __construct()
    {

    }

    public static function create()
    {
        return new self();
    }

    public function sources(array $sources)
    {
        $this->_sources = $sources;
        return $this;
    }

    public function destDir($destDir)
    {
        $this->dstDir = $destDir;
        return $this;
    }


    public function execute(ReportInterface $report)
    {
        if (!is_dir($this->dstDir)) {
            $this->abort("Destination dir must exist");
        } else {
            foreach ($this->_sources as $f) {
                $file = $this->dstDir . "/" . $f;
                if (is_string($file) && !empty($file)) {
                    if (true === FileSystemTool::existsUnder($file, $this->dstDir)) {
                        FileSystemTool::remove($file);
                    }
                }
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