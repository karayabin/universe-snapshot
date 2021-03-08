<?php


namespace Ling\UniverseTools;

use Ling\Bat\FileSystemTool;
use Ling\DirScanner\YorgDirScannerTool;

/**
 * The AssetsMapTool class.
 */
class AssetsMapTool
{


    /**
     * Copies all the asset files found in the given assetsMap directory into the target application dir.
     * When a file already exists, it's replaced.
     *
     *
     * @param string $assetMapDir
     * @param string $targetAppDir
     */
    public static function copyAssets(string $assetMapDir, string $targetAppDir)
    {
        FileSystemTool::copyDir($assetMapDir, $targetAppDir);
    }


    /**
     * Removes the assets files ("defined" in the assetsMapDir) from the target app dir.
     *
     * See the @page(UniverseTools conception notes) for more details.
     *
     *
     * @param string $assetMapDir
     * @param string $targetAppDir
     */
    public static function removeAssets(string $assetMapDir, string $targetAppDir)
    {
        $files = YorgDirScannerTool::getFiles($assetMapDir, true, true);
        foreach ($files as $relPath) {
            $file = $targetAppDir . "/" . $relPath;
            if (is_file($file)) {
                FileSystemTool::remove($file);
            }
        }
    }


    /**
     * Returns the list of files found in the given asset/map directory.
     * @param string $assetMapDir
     * @param bool $useRelativePath
     * @return array
     */
    public static function getAssets(string $assetMapDir, bool $useRelativePath = true): array
    {
        if (true === is_dir($assetMapDir)) {
            return YorgDirScannerTool::getFiles($assetMapDir, true, $useRelativePath);
        }
        return [];
    }


    /**
     * Returns the path to the asset/map directory.
     *
     * @param string $planetDir
     * @return string
     */
    public static function getAssetMapDirByPlanetDir(string $planetDir): string
    {
        return $planetDir . "/assets/map";
    }
}