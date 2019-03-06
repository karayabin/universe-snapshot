<?php


namespace Ling\UltimateUploadHandler\UploadHandler;


use Ling\Bat\FileSystemTool;
use Ling\UltimateUploadHandler\Exception\UltimateUploadHandlerException;

class WebBasicUploadHandler extends BasicUploadHandler
{


    protected $baseDir;


    public function __construct()
    {
        parent::__construct();
        $this->baseDir = null;
    }


    public function setUploadBaseDir(string $baseDir)
    {
        $this->baseDir = $baseDir;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getReturnInfo(string $dstFile, array $phpFileItem)
    {
        if ($this->baseDir) {
            $baseDir = realpath($this->baseDir);
            $dstFile = realpath($dstFile);
            if (FileSystemTool::existsUnder($dstFile, $baseDir)) {
                $relativePath = str_replace($baseDir, "", $dstFile);
                return [
                    "relativePath" => $relativePath,
                    "fileName" => basename($relativePath),
                ];
            }
            throw new UltimateUploadHandlerException("Configuration error: dstFile was not uploaded under the wwwDir");
        }
        throw new UltimateUploadHandlerException("Configuration error: baseDir not set");
    }

}