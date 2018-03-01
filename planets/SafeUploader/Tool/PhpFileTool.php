<?php


namespace SafeUploader\Tool;


class PhpFileTool
{


    /**
     * @param $thing
     * @param bool $strict , if true (default), will ensure that the
     *                      array does not contain other entries
     *                      than those set by native php.
     * @return bool
     */
    public static function isValidPhpFileStructure($thing, $strict = true)
    {
        if (is_array($thing)) {
            if (true === $strict && count($thing) !== 5) {
                return false;
            }

            if (
                array_key_exists("name", $thing) &&
                array_key_exists("type", $thing) &&
                array_key_exists("tmp_name", $thing) &&
                array_key_exists("error", $thing) &&
                array_key_exists("size", $thing) &&
                is_string($thing['name']) &&
                is_string($thing['type']) &&
                is_string($thing['tmp_name']) &&
                is_int($thing['error']) &&
                is_int($thing['size'])
            ) {
                return true;
            }
        }
        return false;
    }


    public static function getErrorInfo($int)
    {
        $int = (int)$int;
        $name = "";
        $description = "";
        if (0 === $int) {
            $name = "UPLOAD_ERR_OK";
            $description = "Value: 0; There is no error, the file uploaded with success.";
        } elseif (1 === $int) {
            $name = "UPLOAD_ERR_INI_SIZE";
            $description = "Value: 1; The uploaded file exceeds the upload_max_filesize directive in php.ini.";
        } elseif (2 === $int) {
            $name = "UPLOAD_ERR_FORM_SIZE";
            $description = "Value: 2; The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
        } elseif (3 === $int) {
            $name = "UPLOAD_ERR_PARTIAL";
            $description = "Value: 3; The uploaded file was only partially uploaded.";
        } elseif (4 === $int) {
            $name = "UPLOAD_ERR_NO_FILE";
            $description = "Value: 4; No file was uploaded.";
        } elseif (6 === $int) {
            $name = "UPLOAD_ERR_NO_TMP_DIR";
            $description = "Value: 6; Missing a temporary folder. Introduced in PHP 5.0.3.";
        } elseif (7 === $int) {
            $name = "UPLOAD_ERR_CANT_WRITE";
            $description = "Value: 7; Failed to write file to disk. Introduced in PHP 5.1.0.";
        } elseif (8 === $int) {
            $name = "UPLOAD_ERR_EXTENSION";
            $description = "Value: 8; A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help. Introduced in PHP 5.2.0.";
        }


        return [
            'name' => $name,
            'description' => $description,
        ];
    }
}