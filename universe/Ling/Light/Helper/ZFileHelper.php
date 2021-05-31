<?php


namespace Ling\Light\Helper;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;

/**
 * The ZFileHelper class.
 */
class ZFileHelper
{

    /**
     * Returns the path of the z file.
     *
     * @param string $appDir
     * @return string
     */
    public static function getZPath(string $appDir): string
    {
        return $appDir . "/config/services/_zzz.byml";
    }


    /**
     * Sets a property in the z file.
     *
     * @param string $appDir
     * @param string $key
     * @param $value
     */
    public static function setProp(string $appDir, string $key, $value)
    {
        $file = self::getZPath($appDir);
        BabyYamlUtil::updateProperty($file, $key, $value);
    }



    /**
     * Returns whether the z file has the given property.
     * @param string $appDir
     * @param string $key
     * @return bool
     */
    public static function hasProp(string $appDir, string $key): bool
    {
        $file = self::getZPath($appDir);
        if (true === file_exists($file)) {
            $arr = BabyYamlUtil::readFile($file);
            return BDotTool::hasDotValue($key, $arr);
        }
        return false;
    }

}