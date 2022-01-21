<?php

namespace Ling\Light_It4Tools\File;


use Ling\Bat\FileSystemTool;
use Ling\DirScanner\YorgDirScannerTool;

/**
 * The It4FileParserTool class.
 */
class It4FileParserTool
{


    /**
     * Returns the array of tables, based on the given root dir.
     * See the It4DbParserTool documentation for more info about the root dir.
     *
     * @param string $rootDir
     * @return array
     */
    public static function readTablesFromCreateFiles(string $rootDir): array
    {
        $ret = [];
        $createDir = $rootDir . "/create/single";
        if (true === is_dir($createDir)) {
            $ret = array_map(function ($v) {
                return FileSystemTool::removeExtension($v);
            }, YorgDirScannerTool::getFiles($createDir, false, true));
        }
        return $ret;
    }
}