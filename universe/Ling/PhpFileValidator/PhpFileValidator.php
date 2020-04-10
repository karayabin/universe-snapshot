<?php


namespace Ling\PhpFileValidator;

use Ling\PhpFileValidator\Exception\PhpFileValidatorException;

/**
 * The PhpFileValidator class.
 */
class PhpFileValidator
{

    /**
     * Checks whether the given php file (usually from $_FILES) is erroneous, and throws an exception if it's the case.
     * Returns true if everything is ok.
     *
     * @param array $phpFile
     * @return true
     * @throws \Exception
     */
    public static function checkPhpFile(array $phpFile)
    {
        // ensuring that we work with a valid php file item
        $props = [
            "name" => null,
            "type" => null,
            "tmp_name" => null,
            "error" => null,
            "size" => null,
        ];

        $phpFile = array_intersect_key($phpFile, $props);
        if (5 === count($phpFile)) {

            if (true === is_uploaded_file($phpFile['tmp_name'])) {

                if (0 === (int)$phpFile['error']) {
                    if (0 !== (int)$phpFile['size']) {
                        return true;

                    } else {
                        throw new PhpFileValidatorException("Upload error: the file " . $phpFile['name'] . " returned a size of 0, which is not allowed by this service.");
                    }
                } else {
                    throw new PhpFileValidatorException("Upload error: the file " . $phpFile['name'] . " returned the php error: " . $phpFile['error']);
                }

            } else {
                throw new PhpFileValidatorException("Security violation error: this file was not uploaded via HTTP POST.");
            }

        } else {
            $c = count($phpFile);
            throw new PhpFileValidatorException("Invalid php file item passed with $c elements (5 were expected).");
        }
    }
}