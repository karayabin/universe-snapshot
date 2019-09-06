<?php


namespace Ling\BabyYaml;


use Ling\BabyYaml\Reader\BabyYamlReader;
use Ling\BabyYaml\Reader\Exception\ParseErrorException;
use Ling\BabyYaml\Writer\BabyYamlWriter;

class BabyYamlUtil
{

    /**
     * @var BabyYamlReader
     */
    private static $inst;

    /**
     * @var BabyYamlWriter
     */
    private static $winst;


    private function __construct()
    {
    }

    private static function getInst()
    {
        if (null === self::$inst) {
            self::$inst = new BabyYamlReader();
        }
        return self::$inst;
    }


    private static function getWInst()
    {
        if (null === self::$winst) {
            self::$winst = new BabyYamlWriter();
        }
        return self::$winst;
    }


    /**
     * Parses the given (comma separated value) string, using the babyYaml inline notation,
     * and returns the corresponding array.
     *
     * More about the babyYaml inline notation here: https://github.com/lingtalfi/BabyYaml#sequences-and-mappings.
     *
     *
     * Examples:
     * -----------
     * - pou, 4, "et,toi", 6   => [pou, 4, "et, toi", 6]    (count=4)
     * - pou, 4, et,toi, 6   => [pou, 4, et, toi, 6]        (count=5)
     *
     *
     * Types are preserved according to the babyYaml way
     * See the babyYaml documentation for more details: https://github.com/lingtalfi/BabyYaml#special-values-and-types.
     *
     *
     * @param string $string
     * @return array
     * @throws \Exception
     */
    public static function parseCsv(string $string): array
    {
        return current(self::readBabyYamlString('root: [' . $string . ']'));
    }

    /**
     * Returns the configuration array from the given babyYaml $file.
     *
     * @param string $file
     * @return array
     */
    public static function readFile(string $file)
    {
        return self::getInst()->readFile($file);
    }


    /**
     * Returns the configuration array from the given babyYaml $file.
     *
     * @param string $string
     * @return array
     * @throws ParseErrorException
     */
    public static function readBabyYamlString(string $string)
    {
        return self::getInst()->readString($string);
    }


    /**
     * Writes the given $data array to the $file.
     *
     * @param array $data
     * @param string $file
     * @return bool
     */
    public static function writeFile(array $data, string $file): bool
    {
        return self::getWInst()->export($data, $file);
    }


    /**
     * Returns the BabyYaml string corresponding to the  given $data array.
     *
     * @param array $data
     * @return string
     */
    public static function getBabyYamlString(array $data): string
    {
        return self::getWInst()->export($data);
    }

}