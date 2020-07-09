<?php


namespace Ling\Light_Logger\Listener;


use Ling\Bat\FileSystemTool;

/**
 * The LightCleanableFileLoggerListener class.
 *
 *
 * The idea behind this class is that you can clean the log at any moment (meaning emptying the log file).
 *
 * In order to do so, set the message of the log to --clean-- (this is a special string that signals
 * the logger to clean the current file).
 *
 *
 */
class LightCleanableFileLoggerListener extends LightFileLoggerListener implements LightLoggerListenerInterface
{

    /**
     * This property holds the file for this instance.
     * @var string
     */
    protected $file;


    /**
     * Builds the LightCleanableFileLoggerListener instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->file = "/tmp/LightCleanableFileLoggerListener.txt";
    }

    /**
     * Sets the file.
     *
     * @param string $file
     */
    public function setFile(string $file)
    {
        $this->file = $file;
    }


    /**
     * Configures this instance.
     *
     * The available options are:
     * - file
     *
     * Note: you can also use the setFile method to set the file if you prefer.
     *
     *
     * @param array $options
     */
    public function configure(array $options)
    {
        parent::configure($options);

        if (array_key_exists("file", $options)) {
            $this->file = $options['file'];
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function listen($msg, string $channel)
    {
        if ('--clean--' === $msg) {
            FileSystemTool::mkfile($this->file, "");
        } else {
            parent::listen($msg, $channel);
        }
    }


}