<?php


namespace Jin\Log\Listener;


use Bat\ConvertTool;
use Bat\FileSystemTool;
use Bat\FileTool;
use Bat\ZipTool;

/**
 * @info The FileLoggerListener is a simple logger listener which writes the log messages to a specified file.
 * When the file size get bigger than a certain threshold, the file is rotated (copied to an archive file,
 * and the original file is emptied so that we can log new messages into it again).
 *
 * Note: the rotation system is optional and active by default with a default size of 2M.
 * Also, the rotation system by default zips all archives (rotated files).
 * This behaviour can be changed in the configuration of the properties.
 *
 * About the rotation system:
 * the rotation is executed after the message is written, which means the maxFileSize is not a strict limit,
 * but rather an indication AFTER WHICH the FileLoggerListener performs the rotation.
 *
 *
 * Rotated file format:
 * ---------------------
 *
 * The format of a rotated file is the following:
 *      <fileName>-<dateTime> (.<extension>)?  (.zip)?
 *
 * With:
 * - fileName: the file name
 * - dateTime: the datetime (for instance 2019-01-16__17-04-40)
 * - extension: the extension of the rotated file, defined by the $rotatedFileExtension property.
 *          The default value is "log".
 *          Empty value is also accepted (in which case the extension is not appended, but this independent of the zip extension)
 *
 *
 * Note that if the file is zipped (see zipRotatedFiles property),
 * the ".zip" extension is being added at the end of this file format.
 *
 *
 *
 * Test code
 * -------------
 * $fileListener = new FileLoggerListener();
 * $fileListener->configure([
 *      "file" => __DIR__ . "/maurice.log",
 *      "isFileRotationEnabled" => true,
 *      "maxFileSize" => '7000',
 *      "zipRotatedFiles" => true,
 *      "rotatedFileExtension" => 'pom',
 * ]);
 *
 * $logger = new Logger();
 * $logger->listen("debug", [$fileListener, "listen"]);
 * $logger->debug("This is a debug message");
 *
 *
 *
 *
 */
class FileLoggerListener implements LoggerListenerInterface
{

    /**
     * @info This property holds the path to the log file.
     * This class will attempt to create it if it does not exist.
     */
    protected $file;


    /**
     * @info This property holds whether the file rotation system should be used.
     * @type bool=true
     */
    protected $isFileRotationEnabled;

    /**
     * @info This property holds the maximum file size beyond which the rotation is triggered (only if the rotation
     * system is active).
     * The default value is 2M.
     * The syntax allowed here is defined in the Bat\ConvertTool::convertHumanSizeToBytes method.
     * @seeMethod Bat\ConvertTool::convertHumanSizeToBytes
     *
     *
     *
     */
    protected $maxFileSize;


    /**
     * @info This property holds the file extension of the rotated files.
     *          The default value is "log".
     *          If set to null, then the extension of the log file will be used.
     * @type string|null
     */
    protected $rotatedFileExtension;

    /**
     * @info This property holds whether the rotated files should be zipped.
     * If true, then the rotated files are zipped.
     * @type bool=true
     */
    protected $zipRotatedFiles;


    /**
     * @info Sets default values for the configurable properties.
     */
    public function __construct()
    {
        $this->file = "/tmp/jin_default_log_file.log";
        $this->isFileRotationEnabled = true;
        $this->maxFileSize = "2M";
        $this->rotatedFileExtension = "log";
        $this->zipRotatedFiles = true;

    }


    /**
     * @info Configure the properties using an array (useful for dynamically created services).
     * @param array $options (the keys are the configurable properties of this class, see the corresponding properties for more info)
     *      - file
     *      - isFileRotationEnabled
     *      - maxFileSize
     *      - rotatedFileFormat
     *      - zipRotatedFiles
     */
    public function configure(array $options)
    {
        if (array_key_exists("file", $options)) {
            $this->file = $options['file'];
        }
        if (array_key_exists("isFileRotationEnabled", $options)) {
            $this->isFileRotationEnabled = (bool)$options['isFileRotationEnabled'];
        }
        if (array_key_exists("maxFileSize", $options)) {
            $this->maxFileSize = $options['maxFileSize'];
        }
        if (array_key_exists("rotatedFileExtension", $options)) {
            $this->rotatedFileExtension = $options['rotatedFileExtension'];
        }
        if (array_key_exists("zipRotatedFiles", $options)) {
            $this->zipRotatedFiles = (bool)$options['zipRotatedFiles'];
        }
    }

    /**
     * @info Writes the logger message to the file specified in the configuration,
     * and rotates the file when the file size gets too big.
     * See more in the class description.
     *
     * @implementation
     */
    public function listen($msg, $channel)
    {
        // first log
        FileTool::append($msg . PHP_EOL, $this->file);

        // then handle rotation
        if (true === $this->isFileRotationEnabled) {
            $maxSizeInBytes = ConvertTool::convertHumanSizeToBytes($this->maxFileSize);
            $curLogSize = filesize($this->file);
            if ($curLogSize >= $maxSizeInBytes) {

                $format = $this->getFileFormat();

                // now copy the log to the rotated file, and empty the log
                FileSystemTool::copyFile($this->file, $format);
                FileSystemTool::mkfile($this->file, "", 0777, 0);


                // zip file?
                if (true === $this->zipRotatedFiles) {
                    $zipFile = $format . ".zip";
                    if (false !== ZipTool::zip($format, $zipFile)) {
                        unlink($format); // don't forget to remove the non-zip rotated file
                    }

                }

            }
        }


    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @info Returns the file format of the rotated file.
     *       Note: the addition of the .zip extension is not handled by this method.
     * @return string
     */
    protected function getFileFormat()
    {
        $format = $this->file . "-" . date("Y-m-d__H-i-s");
        if ($this->rotatedFileExtension) {
            $format .= "." . $this->rotatedFileExtension;
        }
        return $format;
    }
}