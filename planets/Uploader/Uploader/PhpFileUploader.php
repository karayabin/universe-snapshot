<?php

namespace Uploader\Uploader;

/*
 * LingTalfi 2016-01-06
 */
use Bat\ArrayTool;
use Uploader\File\PhpFile;

class PhpFileUploader implements UploaderInterface
{

    private $errors;
    private $validatorCb;
    private $processFileCb;

    public function __construct()
    {
        $this->errors = [];
    }

    public static function create()
    {
        return new static();
    }


    /**
     * @param $file
     * @return false|array, the array of paths where the given file has been put,
     *                  or false in case of errors.
     */
    public function upload($file)
    {

        if (is_array($file) && false === ArrayTool::getMissingKeys($file, [
                'name',
                'type',
                'size',
                'tmp_name',
                'error',
            ])
        ) {
            $oFile = PhpFile::create();
            $oFile->name = $file['name'];
            $oFile->type = $file['type'];
            $oFile->size = $file['size'];
            $oFile->tmp_name = $file['tmp_name'];
            $oFile->error = $file['error'];

            return $this->uploadFile($oFile);

        }
        else {
            $this->addError("invalid file input");
        }
        return false;
    }

    /**
     * @return array of error messages
     */
    public function getErrors()
    {
        return $this->errors;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * bool  function ( PhpFile $f, array &$errors );
     */
    public function setValidatorCb(callable $validatorCb)
    {
        $this->validatorCb = $validatorCb;
        return $this;
    }


    /**
     * void  function ( PhpFile $f, array &$files );
     */
    public function setProcessFileCb(callable $processFileCb)
    {
        $this->processFileCb = $processFileCb;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function addError($msg)
    {
        $this->errors[] = $msg;
        return $this;
    }

    protected function uploadFile(PhpFile $f)
    {
        if (0 === $f->error) {

            $errors = [];
            $isValid = $this->validate($f, $errors);
            if (false === $isValid) {
                foreach ($errors as $msg) {
                    $this->addError($msg);
                }
                return false;
            }


            $files = [];
            $this->processFile($f, $files);
            return $files;
        }
        else {
            // http://php.net/manual/en/features.file-upload.errors.php
            switch ($f->error) {
                case UPLOAD_ERR_CANT_WRITE:
                    $this->addError("Failed to write file to disk");
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $this->addError("A PHP extension stopped the file upload");
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $this->addError("The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form");
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    $this->addError("The uploaded file exceeds the upload_max_filesize directive in php.ini");
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $this->addError("No file was uploaded");
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $this->addError("Missing a temporary folder");
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $this->addError("The uploaded file was only partially uploaded");
                    break;
                default:
                    $this->addError("An unknown php error occurred");
                    break;
            }
        }
        return false;
    }


    protected function processFile(PhpFile $f, array &$files)
    {
        if (null !== $this->processFileCb) {
            call_user_func_array($this->processFileCb, [$f, &$files]);
        }
    }


    protected function validate(PhpFile $f, array &$errors)
    {
        if (null !== $this->validatorCb) {
            return call_user_func_array($this->validatorCb, [$f, &$errors]);
        }
        return true;
    }


}

