<?php

namespace Ling\UniverseTools;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;

/**
 * The MetaInfoTool class.
 *
 * A planet should have a meta-info.byml file at the root of its directory.
 *
 * The meta-info.byml contains various information about the planet, especially the current version of the planet.
 *
 *
 */
class MetaInfoTool
{


    /**
     * Returns an array of the meta info found in the given planet.
     *
     * If no info is found (meta-info file not found for instance), the returned array will be empty.
     *
     *
     *
     *
     * @param string $planetDir
     * @return array
     */
    public static function parseInfo(string $planetDir): array
    {
        $ret = [];
        if (is_dir($planetDir)) {
            $metaFile = $planetDir . "/meta-info.byml";
            if (is_file($metaFile)) {
                return BabyYamlUtil::readFile($metaFile);
            }
        }
        return $ret;
    }


    /**
     * Writes the given meta $info to the meta-info.byml file of the given $planetDir.
     *
     * @param string $planetDir
     * @param array $info
     * @return bool
     */
    public static function writeInfo(string $planetDir, array $info)
    {
        $metaFile = $planetDir . "/meta-info.byml";
        return FileSystemTool::mkfile($metaFile, BabyYamlUtil::getBabyYamlString($info));
    }

}