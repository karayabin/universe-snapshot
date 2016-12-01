<?php


namespace QuickForm\Tool;

use QuickForm\Exception\QuickFormException;

class PhpFileExploder
{


    /**
     * When you post a form with an input type=file,
     * depending on whether or not there is the bracket at the end of the html name,
     * you have a different format.
     *
     *
     * Let's call phpItem a classic php file array containing the following:
     * - name: the  name
     * - type: the type
     * - tmp_name: the location to the path where the file is
     * - error: an error code, 0 meaning no error
     * - size: the size of the uploaded file
     *
     *
     * From my tests,
     * if your html name is "file",
     * then you will have:
     *
     *      $_FILES[file] = phpItem
     *
     * However, if your html name is "file[]", and you upload two files (for instance, but same principle for any number of files),
     * then you will have the following:
     *
     *      $_FILES[file] = [
     *          name => [
     *              0: name for file 1,
     *              1: name for file 2
     *          ],
     *          type => [
     *              0: type for file 1,
     *              1: type for file 2
     *          ],
     *          ...
     *      ]
     *
     * The class below contains a single method which basically return always the same format which is the following:
     *
     *      $_FILES[file] = [
     *          phpItem,
     *          ?phpItem2,
     *          ...
     *      ]
     *
     *
     *
     * The phpFiles parameter for this method is $_FILES[file] (not the whole $_FILES).
     *
     */
    public static function explode(array $phpFiles, $stopIfFileIsNotUploadedViaHttp = true)
    {
        $allFiles = [];
        if (is_string($phpFiles["name"])) {
            $allFiles[] = $phpFiles;
            if (true === $stopIfFileIsNotUploadedViaHttp && false === is_uploaded_file($phpFiles['tmp_name'])) {
                self::notUploaded($phpFiles);
            }
        } elseif (is_array($phpFiles['name'])) {
            $n = count($phpFiles['name']);
            for ($i = 0; $i < $n; $i++) {

                $phpItem = [
                    "name" => $phpFiles['name'][$i],
                    "type" => $phpFiles['type'][$i],
                    "tmp_name" => $phpFiles['tmp_name'][$i],
                    "error" => $phpFiles['error'][$i],
                    "size" => $phpFiles['size'][$i],
                ];

                if (true === $stopIfFileIsNotUploadedViaHttp && false === is_uploaded_file($phpItem['tmp_name'])) {
                    self::notUploaded($phpItem);
                }

                $allFiles[] = $phpItem;
            }
        }
        return $allFiles;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private static function notUploaded(array $phpItem)
    {
        throw new QuickFormException("File not uploaded via http: " . $phpItem['name'] . " (" . $phpItem['tmp_name'] . ")");
    }
}