<?php


namespace Ling\Light_UploadGems\GemHelper;


use Ling\Bat\CaseTool;
use Ling\Bat\ConvertTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\FileTool;
use Ling\Bat\HashTool;
use Ling\Bat\MimeTypeTool;
use Ling\Bat\SmartCodeTool;
use Ling\Bat\TagTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_AjaxFileUploadManager\Exception\LightAjaxFileUploadManagerException;
use Ling\Light_UploadGems\Exception\LightUploadGemsException;
use Ling\ThumbnailTools\ThumbnailTool;


/**
 * The GemHelper class.
 */
class GemHelper implements GemHelperInterface
{

    /**
     * This property holds the config for this instance.
     * @var array
     */
    protected $config;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * An array of tagName => tagValue.
     *
     * @var array
     */
    protected $tags;


    /**
     * Builds the GemHelper instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->config = [];
        $this->tags = [];
    }


    /**
     * Sets the config for this gemHelper.
     * @param array $config
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }







    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
    }


    /**
     * @implementation
     */
    public function applyNameTransform(string $filename): string
    {
        $conf = $this->config['name'] ?? [];
        foreach ($conf as $transform) {
            $filename = $this->getTransformedName($filename, $transform);
        }
        return $filename;
    }


    /**
     * @implementation
     */
    public function applyNameValidation(string $filename)
    {
        $validationRules = $this->config['name_validation'] ?? [];
        if ($validationRules) {

            $errorMessage = null;
            $isValid = true;

            foreach ($validationRules as $name => $param) {
                if (false === $this->executeNameValidationRule($name, $param, $filename, $errorMessage)) {
                    $isValid = false;
                    break;
                }
            }
            if (false === $isValid) {
                return $errorMessage;
            }
        }
        return true;
    }


    /**
     * @implementation
     */
    public function applyValidation(string $path)
    {
        $validationRules = $this->config['validation'] ?? [];
        if ($validationRules) {

            $errorMessage = null;
            $isValid = true;

            foreach ($validationRules as $name => $param) {
                if (false === $this->executeValidationRule($name, $param, $path, $errorMessage)) {
                    $isValid = false;
                    break;
                }
            }
            if (false === $isValid) {
                return $errorMessage;
            }
        }
        return true;
    }


    /**
     * @implementation
     */
    public function applyCopies(string $path): string
    {
        // reserved tag
        $this->tags['app_dir'] = $this->container->getApplicationDir();

        $desiredCopyPath = $path;
        $copies = $this->config['copies'] ?? [];
        $last = null;

        if ($copies) {

            $fileToRemove = null;


            $dstPaths = [$path];
            $previousPath = $path;


            foreach ($copies as $copy) {


                TagTool::applyTags($this->tags, $copy);


                //--------------------------------------------
                // source
                //--------------------------------------------
                $src = $previousPath;
                if (array_key_exists("input", $copy)) {
                    $index = $copy['input'];
                    if (array_key_exists($index, $dstPaths)) {

                        $src = $dstPaths[$index];

                    } else {
                        $this->error("Index \"$index\" not found in the current copies.");
                    }
                }

                //--------------------------------------------
                // destination
                //--------------------------------------------
                $dst = $previousPath;
                if (array_key_exists("path", $copy)) {
                    $dst = $copy['path'];
                    if ('/' !== $dst[0]) {
                        // relative path
                        $dir = dirname($src);
                        $dst = $dir . "/" . $dst;
                    }
                } elseif (array_key_exists('dir', $copy)) {
                    $dir = $copy['dir'];
                    if ('/' !== $dir[0]) {
                        // relative path
                        $srcDir = dirname($src);
                        $dir = $srcDir . "/" . $dir;
                    }
                    $basename = basename($dst);
                    $dst = $dir . "/" . $basename;
                }

                if (array_key_exists('basename', $copy)) {
                    $dir = dirname($dst);
                    $ext = FileSystemTool::getFileExtension($dst);
                    $dst = $dir . "/" . $copy['basename'] . "." . $ext;
                }

                if (array_key_exists('filename', $copy)) {
                    $dir = dirname($dst);
                    $dst = $dir . "/" . $copy['filename'];
                }


                //--------------------------------------------
                // last flag
                //--------------------------------------------
                if (array_key_exists('isLast', $copy) && true === $copy['isLast']) {
                    $last = $dst;
                }


                //--------------------------------------------
                // image transformation
                //--------------------------------------------
                $isAlreadyCopied = false;
                if (array_key_exists("imageTransformer", $copy)) {
                    if (true === FileTool::isImage($src)) {
                        if (true === $this->transformImage($src, $dst, $copy['imageTransformer'])) {
                            $isAlreadyCopied = true;
                        }
                    }

                }


                if (false === $isAlreadyCopied && $src !== $dst) {
                    FileSystemTool::copyFile($src, $dst);
                }
                $previousPath = $dst;
                $desiredCopyPath = $dst;
                $dstPaths[] = $dst;

            }

            if (null !== $fileToRemove) {
                FileSystemTool::remove($fileToRemove);
            }
        }


        if (null !== $last) {
            $desiredCopyPath = $last;
        }

        return $desiredCopyPath;
    }


