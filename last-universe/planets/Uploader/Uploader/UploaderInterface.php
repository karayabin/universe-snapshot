<?php

namespace Uploader\Uploader;

/*
 * LingTalfi 2016-01-06
 */
interface UploaderInterface
{


    /**
     * @param $file
     * @return false|array, the array of paths where the given file has been put,
     *                  or false in case of errors.
     */
    public function upload($file);

    /**
     * @return array of error messages
     */
    public function getErrors();
}
