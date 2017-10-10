<?php


namespace CommandLineInput;

/**
 * This concrete class implements the standard notation described in the implemented interface.
 *
 */
class CommandLineInput implements CommandLineInputInterface
{

    /**
     * array of key => boolean
     * flags are one letter short options that don't accept values
     */
    private $flags;

    /**
     * array of key => value (=false by default)
     */
    private $options;

    /**
     * index starts at 1, parameters are registered in order from left to right
     * array of index => value
     * Parameters are defined while parsing the command line.
     */
    private $parameters;

    private $argv;
    private $isPrepared;


    private $registeredFlags;
    private $registeredOptions;


    public function __construct(array $argv)
    {
        $this->flags = [];
        $this->options = [];
        $this->parameters = [];
        $this->registeredFlags = [];
        $this->registeredOptions = [];

        //
        $this->argv = $argv;
        $this->isPrepared = false;
    }


    public static function create(array $argv)
    {
        return new static($argv);
    }


    /**
     * @return CommandLineInput
     */
    public function addFlag($name)
    {
        $this->registeredFlags[] = $name;
        return $this;
    }

    /**
     * @return CommandLineInput
     */
    public function addOption($name)
    {
        $this->registeredOptions[] = $name;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function getFlagValue($flagName, $default = false)
    {
        $this->prepare();
        if (array_key_exists($flagName, $this->flags)) {
            return $this->flags[$flagName];
        }
        return $default;
    }

    public function getOptionValue($optionName, $default = null)
    {
        $this->prepare();
        if (array_key_exists($optionName, $this->options)) {
            return $this->options[$optionName];
        }
        return $default;
    }

    public function getParameter($index, $default = null)
    {
        $this->prepare();
        if (array_key_exists($index, $this->parameters)) {
            return $this->parameters[$index];
        }
        return $default;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Type can be one of:
     * - shortFlag
     * - shortOption
     * - shortFlagCombined
     * - longFlag
     * - longOption
     *
     *
     *
     */
    protected function notRegistered($type, $param = null, $param2 = null)
    {
        // when an option/flag is not registered, by default we ignore it
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private function prepare()
    {
        if (false === $this->isPrepared) {
            $this->isPrepared = true;
            $this->prepareOptions($this->argv);
        }
    }


    private function prepareOptions(array $argv)
    {
        // drop program name
        array_shift($argv);
        $paramIndex = 1;
        foreach ($argv as $v) {
            if (0 === strpos($v, '-')) {
                if (0 === strpos($v, '--')) {
                    // long option or long flag
                    $option = ltrim($v, '-');

                    $p = explode('=', $option, 2);
                    if (2 === count($p)) {
                        // long option
                        $optionName = $p[0];
                        $optionValue = $p[1];
                        if (in_array($optionName, $this->registeredOptions, true)) {
                            $this->options[$optionName] = $optionValue;
                        } else {
                            $this->notRegistered("longOption", $optionName);
                        }
                    } else {
                        // long flag
                        if (in_array($option, $this->registeredFlags, true)) {
                            $this->flags[$option] = true;
                        } else {
                            $this->notRegistered("longFlag", $option);
                        }
                    }
                } else {

                    // short option or short flag or combined short flags
                    $option = ltrim($v, '-');

                    $p = explode('=', $option, 2);
                    if (2 === count($p)) {
                        // short option
                        $optionName = $p[0];
                        $optionValue = $p[1];
                        if (true === in_array($optionName, $this->registeredOptions, true)) {
                            $this->options[$optionName] = $optionValue;
                        } else {
                            $this->notRegistered("shortOption", $optionName);
                        }
                    } else {
                        // short flag or combined one letter flags
                        $len = strlen($option);
                        if (1 === $len) {
                            // short flag
                            if (true === in_array($option, $this->registeredFlags, true)) {
                                $this->flags[$option] = true;
                            } else {
                                $this->notRegistered("shortFlag", $option);
                            }
                        } elseif ($len > 1) {
                            // assuming combined flags
                            $chars = str_split($option);
                            foreach ($chars as $char) {
                                if (true === in_array($char, $this->registeredFlags, true)) {
                                    $this->flags[$char] = true;
                                } else {
                                    $this->notRegistered("shortFlagCombined", $option);
                                }
                            }
                        }
                    }
                }
            } else {
                $this->parameters[$paramIndex++] = $v;
            }
        }
    }

}