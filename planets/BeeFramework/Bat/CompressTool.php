<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Bat;

use BeeFramework\Component\Compression\CompressionUtil\ZipCommandCompressionUtil;


/**
 * CompressTool
 * @author Lingtalfi
 * 2015-04-23
 *
 */
class CompressTool
{


    /**
     * Extracts the given zip file to the given targetDir.
     *
     * If targetDir is null, this method will create a
     * folder with a name based on the zip file, and located in the
     * same folder where the zip file is.
     *
     * @return bool
     */
    public static function unzip($file, $targetDir = null)
    {
        if (file_exists($file)) {
            if (true === MachineTool::hasProgram('unzip')) {
                ZipCommandCompressionUtil::create()->decompress($file, $targetDir);
            }
            else {
                throw new \RuntimeException("Sorry, I don't know how to unzip without the unzip command yet");
            }
        }
        else {
            throw new \RuntimeException("Zip file not found: $file");
        }
        return $targetDir;

    }
    
    public static function zip($src, $dst = null)
    {
        if (file_exists($src)) {
            if (null !== $dst) {
                $dir = dirname($dst);
                FileSystemTool::mkdir($dir);
            }
            else{
                $dst = $src . '.zip';
            }

            if (true === MachineTool::hasProgram('zip')) {
                return ZipCommandCompressionUtil::create()->compress($src, $dst);
            }
            else {
                throw new \RuntimeException("Sorry, I don't know how to zip without the zip command yet");
            }
            
        }
        else {
            throw new \RuntimeException("Src not found: $src");
        }
        return false;
    }
}
