<?php


namespace Ling\UltimateUploadHandler\UploadHandler;

use Ling\UltimateUploadHandler\Exception\ConstraintUltimateUploadHandlerException;
use Ling\UltimateUploadHandler\Exception\UltimateUploadHandlerException;

/**
 * Synopsis of this class is as follow:
 *
 *
 * try
 *      fileItem = $_FILES[files]
 *      checkFile (fileItem)
 *      returnInfo = moveFile (fileItem)
 * relativePath = returnInfo.relativePath
 *      // now do whatever with the relativePath
 * catch e
 *      error = e.getMessage()
 *      // now do whatever with the error
 *
 *
 *
 *
 * MODELS
 * ===========
 *
 * phpFileItem
 * ----------------
 * array:
 *          - name: the name of the file
 *          - type: the mime type of the file
 *          - tmp_name: the temporary location to the file
 *          - error: php error indicator, 0 means no error,
 *                  http://php.net/manual/en/features.file-upload.errors.php
 *          - size: the size in bytes of the file
 *
 *
 */
interface UltimateUploadHandlerInterface
{


    /**
     * Ensure the given php files
     * meet the handler's requirements.
     *
     * For instance, checking that size is ok,
     * mime type ok, etc...
     *
     *
     *
     * @param array $phpFileItem , an phpFileItem model
     * @throws ConstraintUltimateUploadHandlerException
     * @return void
     */
    public function checkFile(array $phpFileItem);


    /**
     *
     * Move the file to the location defined by the handler.
     *
     *
     * @param array $phpFileItem , an phpFileItem model
     * @throws UltimateUploadHandlerException
     * @return array, returnInfo, an array containing some data
     * defined by the handler.
     * Usually, it will contain the following properties:
     *
     * - relativePath, path to the newly uploaded item
     * - fileName, name of the file
     *
     *
     *
     * Note about security:
     * --------
     * if you upload your file in a web accessible directory, then malicious users
     * will be able to execute the file right away.
     * If putting files in a web non accessible directory is an option for you, then
     * I would recommend to put all your files there.
     *
     *
     *
     *
     */
    public function moveFile(array $phpFileItem);
}