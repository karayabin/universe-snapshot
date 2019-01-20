<?php


namespace Logger\Listener;


use Bat\FileSystemTool;
use Logger\Listener\Exception\LoggerListenerException;

class FileLoggerListener extends WithFormatLoggerListener
{

    private $path;
    private $strictMode;

    public function __construct()
    {
        parent::__construct();
        $this->strictMode = true;
    }

    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    public function setStrictMode($strictMode)
    {
        $this->strictMode = $strictMode;
        return $this;
    }


    protected function doListen($msg, $identifier)
    {
        $file = $this->path;
        $msg = $this->format($msg, $identifier);
        $msg .= PHP_EOL;

        if (false === FileSystemTool::mkfile($file, $msg, 0777, \FILE_APPEND)) {
            if (true === $this->strictMode) {
                throw new LoggerListenerException("Log file not found and cannot be created: $file");
            }
        }
    }
}