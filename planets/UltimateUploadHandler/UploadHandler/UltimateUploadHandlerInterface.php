<?php


namespace UltimateUploadHandler\UploadHandler;

use UltimateUploadHandler\Exception\ConstraintUltimateUploadHandlerException;
use UltimateUploadHandler\Exception\UltimateUploadHandlerException;

/**
 * Synopsis of this class is as follow:
 *
 *
 * try
 *      fileItem = $_FILES[files]
 *      checkFile (fileItem)
 *      returnInfo = moveFile (fileItem)
 * uri = returnInfo.uri
 *      // now do whatever with the uri
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
     * - uri, path to the newly uploaded item
     *
     *
     */
    public function moveFile(array $phpFileItem);
}