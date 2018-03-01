<?php


namespace SafeUploader;


use Bat\DebugTool;
use Bat\FileSystemTool;
use Bat\MimeTypeTool;
use BeeFramework\Bat\ConvertTool;
use SafeUploader\Exception\SafeUploaderException;
use SafeUploader\Tool\PhpFileTool;
use SafeUploader\Tool\SafeUploaderHelperTool;
use ThumbnailTools\ThumbnailTool;

class SafeUploader
{

    protected $configFile;
    protected $errorMode;
    protected $errors;
    protected $uploadedFilePath;
    protected $uploadedFilePaths;


    public function __construct()
    {
        $this->configFile = null;
        $this->errorMode = 'exception';
        $this->uploadedFilePath = null;
        $this->uploadedFilePaths = [];
        $this->errors = [];
    }

    public static function create()
    {
        return new static();
    }

    /**
     * errorMode: string (exception|array)=exception
     */
    public function setErrorMode($errorMode)
    {
        $this->errorMode = $errorMode;
        return $this;
    }


    public function setConfigurationFile($file)
    {
        $this->configFile = $file;
        return $this;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function uploadPhpFile($profileId, $name = null, array $payload = [], array $phpFiles = null)
    {
        if (null === $name) {
            $name = "file";
        }
        if (null === $phpFiles) {
            $phpFiles = $_FILES;
        }
        if (array_key_exists($name, $phpFiles)) {
            $phpFile = $phpFiles[$name];
            if (true === PhpFileTool::isValidPhpFileStructure($phpFile)) {
                if (0 === $phpFile['error']) {
                    if (0 !== $phpFile['size']) {
                        if (is_uploaded_file($phpFile['tmp_name'])) {
                            $payload['_file'] = $phpFile['name'];
                            $this->uploadFile($profileId, $phpFile['tmp_name'], $payload);
                        } else {
                            $this->error("The uploaded file $name was not uploaded via HTTP POST");
                        }
                    } else {
                        $this->error("The uploaded file size for file $name is 0");
                    }
                } else {
                    $this->error("The following php file error appeared for file $name : " . DebugTool::toString(PhpFileTool::getErrorInfo($phpFile['error'])));
                }
            } else {
                $this->error("Something is wrong with this php file structure for file $name: " . DebugTool::toString($phpFile));
            }
        } else {
            $this->error("Name \"$name\" not found in php files");
        }
        return $this;
    }


    public function uploadFile($profileId, $path, array $payload = [])
    {
        $f = $this->configFile;
        if (file_exists($f)) {

            $conf = SafeUploaderHelperTool::getConfigByFile($f);

            $profiles = (array_key_exists("profiles", $conf)) ? $conf['profiles'] : [];
            if (array_key_exists($profileId, $profiles)) {
                $profile = $profiles[$profileId];
                if (is_array($profile)) {
                    $this->executeProfile($profile, $path, $payload);
                } else {
                    $type = gettype($profile);
                    $this->error("profile must be an array (for profileId=$profileId), $type given");
                }
            } else {
                $this->error("profileId $profileId not found int he current configuration");
            }
        } else {
            $this->error("config file not found: $f");
        }
    }

    public function executeProfile(array $profile, $path, array $payload = [])
    {
        $this->uploadedFilePaths = [];
        if (file_exists($path)) {


            $profile = array_replace([
                "dir" => "/tmp/SafeUploader",
                "file" => null,
                "thumbs" => [],
                "isImage" => false,
                "acceptedMimeType" => null,
                "maxSize" => "2M",
            ], $profile);


            //--------------------------------------------
            // CHECKS
            //--------------------------------------------
            $hasError = false;

            // size
            $maxSize = $profile['maxSize'];
            if (false !== $maxSize) {
                if (false !== ($size = FileSystemTool::getFileSize($path))) {
                    $maxBytes = ConvertTool::convertHumanSizeToBytes($maxSize);
                    if ($size > $maxBytes) {
                        $this->error("The file size of $path is $size bytes, but only $maxBytes bytes are allowed");
                        $hasError = true;
                    }
                } else {
                    $this->error("Cannot get the file size for file $path");
                    $hasError = true;
                }
            }


            // mime type
            $acceptedMimeType = $profile['acceptedMimeType'];
            if ($acceptedMimeType) {
                if (!is_array($acceptedMimeType)) {
                    $acceptedMimeType = [$acceptedMimeType];
                }
                $fileMime = MimeTypeTool::getMimeType($path);
                if (!in_array($fileMime, $acceptedMimeType, true)) {

                    // maybe the mimetypes were given using the wildcard as the subtype
                    $p = explode("/", $fileMime);
                    $acceptedMimeMainType = array_shift($p);
                    $isOkWithWildCard = false;
                    foreach ($acceptedMimeType as $type) {
                        $p = explode("/", $type);
                        $mainType = array_shift($p);
                        $potentialWild = array_shift($p);
                        if ("*" === $potentialWild && $acceptedMimeMainType === $mainType) {
                            $isOkWithWildCard = true;
                            break;
                        }
                    }

                    if (false === $isOkWithWildCard) {
                        $this->error("The allowed mime types are " . implode(', ', $acceptedMimeType) . "; $fileMime was given for file $path");
                        $hasError = true;
                    }
                }

            }


            if (false === $hasError) {
                //--------------------------------------------
                // MOVING THE FILE
                //--------------------------------------------


                $dir = SafeUploaderHelperTool::replaceTags($profile['dir'], $payload);
                $file = $profile['file'];
                if (null === $file) {
                    if (array_key_exists("_file", $payload)) {
                        $file = $payload['_file'];
                    } else {
                        $file = basename($path);
                    }
                }
                $file = SafeUploaderHelperTool::replaceTags($file, $payload);


                $destFile = $dir . "/" . $file;


                FileSystemTool::mkfile($destFile, ""); // creating sub dirs if any


                if (true === move_uploaded_file($path, $destFile)) {
                    /**
                     * The final goal of this method is to define the uploadedFilePath in case of success.
                     */
                    $this->uploadedFilePath = $destFile;
                    $this->uploadedFilePaths[] = $destFile;


                    //--------------------------------------------
                    // PROCESSING THUMBS IF ANY
                    //--------------------------------------------
                    $isImage = $profile['isImage'];
                    if (true === $isImage) {
                        $thumbPaths = SafeUploaderHelperTool::getThumbPaths($destFile, $dir, $profile, $payload);
                        foreach ($thumbPaths as $item) {

                            $thumbDir = $item['dir'];
                            $thumbSrc = $item['src'];
                            $thumbDst = $item['dst'];
                            $maxWidth = $item['maxWidth'];
                            $maxHeight = $item['maxHeight'];

                            FileSystemTool::mkdir($thumbDir, 0777, true); // ensure that the dir exists (dir can create subdirs...)

                            if (false === ThumbnailTool::biggest($thumbSrc, $thumbDst, $maxWidth, $maxHeight)) {
                                $this->error("The thumb $thumbSrc couldn't be created to $thumbDst");
                            }
                            else{
                                $this->uploadedFilePaths[] = $thumbDst;
                            }
                        }
                    }
                } else {
                    $this->error("Could not move file $path to $destFile");
                }
            }
        } else {
            $this->error("File not found: $path");
        }
    }


    /**
     * @return null|string
     */
    public function getUploadedFilePath()
    {
        return $this->uploadedFilePath;
    }


    /**
     * @return []
     */
    public function getUploadedFilePaths()
    {
        return $this->uploadedFilePaths;
    }
    //--------------------------------------------
    //
    //--------------------------------------------

    //--------------------------------------------
    //
    //--------------------------------------------
    private function error($msg)
    {
        if ('exception' === $this->errorMode) {
            throw new SafeUploaderException($msg);
        } else {
            $this->errors[] = $msg;
        }
    }


}