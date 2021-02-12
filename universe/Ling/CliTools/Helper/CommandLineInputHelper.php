<?php


namespace Ling\CliTools\Helper;

use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Input\WritableCommandLineInput;

/**
 * The CommandLineInputHelper class.
 */
class CommandLineInputHelper
{


    /**
     * Returns a WritableCommandLineInput instance, copy of the given input.
     *
     * Available options are:
     * - parameters: array of new parameters to use instead of the one from the given input
     *
     *
     *
     * @param InputInterface $input
     * @param array $options
     * @return WritableCommandLineInput
     */
    public static function getInputWritableCopy(InputInterface $input, array $options = [])
    {

        $parameters = $options['parameters'];

        /**
         * re-forging the input so that the executing app doesn't see the difference.
         */
        $proxyInput = new WritableCommandLineInput();
        $proxyInput->setParameters($parameters);
        $flags2 = [];
        $flags = $input->getFlags();
        foreach ($flags as $flag) {
            $flags2[$flag] = true;
        }
        $proxyInput->setFlags($flags2);
        $proxyInput->setOptions($input->getOptions());
        return $proxyInput;
    }


    /**
     * Returns the argv array version of the given param string.
     * This method assumes that the php cli is available as "php" on your system.
     *
     * https://stackoverflow.com/questions/34868421/get-argv-from-a-string-with-php
     *
     * @param string $str
     * @return array
     */
    public static function paramStringToArgv(string $str): array
    {
        // the array shift removes the dash I had as first element of the argv, your mileage may vary
        $serializedArguments = shell_exec(
            sprintf('php -r "array_shift(\\$argv); echo serialize(\\$argv);" -- %s', $str)
        );
        return unserialize($serializedArguments);
    }


    /**
     * Returns the [command line input](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md) version of the [command line](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md) from the given input.
     * Note that the functionality of the returned command line will be the same, but the order of arguments and notation might change, in particular:
     *
     * - combined flags will be expanded as individuals
     * - all options will be protected by double quotes
     * - we always return arguments in this order:
     *      - parameters
     *      - options
     *      - flags
     *
     *
     *
     * @param InputInterface $input
     * @return string
     */
    public static function getCommandLineByInput(InputInterface $input): string
    {
        $s = '';
        $options = $input->getOptions();
        $flags = array_filter($input->getFlags());
        $parameters = $input->getParameters();
        $c = 0;
        foreach ($parameters as $parameter) {
            if (0 !== $c) {
                $s .= ' ';
            }
            $s .= self::escape($parameter);
            $c++;
        }

        if ($options) {
            if ('' !== $s) {
                $s .= ' ';
            }
            $c = 0;
            foreach ($options as $k => $v) {
                if (0 !== $c) {
                    $s .= " ";
                }
                $s .= self::escape($k) . '="' . self::escapeDoubleQuotes($v) . '"';
                $c++;
            }
        }

        if ($flags) {
            if ('' !== $s) {
                $s .= ' ';
            }
            $c = 0;
            foreach ($flags as $name) {
                if (0 !== $c) {
                    $s .= " ";
                }
                $s .= '-';
                if (strlen($name) > 1) {
                    $s .= '-';
                }
                $s .= self::escape($name);
                $c++;
            }
        }
        return $s;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the quote escaped version of the given string.
     * @param string $str
     * @return string
     */
    private static function escape(string $str): string
    {
        return str_replace([
            '"',
            "'",
        ], [
            '\"',
            "\'",
        ], $str);
    }


    /**
     * Returns the double quote escaped version of the given string.
     * @param string $str
     * @return string
     */
    private static function escapeDoubleQuotes(string $str): string
    {
        return str_replace('"', '\"', $str);
    }

}









