    /**
     * @implementation
     */
    public function getCustomConfig(): array
    {
        return $this->config['config'] ?? [];
    }


    /**
     * @implementation
     */
    public function getCustomConfigValue(string $key, bool $throwEx = true)
    {
        $conf = $this->getCustomConfig();
        if (array_key_exists($key, $conf)) {
            return $conf[$key];
        }
        if (true === $throwEx) {
            $this->error("Key not found \"$key\" in the config.");
        }
        return null;
    }







    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Check whether the given filename is valid according to the given rule name and parameter,
     * and return a boolean result.
     *
     * If not valid, the error message is set to explain the cause of the validation problem.
     *
     *
     * @param string $validationRuleName
     * @param mixed $parameter
     * @param string $filename
     * @param string|null $errorMessage
     * @return bool
     * @throws \Exception
     */
    private function executeNameValidationRule(string $validationRuleName, $parameter, string $filename, string &$errorMessage = null): bool
    {
        switch ($validationRuleName) {
            case "maxFileNameLength":
                $maxFileNameLength = (int)$parameter;
                $fileLength = strlen($filename);
                if ($fileLength > $maxFileNameLength) {
                    $errorMessage = "Validation error: the filename \"$filename\" contains too many characters. The maximum number of characters allowed is $maxFileNameLength (The uploaded filename contains $fileLength characters).";
                    return false;
                }
                break;
            case "allowSlashInFilename":
                if (false === $parameter) {
                    if (false !== strpos($filename, "/")) {
                        $errorMessage = "Validation error: the filename \"$filename\" contains the forbidden slash character.";
                        return false;
                    }
                }
                break;
            case "extensions":
                $allowedExtensions = $parameter;
                if (false === is_array($allowedExtensions)) {
                    $allowedExtensions = [$allowedExtensions];
                }
                $fileExt = strtolower(FileSystemTool::getFileExtension($filename));

                if (false === in_array($fileExt, $allowedExtensions, true)) {
                    $sList = implode(", ", $allowedExtensions);
                    $errorMessage = "Validation error: the file \"$filename\" doesn't have an accepted file extension. The allowed file extensions are $sList.";
                    return false;
                }

                break;
            default:
                throw new LightAjaxFileUploadManagerException("Unknown validation rule: $validationRuleName (with file name=\"$filename\").");
                break;
        }
        return true;
    }


    /**
     * Check whether the file (which path is given) is valid according to the given rule name and parameter,
     * and return a boolean result.
     *
     * If the file is not valid, the error message is set to explain the cause of the validation problem.
     *
     *
     * @param string $validationRuleName
     * @param mixed $parameter
     * @param string $path
     * @param string|null $errorMessage
     * @return bool
     * @throws \Exception
     */
    private function executeValidationRule(string $validationRuleName, $parameter, string $path, string &$errorMessage = null): bool
    {
        $filename = basename($path);

        switch ($validationRuleName) {
            case "maxFileSize":
                $maxFileSize = ConvertTool::convertHumanSizeToBytes($parameter);
                $fileSize = FileTool::getFileSize($path);
                if ($fileSize > $maxFileSize) {
                    $maxFileSizeHuman = ConvertTool::convertBytes($maxFileSize, "h");
                    $fileHumanWeight = ConvertTool::convertBytes($fileSize, "h");
                    $errorMessage = "Validation error: the file \"$filename\" is too big. The maximum file size allowed is $maxFileSizeHuman (the uploaded file weighted $fileHumanWeight).";
                    return false;
                }

                break;
            case "mimeType":
                $allowedMimeTypes = $parameter;
                if (false === is_array($allowedMimeTypes)) {
                    $allowedMimeTypes = [$allowedMimeTypes];
                }
                $fileMimeType = MimeTypeTool::getMimeType($path);

                if (false === in_array($fileMimeType, $allowedMimeTypes, true)) {
                    $sList = implode(", ", $allowedMimeTypes);
                    $errorMessage = "Validation error: the file \"$filename\" doesn't have an accepted mime type. The allowed mime types are $sList. But the file had a mime type of $fileMimeType.";
                    return false;
                }

                break;
            default:
                throw new LightAjaxFileUploadManagerException("Unknown validation rule: $validationRuleName (with file name=\"$filename\").");
                break;
        }
        return true;
    }


