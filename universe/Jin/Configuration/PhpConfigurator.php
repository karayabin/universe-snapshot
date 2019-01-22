<?php


namespace Jin\Configuration;


/**
 * @info The PhpConfigurator class configures the php ini directives before the application instance starts.
 */
class PhpConfigurator
{


    private static $errorText2Code = [
        "E_ERROR" => 1,
        "E_WARNING" => 2,
        "E_PARSE" => 4,
        "E_NOTICE" => 8,
        "E_CORE_ERROR" => 16,
        "E_CORE_WARNING" => 32,
        "E_COMPILE_ERROR" => 64,
        "E_COMPILE_WARNING" => 128,
        "E_USER_ERROR" => 256,
        "E_USER_WARNING" => 512,
        "E_USER_NOTICE" => 1024,
        "E_STRICT" => 2048,
        "E_RECOVERABLE_ERROR" => 4096,
        "E_DEPRECATED" => 8192,
        "E_USER_DEPRECATED" => 16384,
        "E_ALL" => 32767,
    ];


    /**
     * @info Configures the php ini directives, according to the config/variables/php.yml file.
     *
     * @param $appDir
     * @param ConfigurationFileParser $confParser
     * @return true|array, true is returned if no error has occurred.
     * Otherwise, an array of error messages is returned. Note: those errors are intended for the main logger when the
     * application initializes (see Jin\Application\Application->init method for more details).
     *
     * @see \Jin\Application\Application::init
     */
    public static function configure($appDir, ConfigurationFileParser $confParser)
    {
        $errors = [];
        $file = $appDir . "/config/php.yml";
        $conf = $confParser->parseFile($file, false);
        foreach ($conf as $k => $v) {
            if ('error_reporting' === $k) {

                /**
                 * The user can specify the error_reporting directive using either:
                 * - number
                 * - php constants
                 *
                 * If she uses number, we don't do anything.
                 * If she uses constants, we need to convert this into a number.
                 * If we use constant, there are three main flavors:
                 *
                 * - either use only one constant. Ex: E_ALL
                 * - either use subtraction mode. Ex: E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED
                 * - either use addition mode. Ex: E_ERROR | E_WARNING | E_PARSE
                 *
                 */
                if (preg_match('!E_!', $v)) {
                    $number = null;
                    $operation = null;
                    $words = preg_split('!\s+!', $v);
                    foreach ($words as $word) {
                        if ('&' === $word) {
                            $operation = "-";
                        } elseif ('|' === $word) {
                            $operation = "+";
                        } else {
                            if (0 === strpos($word, '~')) {
                                $word = substr($word, 1);
                            }

                            if (array_key_exists($word, self::$errorText2Code)) {
                                $n = self::$errorText2Code[$word];
                                if (null === $number) {
                                    $number = $n;
                                } else {
                                    if (null === $operation) {
                                        $errors[] = "(Jin\Configuration\PhpConfigurator::configure): an operation must be intertwined between two constants. The constant $word is not preceded by an operator. (skipping)";
                                    } else {
                                        if ('-' === $operation) {
                                            $number -= $n;
                                            $operation = null;
                                        } elseif ('+' === $operation) {
                                            $number += $n;
                                            $operation = null;
                                        } else {
                                            $errors[] = "(Jin\Configuration\PhpConfigurator::configure): don't know how to process this word: $word. (skipping)";
                                        }
                                    }
                                }
                            } else {
                                $errors[] = "(Jin\Configuration\PhpConfigurator::configure): don't know how to process this word: $word. (skipping)";
                            }
                        }
                    }
                    $v = $number;
                }
            }
            ini_set($k, $v);
        }
        if ($errors) {
            return $errors;
        }
        return true;
    }
}