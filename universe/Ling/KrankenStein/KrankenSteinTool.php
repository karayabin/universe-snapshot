<?php


namespace Ling\KrankenStein;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\KrankenStein\Exception\KrankenSteinException;

/**
 * The KrankenSteinTool class.
 */
class KrankenSteinTool
{


    /**
     * This property holds the oneShot regex used by this class.
     * @var string
     */
    private static $oneShotReg = '!^([a-zA-Z0-9_\\\]+)(::|->)([a-zA-Z0-9_]+)\((.*)\)$!';


    /**
     * Returns whether the given string is @concept(one shot) or not.
     * @param string $str
     * @return bool
     */
    public static function isOneShot(string $str): bool
    {
        if (preg_match(self::$oneShotReg, $str, $match)) {
            return true;
        }
        return false;
    }


    /**
     * Executes the given @concept(one shot) string and returns the result.
     * The isOneShotString flag is raised to true if the given string is a one shot string indeed.
     *
     *
     * @param string $str
     * @param bool $isOneShotString
     * @return mixed
     * @throws \Exception
     */
    public static function executeOneShot(string $str, bool &$isOneShotString = false)
    {
        if (preg_match(self::$oneShotReg, $str, $match)) {
            $isOneShotString = true;
            $class = $match[1];
            $operator = $match[2];
            $method = $match[3];
            $argsString = $match[4];
            $args = self::getArgsFromArgString($argsString);

            if ('::' === $operator) {
                return call_user_func_array([$class, $method], $args);
            } elseif ('->' === $operator) {
                $instance = new $class;
                return call_user_func_array([$instance, $method], $args);
            } else {
                throw new KrankenSteinException("Not implemented yet");
            }

        }
        return null;
    }


    /**
     * Returns the array of arguments corresponding to the given $argString.
     * The argString should be written using the [BabyYaml](https://github.com/lingtalfi/BabyYaml#sequences-and-mappings) inline notation.
     *
     * @param string $argString
     * @return array
     * @throws \Exception
     */
    public static function getArgsFromArgString(string $argString)
    {
        return BabyYamlUtil::readBabyYamlString('0: [' . $argString . ']')[0];
    }
}

