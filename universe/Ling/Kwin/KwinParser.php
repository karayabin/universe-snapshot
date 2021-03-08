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
     *
     * Returns a [kwin array](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md#kwin-array) corresponding to the first command found in the given string.
     *
     * Throws an exception if the syntax is not correct.
     *
     *
     * @param string $str
     * @return array
     * @throws \Exception
     */
    public function parseString(string $str): array
    {


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


        foreach ($lines as $line) {


            if (null === $commandName) {
                if (preg_match('!^- \*\*([a-zA-Z0-9_-]+)\*\*:?(.*)!', $line, $match)) {
                    $commandName = $match[1];
                    $commandDescription .= $match[2];
                }
            } else {
                if (false === $argumentsFound) {
                    if (preg_match("!^ {4}- Arguments:\s*$!", $line, $match)) {
                        $argumentsFound = true;
                    } else {
                        $commandDescription .= PHP_EOL . $line;
                    }
                } else {


                    if (preg_match("!^ {8}- parameters:\s*$!", $line, $match)) {
                        $argumentsType = "parameter";
                        $pmtName = null;
                    } elseif (preg_match("!^ {8}- options:\s*$!", $line, $match)) {
                        $argumentsType = "option";
                        $optName = null;
                        $optItemName = null;
                    } elseif (preg_match("!^ {8}- flags:\s*$!", $line, $match)) {
                        $argumentsType = "flag";
                        $flagName = null;
                    } elseif (preg_match("!^ {8}- aliases:\s*$!", $line, $match)) {
                        $argumentsType = "alias";
                        $flagName = null;
                    } else {
                        if (null !== $argumentsType) {

                            switch ($argumentsType) {
                                case "parameter":
                                    if (preg_match("!^ {12}- ([^:]+):(.*)$!", $line, $match)) {
                                        $pmtName = $match[1];
                                        $pmtDescription = $match[2];
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
                                                $options[$optName]["values"][$optItemName] = $optItemDescription;
                                            } else {
                                                if (null !== $optItemName) {
                                                    $options[$optName]["values"][$optItemName] .= PHP_EOL . $line;
                                                } else {
                                                    $options[$optName] .= PHP_EOL . $line;
                                                }
                                            }
                                        }
                                    }
                                    break;
                                case "flag":
                                    if (preg_match("!^ {12}- ([^:]+):(.*)$!", $line, $match)) {
                                        $flagName = $match[1];
                                        $flagDescription = $match[2];
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