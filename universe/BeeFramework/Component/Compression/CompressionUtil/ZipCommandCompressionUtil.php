<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Compression\CompressionUtil;

use BeeFramework\Bat\FileSystemTool;
use BeeFramework\Bat\MachineTool;
use BeeFramework\Component\Compression\Tool\CompressionTool;
use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;
use BeeFramework\Component\FileSystem\Finder\Finder;


/**
 * ZipCommandCompressionUtil
 * @author Lingtalfi
 * 2015-04-24
 *
 *
 * This zip util works with the underlying zip tool on your machine.
 *
 *
 */
class ZipCommandCompressionUtil extends CompressionUtil implements ExtractableCompressionUtilInterface
{


    public static function create()
    {
        return new static();
    }
    //------------------------------------------------------------------------------/
    // IMPLEMENTS CompressionUtilInterface
    //------------------------------------------------------------------------------/
    /**
     * onResourceConflict:
     *          1:
     *              in case of conflictual dirs, their content will be merged
     *              in case of conflictual files, one will be overwritten
     *
     */
    public function compress($src, $dst, array $options = [])
    {
        return parent::compress($src, $dst, $options);
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS ExtractableCompressionUtilInterface
    //------------------------------------------------------------------------------/
    /**
     * Returns the content of a file from the archive, without extracting the archive,
     *
     * @return false|string,
     *                  the content of the file as a string,
     *                  or false if the file was not found.
     */
    public function extractFile($archivePath, $fileRelativePath)
    {
        $cmd = 'unzip -p "' . self::dQuote($archivePath) . '" "' . self::dQuote($fileRelativePath) . '" 2>null';
        $ret = 0;
        ob_start();
        passthru($cmd, $ret);
        $content = ob_get_clean();
        if (0 === $ret) {
            $ret = $content;
        }
        else {
            $ret = false;
        }
        return $ret;
    }





    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function doDecompress($src, $dst, array $options = [])
    {

        $options = array_replace([
            "removeMacOsXDirs" => true,
        ], $options);


        $ret = false;

        /**
         *
         * -n:
         * never overwrite existing files. If a file already exists, skip the extraction of that file without prompting.
         * By default unzip queries before extracting any file that already exists;
         * the user may choose to overwrite only the current file, overwrite all files,
         * skip extraction of the current file, skip extraction of all existing files, or rename the current file.
         *
         * -d:
         * An optional directory to which to extract files
         */
        $command = 'unzip -n "' . self::dQuote($src) . '" -d "' . self::dQuote($dst) . '" 2>&1';


        $output = array();
        exec($command, $output, $return);
        if (0 === $return) {
            $ret = true;
            if (true === $options["removeMacOsXDirs"] && MachineTool::isMac()) {
                Finder::create($dst)->directories()->baseName('__MACOSX')->find(function (FinderFileInfo $file) {
                    FileSystemTool::remove($file);
                });
            }
        }


        return $ret;
    }

    protected function addToArchive($realPath, $baseName, $dst, &$ret)
    {
        $dir = dirname($realPath);
        $command = 'cd "' . self::dQuote($dir) . '" && zip -Xr ' . self::dQuote($dst) . ' ' . self::dQuote($baseName) . ' 2>&1';
        $output = array();
        exec($command, $output, $return);
        if (0 !== $return) {
            $ret = false;
        }
    }
    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private static function dQuote($str)
    {
        return str_replace('"', '\"', $str);
    }
}
