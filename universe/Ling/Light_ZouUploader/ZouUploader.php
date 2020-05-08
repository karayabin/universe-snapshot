<?php


namespace Ling\Light_ZouUploader;

use Ling\Bat\FileSystemTool;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_ZouUploader\Exception\LightZouUploaderException;
use Ling\PhpFileValidator\PhpFileValidator;

/**
 * The ZouUploader class.
 */
class ZouUploader
{
    /**
     * The path where to put the uploaded file.
     * @var string
     */
    protected $destinationPath;

    /**
     * This property holds the options for this instance.
     *
     * - override: bool=false
     *      If the uploaded file is going to override an existing file, the operation is rejected by default.
     *      Set this to true to allow file overrides.
     * - move: bool=true
     *      Whether to copy the uploaded file to the destination, or to move it.
     *      This is done at the end of the upload, when the file is fully uploaded.
     *      By default, when the file is moved. Set this to false to make a copy instead.
     *
     *
     *
     *
     * @var array
     */
    protected $options;

    /**
     * Builds the ZouUploader instance.
     */
    public function __construct()
    {
        $this->destinationPath = null;
        $this->options = [];
    }

    /**
     * Sets the destinationPath.
     *
     * @param string $destinationPath
     */
    public function setDestinationPath(string $destinationPath)
    {
        $this->destinationPath = $destinationPath;
    }

    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }


    /**
     * Uploads the file/chunk brought via the given request and returns whether
     * the corresponding file is fully uploaded on the file system.
     *
     * Throws an exception if something wrong happens.
     *
     * @param HttpRequestInterface $request
     * @return bool
     * @throws \Exception
     */
    public function isUploaded(HttpRequestInterface $request): bool
    {
        $override = $this->options['override'] ?? false;
        $useMove = $this->options['move'] ?? true;

        if (false === $override && file_exists($this->destinationPath)) {
            $this->error("The file " . basename($this->destinationPath) . " already exists on the server.");
        }


        $useChunks = (bool)($request->getPostValue("useChunks", false) ?? false);
        $files = $request->getFiles();
        if (true === empty($files)) {
            $this->error("The php \$_FILES super array was empty.");
        }

        $phpFile = current($files);
        PhpFileValidator::checkPhpFile($phpFile);


        //--------------------------------------------
        // REGULAR UPLOAD PROTOCOL
        //--------------------------------------------
        if (false === $useChunks) {
            // since the phpFile has already been checked, nothing left to do
            if (true === $useMove) {
                if (true === FileSystemTool::move($phpFile['tmp_name'], $this->destinationPath)) {
                    return true;
                } else {
                    $this->error("An error occurred, could not move the file " . $phpFile['name']);
                }
            } else {
                if (true === FileSystemTool::copyFile($phpFile['tmp_name'], $this->destinationPath)) {
                    return true;
                } else {
                    $this->error("An error occurred with the copy of the file " . $phpFile['name']);
                }
            }

        } else {
            //--------------------------------------------
            // CHUNK UPLOAD
            //--------------------------------------------
            $start = (int)$request->getPostValue("start");
            $end = (int)$request->getPostValue("end");
            $isLastChunk = (bool)$request->getPostValue("last_chunk");


            $src = $phpFile['tmp_name'];
            $dst = $this->destinationPath;
            $dstPartial = $dst . ".part";


            /**
             * If the user doesn't ask for a resume operation, then
             * we need to remove the old partial before starting the upload operation.
             * This use case happens when the file starts to upload the file but then abort,
             * but then upload again.
             * If we don't remove this partial, the partial keeps growing every time the user upload new chunks,
             * this ends up with an inconsistent file that IS NOT the same as the original file that the user wanted to upload.
             *
             */
            if (0 === $start && file_exists($dstPartial)) {
                unlink($dstPartial);
            }


            if (false === file_exists($dstPartial)) {
                FileSystemTool::mkfile($dstPartial, "");
            }
            file_put_contents($dstPartial, file_get_contents($src), FILE_APPEND);


            if (true === $isLastChunk) {
                if (true === $useMove) {
                    FileSystemTool::move($dstPartial, $dst);
                } else {
                    FileSystemTool::copyFile($dstPartial, $dst);
                    unlink($dstPartial);
                }
                return true;
            }

        }

        return false;

    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightZouUploaderException($msg);
    }
}