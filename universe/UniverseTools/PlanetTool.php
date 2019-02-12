<?php

namespace UniverseTools;


use DirScanner\YorgDirScannerTool;
use UniverseTools\Exception\UniverseToolsException;

/**
 * The PlanetTool class.
 */
class PlanetTool
{


    /**
     * Parses the given directory recursively and returns an array containing the names of all (bsr-0) classes found.
     *
     *
     *
     * @see https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md
     *
     * @param $planetDir
     * @return array
     * @throws UniverseToolsException
     */
    public static function getClassNames($planetDir){
        if (false === is_dir($planetDir)) {
            throw new UniverseToolsException("Dir not found: $planetDir");
        }

        $classNames = [];
        $dirName = basename($planetDir);


        $files = YorgDirScannerTool::getFilesWithExtension($planetDir, 'php', false, true, true);
        foreach ($files as $file) {
            $relativeClassName = str_replace('/', '\\', substr($file, 0, -4));
            $className = $dirName . '\\' . $relativeClassName;
            try {
                $class = new \ReflectionClass($className);
                $classNames[] = $className;

            } catch (\ReflectionException $e) {

            }
        }
        return $classNames;
    }


}