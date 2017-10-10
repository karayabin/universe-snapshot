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
use BeeFramework\Component\Compression\Tool\CompressionTool;


/**
 * CompressionUtil
 * @author Lingtalfi
 * 2015-04-24
 *
 */
abstract class CompressionUtil implements CompressionUtilInterface
{

    abstract protected function addToArchive($realPath, $baseName, $dst, &$ret);

    /**
     * @return bool
     */
    abstract protected function doDecompress($src, $dst, array $options = []);



    //------------------------------------------------------------------------------/
    // IMPLEMENTS CompressionUtilInterface
    //------------------------------------------------------------------------------/
    public function compress($src, $dst, array $options = [])
    {
        $ret = true;
        $options = array_replace([
            'onResourceNotFound' => 0,
            'onResourceConflict' => 0,
            'onTargetExist' => function ($dst) {
                if (is_file($dst) || is_link($dst)) {
                    unlink($dst);
                }
                elseif (is_dir($dst)) {
                    throw new \RuntimeException("dst is an existing dir: $dst");
                }
            },
        ], $options);

        $allSrc = [];
        if (!is_array($src)) {
            $src = array($src);
        }

        foreach ($src as $path) {
            if (is_string($path)) {
                if (file_exists($path)) {
                    $allSrc[] = realpath($path);
                }
                else {
                    if (0 === $options['onResourceNotFound']) {
                        throw new \RuntimeException("File not found: $path");
                    }
                    elseif (1 === $options['onResourceNotFound']) {
                        return false;
                    }
                }
            }
            else {
                throw new \RuntimeException(sprintf("Invalid src path type: string expected, %s given", gettype($path)));
            }
        }


        if (file_exists($dst) && is_callable($options['onTargetExist'])) {
            if (false === call_user_func($options['onTargetExist'], $dst)) {
                return false;
            }
        }
        FileSystemTool::mkdir(dirname($dst));

        $baseNames = [];
        foreach ($allSrc as $path) {
            $baseName = basename($path);


            if (in_array($baseName, $baseNames, true)) {
                if (0 === $options['onResourceConflict']) {
                    throw new \RuntimeException("resource conflict with basename: $baseName");
                }
                else {
                    $this->onBaseNameConflict($baseName, $baseNames);
                }
            }
            $baseNames[] = $baseName;
            $this->addToArchive($path, $baseName, $dst, $ret);
        }

        return $ret;
    }


    public function decompress($src, &$dst = null, array $options = [])
    {
        $ret = false;
        if (is_string($src)) {
            if (file_exists($src) || !is_readable($src)) {


                if (null === $dst) {
                    $dst = CompressionTool::findUniqueDirByFile($src);
                }
                FileSystemTool::mkdir($dst);
                $ret = $this->doDecompress($src, $dst, $options);
            }
            else {
                throw new \RuntimeException(sprintf("cannot read the src: %s", $src));
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf('src element must be of type string, %s given', gettype($src)));
        }
        return $ret;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function onBaseNameConflict($baseName, $baseNames)
    {
    }
}
