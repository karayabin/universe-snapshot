<?php


namespace Ling\Light_Logger\Listener;


use Ling\Bat\FileSystemTool;

/**
 * The LightLastMessageFileLoggerListener class.
 *
 * This class just writes the last message to a file.
 * The file is re-written entirely every time, so that the file
 * just contains the last message, which is sometimes easier to read than a long list of logs.
 *
 */
class LightLastMessageFileLoggerListener extends BaseLoggerListener implements LightLoggerListenerInterface
{

    /**
     * This property holds the file for this instance.
     * @var string
     */
    protected $file;


    /**
     * Builds the LightLastMessageFileLoggerListener instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->file = "/tmp/LightLastMessageFileLoggerListener.txt";
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
        $msg = $this->getFormattedMessage($channel, $msg);
        FileSystemTool::mkfile($this->file, $msg . PHP_EOL);
    }


}