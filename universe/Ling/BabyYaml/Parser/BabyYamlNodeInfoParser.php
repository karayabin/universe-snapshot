<?php


namespace Ling\BabyYaml\Parser;

use Ling\BabyYaml\Reader\BabyYamlNodeInfoReader;

/**
 * The BabyYamlNodeInfoParser class.
 */
class BabyYamlNodeInfoParser
{


    /**
     * Returns an array containing the babyYaml array, plus the [nodeInfo map](https://github.com/lingtalfi/BabyYaml/blob/master/personal/mydoc/pages/node-info-parser.md) from the given string.
     *
     * The returned array has the following structure:
     *
     * - 0: babyYaml array
     * - 0: nodeInfo map
     *
     *
     * @param string $string
     * @return array
     */
    public function parseString(string $string): array
    {
        $reader = new BabyYamlNodeInfoReader();
        $config = $reader->readString($string);
        $nodeInfoMap = $reader->getNodeInfoMap();
        return [
            $config,
            $nodeInfoMap,
        ];
    }


    /**
     * Returns an array containing the babyYaml array, plus the [nodeInfo map](https://github.com/lingtalfi/BabyYaml/blob/master/personal/mydoc/pages/node-info-parser.md) from the given file.
     *
     * The returned array has the following structure:
     *
     * - 0: babyYaml array
     * - 0: nodeInfo map
     *
     * @param string $file
     * @return array
     */
    public function parseFile(string $file): array
    {
        $reader = new BabyYamlNodeInfoReader();
        $config = $reader->readFile($file);
        $nodeInfoMap = $reader->getNodeInfoMap();
        return [
            $config,
            $nodeInfoMap,
        ];
    }
}