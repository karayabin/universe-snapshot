<?php

namespace Ling\UniverseTools;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\Bat\HttpTool;

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
     * Returns the current version number of the planet, from the metaInfo url.
     *
     * The $rawMetaInfoUrl is the url to the meta-info.byml file.
     *
     *
     * @param $rawMetaInfoUrl
     * @return string|null
     * @throws \Exception
     */
    public static function getVersionByUrl($rawMetaInfoUrl): ?string
    {
        if (true === HttpTool::isValidUrl($rawMetaInfoUrl)) {
            $content = file_get_contents($rawMetaInfoUrl);
        } else {
            return null;
        }
        if (false === $content) {
            return null;
        }
        $info = BabyYamlUtil::readBabyYamlString($content);
        return $info['version'] ?? null;
    }


    /**
     * Returns the version number associated with the given planetDir, if found in the meta-info file.
     * If not, null is returned.
     * @param string $planetDir
     * @return string|null
     */
    public static function getVersion(string $planetDir): ?string
    {
        $ret = null;
        if (is_dir($planetDir)) {
            $metaFile = $planetDir . "/meta-info.byml";
            if (is_file($metaFile)) {
                $info = BabyYamlUtil::readFile($metaFile);
                $ret = $info['version'] ?? null;
                if (null === $ret) {
                    return $ret;
                }
            }
        }
        return ((string)$ret);
    }


    /**
     * Increments the version number found in the meta-info.byml file, and returns that number.
     * The file is created if necessary.
     * If no version is found, the 0.1.0 is used.
     *
     * The version number must be a dot separated string.
     * The last dot component is incremented (thus it should be numeric).
     *
     *
     * @param string $planetDir
     * @return string
     */
    public static function incrementVersion(string $planetDir): string
    {
        $metaFile = $planetDir . "/meta-info.byml";
        $defaultVersion = "0.1.0";
        $arr = [];
        if (true === is_file($metaFile)) {
            $arr = BabyYamlUtil::readFile($metaFile);
            $currentVersion = $arr['version'] ?? $defaultVersion;
        } else {
            $currentVersion = $defaultVersion;
        }


        $p = explode(".", $currentVersion);
        $lastComponent = array_pop($p);
        $p[] = ++$lastComponent;
        $newVersion = implode('.', $p);
        $arr['version'] = $newVersion;

        BabyYamlUtil::writeFile($arr, $metaFile);
        return $newVersion;
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