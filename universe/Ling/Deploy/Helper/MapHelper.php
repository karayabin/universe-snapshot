<?php


namespace Ling\Deploy\Helper;


use Ling\DirScanner\YorgDirScannerTool;

/**
 * The MapHelper class.
 */
class MapHelper
{


    /**
     * Returns an array of relative paths of the application files matching the given mapConf.
     * See the @page(map conf configuration) section for more details.
     *
     *
     * @param string $applicationDir
     * @param array $mapConf
     * @return array
     */
    public static function collectFiles(string $applicationDir, array $mapConf)
    {
        $ignoreHidden = $mapConf['ignoreHidden'];
        $ignoreName = $mapConf['ignoreName'];
        $ignorePath = $mapConf['ignorePath'];
        $ignore[] = ".deploy";

        $files = YorgDirScannerTool::getFilesIgnoreMore($applicationDir, $ignoreName, $ignorePath, true, true, false, $ignoreHidden);
        return $files;
    }

}