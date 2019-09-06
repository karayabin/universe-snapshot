<?php


namespace Ling\TinyBullsheeter;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\CaseTool;
use Ling\Bat\RandomTool;

/**
 * The TinyBullsheeterTool class.
 */
class TinyBullsheeterTool
{


    /**
     * Returns a random nickname.
     *
     * @return string
     */
    public static function getRandomPseudo(): string
    {
        if (true === RandomTool::randomBool()) { // nickname?
            $ret = CaseTool::toSnake(self::pickRandom("nickname"));

        } else { // firstName/lastName combination ?

            $firstName = null;
            if (true === RandomTool::randomBool()) { // boy?
                $firstName = self::pickRandom("firstname-boy");
            } else { // girl ?
                $firstName = self::pickRandom("firstname-girl");
            }
            $lastName = self::pickRandom("lastname-us");
            $sep = self::pickRandomSepChar();
            if (true === RandomTool::randomBool()) { // start with first name?
                $ret = $firstName . $sep . $lastName;
            } else {
                $ret = $lastName . $sep . $firstName;
            }
        }
        if (true === RandomTool::randomBool(10)) { // add number?
            $ret .= self::pickRandomSepChar() . rand(1, 10000);
        }
        return $ret;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns a random data from the file identified by $filePath.
     *
     *
     * @param string $filePath
     * @return string
     */
    protected static function pickRandom(string $filePath): string
    {
        $file = __DIR__ . "/data/$filePath.byml";
        $data = BabyYamlUtil::readFile($file);
        return $data[rand(0, count($data) - 1)];
    }


    /**
     * Returns a random separation char for building email/pseudo.
     * @return string
     */
    protected static function pickRandomSepChar(): string
    {
        $sepChars = [
            "_",
            "-",
            ".",
        ];
        return $sepChars[rand(0, 2)];
    }

}

















