<?php


namespace CliTools\Input;


use CliTools\Exception\InvalidContextException;

/**
 * The CommandLineInput class is an implementation of the command line as described by @page(the command line page).
 *
 *
 * It specifies how parameters, options and flags should be written.
 *
 *
 *
 * The command line structure
 * ---------------------
 *
 * The command line is composed of white-space separated components:
 *
 *
 * - **option**: an option contains an equal symbol (=). The key is the part on the left of the equal symbol, and the value is the part on the right.
 * - **parameter**: a parameter doesn't contain an equal symbol (=). A parameter doesn't start with a dash.
 * - **flag**: a parameter doesn't contain an equal symbol (=). A parameter starts with a dash.
 *
 *
 * Notes:
 * - An option can start with one (or more) dash.
 * - The value of a a flag always resolves to a boolean: true if set, or false if not set.
 * - Dashes at the beginning of an option or a flag are not part of the option name or flag name.
 * - Regular quoting (with single or double quotes) can be used to protect the option's values if necessary.
 * - The equal symbol (=) is reserved for separating an option key from its value, and therefore cannot be part of a parameter name, an option name, and/or a flag name.
 *
 *
 *
 * ### Example:
 *
 * In the following command line:
 *
 * - php -f myprogram.php -- makecoffee -v --sugars=2 viennois --no-cream -qp -say_word="ok good"
 *
 *
 * we have:
 *
 * - php -f myprogram.php --: this is not part of the command line and irrelevant to our discussion.
 * - **makecoffee**: the first **parameter**
 * - **-v**: the **flag** v.
 * - **--sugars=2**: the **option** sugars with the value 2.
 * - **viennois**: the second **parameter**.
 * - **--no-cream**: the **flag** no-cream (value of true).
 * - **-qp**: the **flag** qp (value of true).
 * - **-say_word=ok**: **option** say_word with a value of "ok good".
 *
 *
 *
 *
 * How to use?
 * -------------
 *
 * The command line is meant to be used in a terminal environment (i.e. not a web server environment).
 *
 *
 *
 * /path/to/my_app/tmp/myprogram.php
 * ```php
 *
 *
 * #!/usr/bin/env php
 * <?php
 *
 *
 * use CliTools\Input\CommandLineInput;
 *
 * require_once __DIR__ . "/../universe/bigbang.php"; // activate universe
 *
 *
 *
 * // Program was called like this:
 * //  php -f myprogram.php -- makecoffee -v --sugars=2 viennois --no-cream -qp -say_word="ok good"
 *
 *
 * $line = new CommandLineInput();
 *
 * a($line->getParameter(1)); // string(10) "makecoffee"
 * a($line->getParameter(2)); // string(8) "viennois"
 * a($line->getParameter(3)); // NULL
 * a($line->getParameter(3, "default value")); // string(13) "default value"
 *
 * a($line->getOption("sugars")); // string(1) "2"
 * a($line->getOption("say_word")); // string(7) "ok good"
 * a($line->getOption("not_an_option")); // NULL
 * a($line->getOption("not_an_option", 678)); // int(678)
 *
 *
 * a($line->hasFlag("v")); // bool(true)
 * a($line->hasFlag("-v")); // bool(false)
 * a($line->hasFlag("no-cream")); // bool(true)
 * a($line->hasFlag("q")); // bool(false)
 * a($line->hasFlag("p")); // bool(false)
 * a($line->hasFlag("qp")); // bool(true)
 * a($line->hasFlag("z")); // bool(false)
 *
 *
 * ```
 *
 *
 *
 *
 */
class CommandLineInput extends AbstractInput
{

    /**
     * Builds the class instance.
     *
     * @param array|null $argv
     * @throws InvalidContextException
     */
    public function __construct(array $argv = null)
    {

        parent::__construct();

        if (null === $argv) {
            if (array_key_exists('argv', $_SERVER)) {
                $argv = $_SERVER['argv'];
            } else {
                throw new InvalidContextException("Invalid context: you must execute this program from a terminal (argv not found in \$_SERVER).");
            }
        }

        $this->prepare($argv);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Parses the command line and stores the flags, options and parameters to be accessed via the getter methods.
     *
     * @param array $argv
     * The argv argument provided with the $_SERVER super array (or manually generated).
     * The very first entry of this array must be the program name.
     *
     *
     */
    private function prepare(array $argv)
    {
        // drop program name
        array_shift($argv);

        $paramIndex = 1;
        foreach ($argv as $v) {


            $p = explode('=', $v, 2);
            if (2 === count($p)) {
                //--------------------------------------------
                // OPTION
                //--------------------------------------------
                $optionName = ltrim($p[0], '-');
                $optionValue = $p[1];
                $this->options[$optionName] = $optionValue;

            } else {

                if ('-' === substr($v, 0, 1)) {
                    //--------------------------------------------
                    // FLAG
                    //--------------------------------------------
                    $flagName = ltrim($v, '-');
                    $this->flags[$flagName] = true;

                } else {
                    //--------------------------------------------
                    // PARAMETER
                    //--------------------------------------------
                    $this->parameters[$paramIndex++] = $v;
                }
            }
        }
    }
}