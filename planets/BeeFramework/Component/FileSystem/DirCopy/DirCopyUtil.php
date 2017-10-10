<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\DirCopy;

use BeeFramework\Bat\FileSystemTool;


/**
 * DirCopyUtil
 * @author Lingtalfi
 * 2015-05-20
 *
 */
class DirCopyUtil
{

    public static function create()
    {
        return new static();
    }

    /**
     * Copy the srcDir inside the dstDir
     * 
     * mode:
     * - 0: merge, do not erase existing files in dst
     * - 1: replace, replace files in dst
     */
    public function copyDir($srcDir, $dstDir, $mode = 0)
    {
        if (is_dir($srcDir)) {
            $dstDir .= '/' . basename($srcDir);
            FileSystemTool::mkdir($dstDir);
            $this->doCopyDir($srcDir, $dstDir, $mode);
        }
        else {
            throw new \RuntimeException("src argument must be a valid dir, $srcDir given");
        }
    }

    /**
     * Copy the content of the srcDir inside the dstDir
     *
     * mode:
     * - 0: merge, do not erase existing files in dst
     * - 1: replace, replace files in dst
     */
    public function copyDirContent($srcDir, $dstDir, $mode = 0)
    {
        if (is_dir($srcDir)) {
            FileSystemTool::mkdir($dstDir);
            $this->doCopyDir($srcDir, $dstDir, $mode);
        }
        else {
            throw new \RuntimeException("src argument must be a valid dir, $srcDir given");
        }
    }


    public function doCopyDir($src, $dst, $mode = 0)
    {
        FileSystemTool::mkdir($dst);
        $files = scandir($src);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $this->doCopyFile("$src/$file", "$dst/$file", $mode);
            }
        }
    }


    private function doCopyFile($src, $dst, $mode = 0)
    {
        if (is_link($src)) {
            if (1 === $mode && file_exists($dst)) {
                unlink($dst);
            }
            if (!file_exists($dst)) {
                symlink(readlink($src), $dst);
            }
        }
        elseif (is_dir($src)) {
            FileSystemTool::mkdir($dst);
            $this->doCopyDir($src, $dst, $mode);
        }
        elseif (is_file($src)) {
            if (
                !file_exists($dst) ||
                (1 === $mode && file_exists($dst))
            ) {
                copy($src, $dst);
            }
        }
    }
}
