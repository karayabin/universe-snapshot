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
     * Available options are:
     *
     * - numbersAsString: bool=true. Whether to convert numbers (int and float) to strings.
     *      This option is set to true by default, because some planets like Bat use a version number with two components only instead of three (i.e. 1.24, 1.25, ...).
     *      The float to string conversion in php can lead to errors, such as version 1.320 interpreted as 1.32, which is unacceptable.
     *      Since the meta-info.byml mainly contains the version information, it makes sense to have the numbersAsString set to true by default,
     *      so that 1.320 becomes string 1.320 instead of float 1.32.
     *
     *
     *
     *
     *
     * @param string $planetDir
     * @param array $options
     * @return array
     */
    public static function parseInfo(string $planetDir, array $options = []): array
    {
        $numbersAsString = $options['numbersAsString'] ?? true;
        $ret = [];
        if (is_dir($planetDir)) {
            $metaFile = $planetDir . "/meta-info.byml";
            if (is_file($metaFile)) {
                return BabyYamlUtil::readFile($metaFile, ['numbersAsString' => $numbersAsString]);
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
        $info = BabyYamlUtil::readBabyYamlString($content, ['numbersAsString' => true]);
        $version = $info['version'] ?? null;
        if (true === is_float($version)) { // might happen with versions with one decimal only, like 1.245 (see Bat)
            $version = (string)$version;
        }
        return $version;
    }


    /**
     * Returns the version number associated with the given planetDir, if found in the meta-info file.
     * If not, null is returned.
     *
     * @param string $planetDir
     * @return string|null
     */
    public static function getVersion(string $planetDir): ?string
    {
        $ret = null;
        if (is_dir($planetDir)) {
            $metaFile = $planetDir . "/meta-info.byml";
            if (is_file($metaFile)) {
                $info = BabyYamlUtil::readFile($metaFile, ["numbersAsString" => true]);
                $ret = $info['version'] ?? null;
            }
        }
        return $ret;
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
            $arr = BabyYamlUtil::readFile($metaFile, ['numbersAsString' => true]);
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