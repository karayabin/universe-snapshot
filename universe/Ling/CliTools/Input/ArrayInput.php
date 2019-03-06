<?php


namespace Ling\CliTools\Input;


/**
 * The ArrayInput class is an implementation of the command line as described by @page(the command line page).
 * It's fed by the developer manually, and is therefore used to invoke programs manually from the code.
 *
 *
 *
 * How to use?
 * ---------------
 *
 * You basically set all your parameters, options and flags using the setItems method, like in the following example.
 *
 *
 *
 * ```php
 * #!/usr/bin/env php
 * <?php
 *
 *
 * use Ling\CliTools\Input\ArrayInput;
 *
 * require_once __DIR__ . "/../universe/bigbang.php"; // activate universe
 *
 *
 * $line = new ArrayInput();
 * $line->setItems([
 *      ":parameter" => true,
 *      "optionName" => 667,
 *      "optionName2" => "a value",
 *      "-flag1" => true,
 *      "-flag2" => true,
 *      ":the_parameter2" => true,
 * ]);
 *
 *
 * $line->getParameter(1); // parameter
 * $line->getParameter(2); // the_parameter2
 * $line->getParameter(3); // null
 * $line->getParameter(3, "default val"); // default val
 *
 * $line->getOption( "optionName"); // 667
 * $line->getOption( "optionName2"); // a value
 * $line->getOption( "optionName3"); // null
 * $line->getOption( "optionName3", "default_val"); // default_val
 *
 * $line->hasFlag("flag1"); // true
 * $line->hasFlag("flag2"); // true
 * $line->hasFlag("flag3"); // false
 * ```
 *
 *
 * As you can guess, the type of the item depends on the key:
 *
 * - if the key starts with a dash (-), then it's a flag. The value has to be true. The flag name is what's after the dash.
 * - if the key starts with a colon (:), then it's a parameter. The value has to be true. The parameter name is what's after the colon.
 * - otherwise, it's an option, and the value is the value of the option.
 *
 *
 *
 */
class ArrayInput extends AbstractInput
{
    
    /**
     * Sets the items (parameters, options, flags) for this instance.
     *
     * Each item can be one of the following type:
     *
     * - parameter (the key of the item starts with a colon ":", the value must be true)
     * - flag (the key of the item starts with a dash "-", the value must be true)
     * - option (a regular key/value pair, no prefix)
     *
     * @param array $items
     */
    public function setItems(array $items)
    {
        $parameterIndex = 1;
        foreach ($items as $k => $v) {

            $firstChar = substr($k, 0, 1);

            if (true === $v && '-' === $firstChar) {
                $key = substr($k, 1);
                $this->flags[$key] = true;
            } elseif (true === $v && ':' === $firstChar) {
                $key = substr($k, 1);
                $this->parameters[$parameterIndex++] = $key;
            } else {
                $this->options[$k] = $v;
            }
        }
    }
}