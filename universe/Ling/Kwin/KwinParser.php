<?php


namespace Ling\Kwin;

use Ling\Kwin\Exception\KwinException;

/**
 * The KwinParser class.
 *
 *
 *
 *
 *
 */
class KwinParser
{

    /**
     * This property holds the verbose for this instance.
     * @var bool
     */
    private bool $verbose;

    /**
     * This property holds the sBegin for this instance.
     * @var string
     */
    private string $sBegin;


    /**
     * Builds the KwinParser instance.
     */
    public function __construct()
    {
        $this->verbose = false;
        $this->sBegin = "";
    }


    /**
     *
     * Returns a [kwin array](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md#kwin-array) corresponding to the first command found in the given string.
     *
     * Throws an exception if the syntax is not correct.
     *
     * Available options are:
     *
     * - verbose: bool=false, whether to display debug messages.
     *
     *
     * @param string $str
     * @param array $options
     * @return array
     * @throws \Exception
     */
    public function parseString(string $str, array $options = []): array
    {


        $verbose = $options['verbose'] ?? false;
        $this->verbose = $verbose;

        $commandName = null;
        $commandDescription = "";
        $lines = explode(PHP_EOL, $str);

        $argumentsFound = false;
        $argumentsType = null;
        $parameters = [];
        $options = [];
        $flags = [];
        $aliases = [];
        $pmtName = null;
        $optName = null;
        $optItemName = null;
        $flagName = null;
        $aliasName = null;


        $nbLines = count($lines);
        $x = 0;


        foreach ($lines as $line) {
            $x++;
            $this->sBegin = "$x/$nbLines";


            $this->debug("$line" . PHP_EOL);


            /**
             * prevent parsing a second command
             */
            if (preg_match('!^- \*\*([a-zA-Z0-9_-]+)\*\*:?(.*)!', $line, $match)) {
                if (null !== $commandName) {
                    goto end;
                }
            }

            if (null === $commandName) {
                if (preg_match('!^- \*\*([a-zA-Z0-9_-]+)\*\*:?(.*)!', $line, $match)) {
                    $commandName = $match[1];
                    $commandDescription .= $match[2];

                    $this->debug("command name found: $commandName." . PHP_EOL);

                }
            } else {
                if (false === $argumentsFound) {
                    if (preg_match("!^ {4}- Arguments:\s*$!", $line, $match)) {
                        $argumentsFound = true;
                        $this->debug("arguments found." . PHP_EOL);
                    } else {
                        $commandDescription .= PHP_EOL . $line;
                    }
                } else {


                    if (preg_match("!^ {8}- parameters:\s*$!", $line, $match)) {
                        $argumentsType = "parameter";
                        $pmtName = null;
                        $this->debug("parameters found." . PHP_EOL);
                    } elseif (preg_match("!^ {8}- options:\s*$!", $line, $match)) {
                        $argumentsType = "option";
                        $this->debug("options found." . PHP_EOL);
                        $optName = null;
                        $optItemName = null;
                    } elseif (preg_match("!^ {8}- flags:\s*$!", $line, $match)) {
                        $this->debug("flags found." . PHP_EOL);
                        $argumentsType = "flag";
                        $flagName = null;
                    } elseif (preg_match("!^ {8}- aliases:\s*$!", $line, $match)) {
                        $this->debug("aliases found." . PHP_EOL);
                        $argumentsType = "alias";
                        $flagName = null;
                    } else {
                        if (null !== $argumentsType) {

                            switch ($argumentsType) {
                                case "parameter":
                                    if (preg_match("!^ {12}- ([^:]+):(.*)$!", $line, $match)) {
                                        $pmtName = $match[1];
                                        $pmtDescription = $match[2];
                                        $this->debug("parameter name found: $pmtName." . PHP_EOL);
                                        if (true === str_starts_with($pmtName, '?')) {
                                            $pmtName = substr($pmtName, 1);
                                            $pmtIsMandatory = false;
                                        } else {
                                            $pmtIsMandatory = true;
                                        }
                                        $parameters[$pmtName] = [$pmtDescription, $pmtIsMandatory];
                                    } else {
                                        if (null === $pmtName) {
                                            $this->error("kwin syntax error: you must define a parameter after you declare the \"- parameters:\" line.");
                                        } else {
                                            $parameters[$pmtName][0] .= PHP_EOL . $line;
                                        }
                                    }
                                    break;
                                case "option":
                                    if (preg_match("!^ {12}- ([^:]+):(.*)$!", $line, $match)) {

                                        $optName = $match[1];
                                        $optDescription = $match[2];
                                        $this->debug("option name found: $optName." . PHP_EOL);
                                        $options[$optName] = [
                                            "desc" => $optDescription,
                                            "values" => [],
                                        ];
                                    } else {
                                        if (null === $optName) {
                                            $this->error("kwin syntax error: you must define an option after you declare the \"- options:\" line.");
                                        } else {


                                            if (preg_match("!^ {16}- ([^:]+):(.*)$!", $line, $match)) {
                                                $optItemName = $match[1];
                                                $optItemDescription = $match[2];
                                                $this->debug("option item name found: $optItemName." . PHP_EOL);
                                                $options[$optName]["values"][$optItemName] = $optItemDescription;
                                            } else {

                                                $options[$optName]["desc"] .= PHP_EOL . $line;
//                                                if (null !== $optItemName) {
//                                                    $options[$optName]["values"][$optItemName] .= PHP_EOL . $line;
//                                                } else {
//                                                    $options[$optName] .= PHP_EOL . $line;
//                                                }
                                            }
                                        }
                                    }
                                    break;
                                case "flag":
                                    if (preg_match("!^ {12}- ([^:]+):(.*)$!", $line, $match)) {
                                        $flagName = $match[1];
                                        $flagDescription = $match[2];
                                        $this->debug("flag name found: $flagName." . PHP_EOL);
                                        $flags[$flagName] = $flagDescription;
                                    } else {
                                        if (null === $flagName) {
                                            $this->error("kwin syntax error: you must define a flag after you declare the \"- flags:\" line.");
                                        } else {
                                            $flags[$flagName] .= PHP_EOL . $line;
                                        }
                                    }
                                    break;
                                case "alias":
                                    if (preg_match("!^ {12}- (.*)$!", $line, $match)) {
                                        $aliasName = $match[1];
                                        $this->debug("alias name found: $aliasName." . PHP_EOL);
                                        $aliases[] = $aliasName;
                                    } else {
                                        if ('' === trim($line)) {
                                            continue 2;
                                        }
                                        $this->error("kwin syntax error: you must define an alias after you declare the \"- aliases:\" line.");
                                    }
                                    break;
                                default:
                                    $this->error("Unknown argument type: $argumentsType.");
                                    break;
                            }

                        } else {
                            $this->error("Don't know this case with line: $line.");
                        }
                    }

                }
            }
        }


        end:

        return [
            "name" => $commandName,
            "description" => $commandDescription,
            "parameters" => $parameters,
            "options" => $options,
            "flags" => $flags,
            "aliases" => $aliases,
        ];
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Prints a debug message if the verbose flag is set.
     * @param string $msg
     */
    private function debug(string $msg)
    {
        if (true === $this->verbose) {
            echo $this->sBegin . ": " . $msg;
        }
    }

    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new KwinException(static::class . ": " . $msg, $code);
    }
}