<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\DirScanner;


/**
 * DirScanner
 * @author Lingtalfi
 * 2015-04-28
 *
 */
class DirScanner
{

    protected $rootDir;


    public function scanDir($dir, $callable)
    {
        $ret = [];
        if (is_callable($callable)) {
            if (is_string($dir)) {
                if (file_exists($dir)) {
                    $dir = realpath($dir);
                    $this->rootDir = $dir;
                    $relDir = null;
                    $this->doScanDir($dir, $relDir, $callable, 0, $ret);
                }
                else {
                    throw new \RuntimeException("Dir not found: $dir");
                }
            }
            else {
                throw new \InvalidArgumentException(sprintf("dir argument must be of type string, %s given", gettype($dir)));
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("callable argument must be a callable, %s given", gettype($callable)));
        }
        return $ret;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function doScanDir($dir, $relDir, $callable, $level, array &$ret)
    {
        if (file_exists($dir)) {
            $files = scandir($dir);
            foreach ($files as $file) {
                if ('.' !== $file && '..' !== $file) {
                    $path = $dir . '/' . $file;
                    if (null !== $relDir) {
                        $rPath = $relDir . '/' . $file;
                    }
                    else {
                        $rPath = $file;
                    }
                    $ret[] = call_user_func($callable, $path, $rPath, $this->rootDir, $level);
                    if (is_dir($path) && !is_link($path)) {
                        $this->doScanDir($path, $rPath, $callable, $level + 1, $ret);
                    }
                }
            }
        }
        else {
            $this->error("dir does not exist: $dir");
        }
    }


    protected function error($msg)
    {
        throw new \RuntimeException($msg);
    }
}
