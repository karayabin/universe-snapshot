<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\CommandLineArguments;


/**
 * UnixStyleCommandLineArguments
 * @author Lingtalfi
 * 2015-05-10
 *
 *
 *
 * This implementation is a wrapper for the php getopt function.
 *
 * It natively has support for intuitive quote system, one can escape a quote inside a quoted
 * string with a backslash (but I didn't test any further with quote escaping)
 *
 *
 *
 * There are 2 ways to write an argument:
 *      - one letter arguments (aka short options) are preceded with one dash
 *      - at least two letters arguments (aka long options) are preceded with two dashes
 *
 *
 *
 * Then there are 3 types of arguments,
 *          they all define the relationship between the argument and its value:
 *
 *
 *      - required:
 *              if the argument is used, its value must be specified,
 *              otherwise it's not included as an argument.
 *              The argument value can be written next to
 *              the argument (only for short options = one letter arguments),
 *              or the equal symbol can be used, or a blank will do too.
 *
 *      - optional:
 *              if the argument is used, its value can be specified, but not necessarily.
 *                      Note: Its value will be set to false if the argument is used,
 *                                  and the value is not specified.
 *              The argument value can be written next to
 *              the argument (only for short options = one letter arguments),
 *              or the equal symbol can be used, but a blank will not do.
 *
 *                      Note2:
 *                              we cannot use an empty string with long options (argument
 *                              not recognized),
 *                              it works with short options though.
 *                              Is that a bug?
 *
 *      - standAlone:
 *              if the argument is used, it doesn't need a value.
 *              While obsolete, it doesn't harm to specify a value (it will be ignored).
 *
 *              Note: When set, the standAlone value is set to false
 *
 * 
 * Also, for all types, if the argument is specified multiple times,
 * php will create an array containing the values, as one would expect.
 * 
 *
 *
 *
 */
class UnixStyleCommandLineArguments extends CommandLineArguments
{


    private $argTypes;

    public function __construct()
    {
        parent::__construct();
        $this->argTypes = [];
    }

    public static function create()
    {
        return new static();
    }
    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    public function setRequired($required)
    {
        return $this->prepareArgType($required, 'r');
    }

    public function setOptional($optional)
    {
        return $this->prepareArgType($optional, 'o');
    }

    public function setStandAlone($standAlone)
    {
        return $this->prepareArgType($standAlone, 's');
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function prepareOnce()
    {
        $shortOpts = '';
        $longOpts = [];

        $_optional = [];
        $_standAlone = [];

        foreach ($this->argTypes as $k => $t) {
            $len = strlen($k);
            if ($len > 0) {


                switch ($t) {
                    case 'r':
                        if (1 === $len) {
                            $shortOpts .= $k . ':';
                        }
                        else {
                            $longOpts[] = $k . ':';
                        }
                        break;
                    case 'o':
                        $_optional[] = $k;
                        if (1 === $len) {
                            $shortOpts .= $k . '::';
                        }
                        else {
                            $longOpts[] = $k . '::';
                        }
                        break;
                    case 's':
                        $_standAlone[] = $k;
                        if (1 === $len) {
                            $shortOpts .= $k;
                        }
                        else {
                            $longOpts[] = $k;
                        }
                        break;
                    default:
                        throw new \RuntimeException(sprintf("Unknown argument type: %s", $t));
                        break;
                }
            }
            else {
                throw new \InvalidArgumentException("Argument must at least be one character long");
            }
        }

        $ret = [];
        if (false !== $opts = getopt($shortOpts, $longOpts)) {
            $ret = $opts;
        }
        else {
            throw new \RuntimeException("Invalid getopt arguments passed");
        }
        $this->setArguments($ret);
    }


    private function prepareArgType($input, $type)
    {
        if (!is_array($input)) {
            $input = [$input];
        }
        foreach ($input as $v) {
            $this->argTypes[$v] = $type;
        }
        return $this;
    }

}
