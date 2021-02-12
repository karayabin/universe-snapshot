<?php


namespace Ling\CliTools\Input;


use Ling\CliTools\Exception\InvalidContextException;

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
 * The command line is composed of white-space separated components (aka arguments):
 *
 *
 * - **option**: an option contains an equal symbol (=). The key is the part on the left of the equal symbol, and the value is the part on the right.
 *      The option key can be prefixed with one or more dashes for readability, but they are not part of the option's key.
 *      So for instance the option my-option=ABCD can also be written -my-option=ABCD or --my-option=ABCD. Those are all the same
 *
 * - **parameter**: a parameter doesn't contain an equal symbol (=). A parameter doesn't start with a dash.
 *
 * - **flag**: a parameter doesn't contain an equal symbol (=). A parameter starts with a dash.
 *              If the flag starts with only one dash, then what follows is a one letter dash, or a combination of multiple one letter flags.
 *              If the flag starts with two (or more) dashes, then what follows is the name of the flag.
 *              In other words: -a is flag a, -abc is the combination of three flags a, b and c, and --abc is the flag named abc.
 *
 *
 * Notes:
 * - The value of a a flag always resolves to a boolean: true if set, or false if not set.
 * - Dashes at the beginning of an option or a flag are not part of the option name or flag name.
 * - Regular quoting (with single or double quotes) can be used to protect the option's values if necessary.
 * - Inside double quotes, double quotes are allowed only if they are escaped with a backslash.
 * - Inside single quotes, single quotes are not allowed, as I encountered some weird behaviour with my bash/terminal:
 *      testing this string in my console:
 *          - light import Ling.Chronos efg="some th\"ings" --sugar=no -d elf='no t"han\'ks'
 *      it doesn't reach the php cli, because of the \' before the k.
 *      Instead, it opens the terminal multiline mode.
 *
 * - The equal symbol (=) is reserved for separating an option key from its value, and therefore cannot be part of a parameter name, an option name, and/or a flag name.
 * - An element starting only with one dash is a one-letter flag, or a combination of multiple one-letter flags.
 *
 *
 *
 * ### Example:
 *
 * In the following command line:
 *
 * - php -f myprogram.php -- makecoffee -v --sugars=2 viennois --no-cream -pq --rs say_word="ok good"
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
 * - **-pq**: the combination of **flag** p and **flag** q (both having a value of true).
 * - **--rs**: the **flag** rs (value of true).
 * - **say_word=ok**: **option** say_word with a value of "ok good".
 *
 *
 *
 *
 * How to use?
 * -------------
 *
 * The command line is meant to be used in a terminal environment (i.e. not a web server environment).
 * See the "examples" section for more details.
 *
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
                    if (0 !== strpos($v, '--')) {
                        //--------------------------------------------
                        // ONE LETTER FLAG(S)
                        //--------------------------------------------
                        $letters = str_split(ltrim($v, '-'));
                        foreach ($letters as $letter) {
                            $this->flags[$letter] = true;
                        }
                    } else {
                        //--------------------------------------------
                        // NOT SPECIAL FLAGS
                        //--------------------------------------------
                        $flagName = ltrim($v, '-');
                        $this->flags[$flagName] = true;
                    }

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