    /**
     * Transforms the name according to the given nameTransformer, and returns the transformed name.
     *
     * @param string $name
     * @param string $nameTransformer
     * @return string
     * @throws \Exception
     */
    private function getTransformedName(string $name, string $nameTransformer): string
    {


        $extension = FileSystemTool::getFileExtension($name);
        $fileName = FileSystemTool::getFileName($name);
        list($transformerId, $transformerParams) = $this->extractFunctionInfo($nameTransformer);

        switch ($transformerId) {
            case "randomize":
                if (count($transformerParams) > 0) {
                    $length = $transformerParams[0];
                    if ($length > 0) {
                        $keepExtension = true;
                        if (array_key_exists(1, $transformerParams)) {
                            $keepExtension = $transformerParams[1];
                        }
                        $name = HashTool::getRandomHash64($length);
                        if (true === $keepExtension) {
                            if ($extension) {
                                $name .= "." . $extension;
                            }
                        }
                    } else {
                        throw new LightUploadGemsException("Bad configuration error: the length parameter of the randomize nameTransformer function must be greater than 0 (file name=$name).");
                    }
                } else {
                    throw new LightUploadGemsException("Bad configuration error: the length parameter of the randomize nameTransformer function is mandatory (file name=$name).");
                }

                break;
            case "changeBasename":
                if (count($transformerParams) > 0) {
                    $newName = $transformerParams[0];
                    $name = $newName;
                    if ($extension) {
                        $name .= "." . $extension;
                    }
                } else {
                    throw new LightUploadGemsException("Bad configuration error: the newName parameter of the changeFileName nameTransformer function is mandatory (file name=$name).");
                }
                break;
            case "changeFilename":
                if (count($transformerParams) > 0) {
                    $newName = $transformerParams[0];
                    $name = $newName;
                } else {
                    throw new LightUploadGemsException("Bad configuration error: the newName parameter of the set nameTransformer function is mandatory (file name=$name).");
                }
                break;
            case "snake":
                $name = CaseTool::toSnake($fileName);
                if ($extension) {
                    $name .= "." . $extension;
                }
                break;
            default:
                throw new LightUploadGemsException("Bad configuration error: the nameTransformer function $transformerId is not recognized yet (file name=$name).");
                break;
        }

        return $name;
    }

    /**
     * Parses the given transformer string, and returns an info array with the following structure:
     *
     * - 0: transformer id (the function name)
     * - 1: array of parameters
     *
     *
     * @param string $transformer
     * @return array
     * @throws \Exception
     *
     */
    private function extractFunctionInfo(string $transformer): array
    {
        $p = explode('(', $transformer, 2);
        $transformerId = trim($p[0]);
        $transformerParams = [];
        if (2 === count($p)) {
            $transformerStringParams = trim($p[1], ') ');
            $transformerParams = SmartCodeTool::parse('[' . $transformerStringParams . ']');
        }
        return [
            $transformerId,
            $transformerParams,
        ];
    }


    /**
     * Transforms the srcPath image according to the given imageTransformer, and stores it in dstPath.
     * Returns whether the creation of the copy was successful.
     *
     * In case of errors throws exceptions.
     *
     *
     * @param string $srcPath
     * The path to a supposedly valid image.
     *
     * @param string $dstPath
     * @param string $imageTransformer
     *
     * @return bool
     * @throws \Exception
     */
    private function transformImage(string $srcPath, string $dstPath, string $imageTransformer): bool
    {
        list($transformerId, $transformerParams) = $this->extractFunctionInfo($imageTransformer);
        switch ($transformerId) {
            case "resize":
                $width = $transformerParams[0] ?? null;
                $height = $transformerParams[0] ?? null;

                $extension = FileSystemTool::getFileExtension($dstPath);
                $options = [
                    "extension" => $extension,
                ];
                if (true === ThumbnailTool::biggest($srcPath, $dstPath, $width, $height, $options)) {
                    return true;
                } else {
                    $filename = basename($srcPath);
                    throw new LightUploadGemsException("ThumbnailTool error: couldn't resize the image (filename=\"$filename\").");
                }
                break;
            default:
                $filename = basename($srcPath);
                throw new LightUploadGemsException("Bad configuration error: the imageTransformer function $transformerId is not recognized yet (file name=\"$filename\").");
                break;
        }
        return false;
    }


    /**
     * Throws an error.
     *
     * @param string $msg
     * @throws LightUploadGemsException
     */
    private function error(string $msg)
    {
        throw new LightUploadGemsException($msg);
    }


}