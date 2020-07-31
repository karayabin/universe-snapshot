<?php


namespace Ling\BabyYaml;


use Ling\BabyYaml\Parser\BabyYamlNodeInfoParser;
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
     * Proxy to the BabyYamlNodeInfoParser->parseString method.
     *
     * @param string $string
     * @return array
     */
    public static function parseNodeInfoByString(string $string): array
    {
        $o = new BabyYamlNodeInfoParser();
        return $o->parseString($string);
    }


    /**
     * Proxy to the BabyYamlNodeInfoParser->parseFile method.
     *
     * @param string $file
     * @return array
     */
    public static function parseNodeInfoByFile(string $file): array
    {
        $o = new BabyYamlNodeInfoParser();
        return $o->parseFile($file);
    }


    /**
     * Writes the given $data array to the $file.
     *
     * Available options are:
     * - nodeInfoMAp: a [nodeInfoMap](https://github.com/lingtalfi/BabyYaml/blob/master/personal/mydoc/pages/node-info-parser.md) can be passed.
     *      If so, it's re-injected in the given file.
     *
     * - comments: array, use this to update comments on the fly.
     *      It's an array of path => commentInfo, with:
     *      - path: string the bdot path representing the key of the comment to update
     *      - commentInfo: an array containing the following (all optional):
     *          - inline: string, the inline comment to set (will replace the current inline comment if any)
     *          - block: array of strings, the block comments to set (will replace the current block comments if any)
     *
     *
     *
     *
     *
     * @param array $data
     * @param string $file
     * @param array $options
     * @return bool
     */
    public static function writeFile(array $data, string $file, array $options = []): bool
    {
        return self::getWInst()->export($data, $file, $options);
    }


    /**
     * Returns the BabyYaml string corresponding to the given $data array.
     *
     * Available options are:
     * - commentsMap: a [commentsMap](https://github.com/lingtalfi/BabyYaml/blob/master/personal/mydoc/pages/node-info-parser.md) can be passed.
     *      If so, it's re-injected in the given file.
     *
     * @param array $data
     * @return string
     */
    public static function getBabyYamlString(array $data, array $options = []): string
    {
        return self::getWInst()->export($data, null, $options);
    }


}