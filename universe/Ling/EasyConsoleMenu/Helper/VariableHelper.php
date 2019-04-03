<?php


namespace Ling\EasyConsoleMenu\Helper;


/**
 * The VariableHelper class.
 */
class VariableHelper
{


    /**
     * Resolves the variables in msg, and returns the resolved msg.
     * If a variable is not found, it's value will be set to "undefined", and the variable name
     * will be appended to the undefined array.
     *
     * Note: a variable is written like this: ${variable}.
     *
     *
     *
     * @param string $msg
     * @param array $variables
     * @param array $undefined
     * @return string
     */
    public static function resolveVariables(string $msg, array $variables, array &$undefined = []): string
    {
        return preg_replace_callback('!\$\{([^\}]+)\}!', function ($match) use (&$undefined, $variables) {
            $var = $match[1];
            if (array_key_exists($var, $variables)) {
                return (string)$variables[$var];
            } else {
                $undefined[] = $var;
                return "undefined";
            }
        }, $msg);
    }

}