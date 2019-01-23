<?php


namespace PhpErrorName;


class PhpErrorName
{

    /**
     * Returns the name of the given error code.
     *
     * src: http://php.net/manual/en/errorfunc.constants.php (2019-01-23)
     *
     * @param $errorCode
     * @return string.
     *          Note: the non-existing E_UNKNOWN string is returned if this function cannot
     *          resolve the error name.
     */
    public static function getErrorName($errorCode)
    {
        switch ($errorCode) {
            case \E_ERROR:
                return "E_ERROR";
            case \E_WARNING:
                return "E_WARNING";
            case \E_PARSE:
                return "E_PARSE";
            case \E_NOTICE:
                return "E_NOTICE";
            case \E_CORE_ERROR:
                return "E_CORE_ERROR";
            case \E_CORE_WARNING:
                return "E_CORE_WARNING";
            case \E_COMPILE_ERROR:
                return "E_COMPILE_ERROR";
            case \E_COMPILE_WARNING:
                return "E_COMPILE_WARNING";
            case \E_USER_ERROR:
                return "E_USER_ERROR";
            case \E_USER_WARNING:
                return "E_USER_WARNING";
            case \E_USER_NOTICE:
                return "E_USER_NOTICE";
            case \E_STRICT:
                return "E_STRICT";
            case \E_RECOVERABLE_ERROR:
                return "E_RECOVERABLE_ERROR";
            case \E_DEPRECATED:
                return "E_DEPRECATED";
            case \E_USER_DEPRECATED:
                return "E_USER_DEPRECATED";
            case \E_ALL:
                return "E_ALL";
            default:
                return "E_UNKNOWN";
        }
    }
}