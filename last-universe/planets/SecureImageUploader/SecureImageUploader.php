<?php


use Bat\ArrayTool;
use ThumbnailTools\ThumbnailTool;

class SecureImageUploader
{


    /**
     * This function reforges the image, to eliminate potential backdoor nested in the user's image.
     *
     * - dest, can be either:
     *      - path to the parent directory, in which case the fileName will be the based on the 'name' property
     *              of the phpUploadEntry array.
     *      - path to the file to create (if it already exists, it will be overridden)
     *
     * - maxWidth: null
     * - maxHeight: null
     *
     * If both maxWidth and maxHeight are null, then the image will be recreated with its original dimension.
     *
     * If one of the two parameters is specified, the other will adapt to preserve the ratio of the original image.
     *
     * If both maxWidth and maxHeight are specified, then the image will be constrained in the box defined by those
     * limits. The ratio of the original image is always preserved.
     *
     *
     *
     * - errCallback: if provided, any error message will be sent to this function.
     * Otherwise, a \RuntimeException will be thrown in case of error.
     *
     *
     *
     * The function returns the path of the uploaded image, or false in case of problems.
     *
     */
    public static function upload(array $phpUploadEntry, $dest, $maxWidth = null, $maxHeight = null, \Closure $errCallback = null)
    {

        // error mechanism
        $error = function ($msg) use ($errCallback) {
            if (null !== $errCallback) {
                call_user_func($errCallback, $msg);
            } else {
                throw new \RuntimeException($msg);
            }
        };


        if (false === ArrayTool::getMissingKeys($phpUploadEntry, [
                'name',
                'type',
                'size',
                'tmp_name',
                'error',
            ])
        ) {
            if (true === is_uploaded_file($phpUploadEntry['tmp_name'])) {

                if (0 === (int)$phpUploadEntry['error']) {
                    if (in_array($phpUploadEntry['type'], ['image/jpeg', 'image/gif', 'image/png'])) {


                        // what's the destination?
                        $path = null;
                        if (is_file($dest)) {
                            $path = $dest;
                        } elseif (is_dir($dest)) {
                            $path = $dest . "/" . $phpUploadEntry['name'];
                        }

                        if (null !== $path) {
                            try {
                                // now forge the thumbnail to ensure it's a true (inoffensive) image
                                if (true === ThumbnailTool::biggest($phpUploadEntry['tmp_name'], $path, $maxWidth, $maxHeight)) {
                                    return $path;
                                } else {
                                    $error("The thumbnail creation failed");
                                }

                            } catch (\Exception $e) {
                                $error($e->getMessage());
                            }
                        } else {
                            $error("Wrong argument: dest must be either a file or a dir");
                        }

                    } else {
                        $error("Wrong mime type");
                    }
                } else {
                    // http://php.net/manual/en/features.file-upload.errors.php
                    switch ($phpUploadEntry['error']) {
                        case UPLOAD_ERR_CANT_WRITE:
                            $error("phpError: Failed to write file to disk");
                            break;
                        case UPLOAD_ERR_EXTENSION:
                            $error("phpError: A PHP extension stopped the file upload");
                            break;
                        case UPLOAD_ERR_FORM_SIZE:
                            $error("phpError: The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form");
                            break;
                        case UPLOAD_ERR_INI_SIZE:
                            $error("phpError: The uploaded file exceeds the upload_max_filesize directive in php.ini");
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            $error("phpError: No file was uploaded");
                            break;
                        case UPLOAD_ERR_NO_TMP_DIR:
                            $error("phpError: Missing a temporary folder");
                            break;
                        case UPLOAD_ERR_PARTIAL:
                            $error("phpError: The uploaded file was only partially uploaded");
                            break;
                        default:
                            $error("phpError: An unknown php error occurred");
                            break;
                    }
                }
            } else {
                $error("file not uploaded via HTTP POST, and thus considered unsafe");
            }

        } else {
            $error("invalid file input.");
        }

        return false;

    }


}