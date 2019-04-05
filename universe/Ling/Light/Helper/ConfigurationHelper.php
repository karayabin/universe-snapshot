<?php


namespace Ling\Light\Helper;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\DirScanner\YorgDirScannerTool;

/**
 * The ConfigurationHelper class.
 */
class ConfigurationHelper
{


    /**
     *
     * Returns the merged configuration of all @page(BabyYaml) configuration files found in the given directory.
     * The merging uses the rules of the @page(arrayMergeReplaceRecursive) algorithm.
     *
     *
     *
     * @param string $directory
     * @return array
     */
    public static function getCombinedConf(string $directory): array
    {
        $ret = [];
        if (is_dir($directory)) {
            $files = YorgDirScannerTool::getFilesWithExtension($directory, "byml", false, true, false);
            foreach ($files as $file) {
                $fileConf = BabyYamlUtil::readFile($file);
                $ret = ArrayTool::arrayMergeReplaceRecursive([$ret, $fileConf]);
            }
        }
        return $ret;
    }
}