<?php


namespace Ling\UltimateUploadHandler\Constraint;


use Ling\UltimateUploadHandler\Exception\ConstraintUltimateUploadHandlerException;

interface ConstraintInterface
{

    /**
     * Check that the given phpFile meets the constraint criterion.
     *
     *
     * @param array $phpFile
     *          - name: the name of the file
     *          - type: the mime type of the file
     *          - tmp_name: the temporary location to the file
     *          - error: php error indicator, 0 means no error,
     *                  http://php.net/manual/en/features.file-upload.errors.php
     *          - size: the size in bytes of the file
     *
     *
     * @param string|null $errorMessage
     *
     * @return bool, whether the constraint passed or failed.
     *              If false is returned, then the errorMessage is set too.
     *              Note: it's a formatted/translated errorMessage.
     *
     *
     * A word about translation: to translate messages, it's recommended (design wise) that you use the setMessages
     * method that the concrete class might provide.
     *
     *
     *
     */
    public function check(array $phpFile, string &$errorMessage = null);
}