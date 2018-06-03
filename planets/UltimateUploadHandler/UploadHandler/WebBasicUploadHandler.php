<?php


namespace UltimateUploadHandler\UploadHandler;


use Bat\FileSystemTool;
use UltimateUploadHandler\Exception\UltimateUploadHandlerException;

class WebBasicUploadHandler extends BasicUploadHandler
{


    protected $wwwDir;


    public function __construct()
    {
        parent::__construct();
        $this->wwwDir = null;
    }


    public function setWebDir(string $wwwDir)
    {
        $this->wwwDir = $wwwDir;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getReturnInfo(string $dstFile, array $phpFileItem)
    {
        if ($this->wwwDir) {
            $wwwDir = realpath($this->wwwDir);
            $dstFile = realpath($dstFile);
            if (FileSystemTool::existsUnder($dstFile, $wwwDir)) {
                $uri = str_replace($wwwDir, "", $dstFile);
                return [
                    "uri" => $uri,
                ];
            }
            throw new UltimateUploadHandlerException("Configuration error: dstFile was not uploaded under the wwwDir");
        }
        throw new UltimateUploadHandlerException("Configuration error: wwwDir not set");
    }

}