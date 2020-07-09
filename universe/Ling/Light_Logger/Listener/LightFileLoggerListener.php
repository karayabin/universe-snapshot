<?php


namespace Ling\Light_Logger\Listener;


use Ling\Bat\ConvertTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\FileTool;
use Ling\Bat\ZipTool;

/**
 * The LightFileLoggerListener class is a simple logger listener which writes the log messages to a specified file.
 *
 *
 * The file path can contain the following tags:
 *
 * - {date}: the date in mysql format (i.e. 2020-06-01)
 *
 *
 * When the file size get bigger than a certain threshold, the file is rotated (copied to an archive file,
 * and the original file is emptied so that we can log new messages into it again).
 *
 * Note: the rotation system is optional and active by default with a default size of 2M.
 * Also, the rotation system by default zips all archives (rotated files).
 * This behaviour can be changed by using the configure method.
 *
 * About the rotation system:
 * the rotation routine is executed after the message is written, which means the maxFileSize is not a strict limit,
 * but rather an indication AFTER WHICH the FileLoggerListener performs the rotation.
 * For instance, if your limit threshold is 2 Mb, your log file weights 1999 Kb and your message weights 3 Kb,
 * then the archive after the message is written will weight 2002 Kb (i.e. not 2000 Kb).
 *
 *
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
 * - dateTime: the datetime (for instance 2019-08-01__08-40-14)
 * - extension: the extension of the rotated file, defined by the $rotatedFileExtension property.
 *          The default value is "log".
 *          Empty value is also accepted (note: this is independent of the zip extension being added after)
 *
 *
 * Note that if the file is zipped (see zipRotatedFiles property),
 * the ".zip" extension is being added at the end of this file format.
 *
 *
 *
 *
 *
 *
 */
class LightFileLoggerListener extends BaseLoggerListener
{

    /**
     * This property holds the path to the log file.
     * This class will attempt to create it if it does not exist.
     *
     * @var string
     */
    protected $file;


    /**
     * This property holds whether the file rotation system should be used.
     *
     * @var bool=true
     */
    protected $isFileRotationEnabled;

    /**
     * This property holds the maximum file size beyond which the rotation is triggered (only if the rotation
     * system is active).
     *
     * The default value is 2M.
     *
     * The syntax allowed here is defined in the @page(Bat\ConvertTool::convertHumanSizeToBytes) method.
     *
     * @var string
     */
    protected $maxFileSize;


    /**
     * This property holds the file extension of the rotated files.
     *          The default value is "log".
     *          If set to null or an empty string, then the extension will not be appended to the log file.
     *
     * @var string|null
     */
    protected $rotatedFileExtension;

    /**
     * This property holds whether the rotated files should be zipped.
     * If true, then the rotated files are zipped.
     *
     * @var bool=true
     */
    protected $zipRotatedFiles;


    /**
     * Builds the LightFileLoggerListener instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->file = "/tmp/light_log.log";
        $this->isFileRotationEnabled = true;
        $this->maxFileSize = "2M";
        $this->rotatedFileExtension = "log";
        $this->zipRotatedFiles = true;
    }


    /**
     * Configures this instance.
     *
     * The available options are:
     * - file
     * - isFileRotationEnabled
     * - maxFileSize
     * - rotatedFileFormat
     * - zipRotatedFiles
     * - ...more options in the parent class, check it out
     *
     * See the corresponding properties of this class for more info.
     *
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
     * Writes the logger message to the file specified in the configuration,
     * and possibly rotates the file when the file size gets too big.
     * See more in the class description.
     *
     * @implementation
     */
    public function listen($msg, string $channel)
    {

        $msg = $this->getFormattedMessage($channel, $msg);


        $filePath = $this->file;
        $date = date("Y-m-d");
        $filePath = str_replace([
            "{date}",
        ], [
            $date,
        ], $filePath);


        // first log
        FileTool::append($msg . PHP_EOL, $filePath);

        // then handle rotation
        if (true === $this->isFileRotationEnabled) {
            $maxSizeInBytes = ConvertTool::convertHumanSizeToBytes($this->maxFileSize);
            $curLogSize = filesize($filePath);
            if ($curLogSize >= $maxSizeInBytes) {

                $format = $this->getFileFormat($filePath);

                // now copy the log to the rotated file, and empty the log
                FileSystemTool::copyFile($filePath, $format);
                FileSystemTool::mkfile($filePath, "", 0777, 0);


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
     * Returns the file format of the rotated file.
     *       Note: the addition of the .zip extension is not handled by this method.
     * @param string $filePath
     * @return string
     */
    protected function getFileFormat(string $filePath): string
    {
        $format = $filePath . "-" . date("Y-m-d__H-i-s");
        if ($this->rotatedFileExtension) {
            $format .= "." . $this->rotatedFileExtension;
        }
        return $format;
    }
}