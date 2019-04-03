<?php


namespace Ling\Deploy\Helper;


use Ling\Bat\FileSystemTool;
use Ling\Deploy\Exception\DeployException;
use Ling\DirScanner\YorgDirScannerTool;

/**
 * The FilesHelper class.
 */
class FilesHelper
{

    /**
     * Removes files by their names.
     *
     * @param string $rootDir
     * @param string|array $names
     * @throws DeployException
     */
    public static function removeFilesByName(string $rootDir, $names)
    {
        if (is_dir($rootDir)) {

            if (is_string($names)) {
                $names = OptionHelper::csvToArray($names);
            }


            $files = YorgDirScannerTool::getFiles($rootDir, true);
            foreach ($files as $file) {
                $baseName = basename($file);
                if (in_array($baseName, $names, true)) {
                    FileSystemTool::remove($file);
                }
            }

        } else {
            throw new DeployException("FilesHelper: this is not a dir: $rootDir.");
        }
    }


    /**
     * Returns all the application files, excluding the .deploy directory and its content.
     *
     *
     * @param string $applicationDir
     * @param bool $relativePaths = false
     * @return array
     */
    public static function getApplicationFiles(string $applicationDir, bool $relativePaths = false)
    {
        return YorgDirScannerTool::getFilesIgnoreMore($applicationDir, [], [".deploy"], true, $relativePaths, false, 0);
    }

}