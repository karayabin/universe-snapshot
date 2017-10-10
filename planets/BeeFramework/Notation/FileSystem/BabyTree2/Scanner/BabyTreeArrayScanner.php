<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\FileSystem\BabyTree\Scanner;

use BeeFramework\Bat\FileSystemTool;
use BeeFramework\Component\FileSystem\DirScanner\DirScanner;
use BeeFramework\Notation\FileSystem\BabyTree\BabyTreeConst;


/**
 * BabyTreeArrayScanner
 * @author Lingtalfi
 * 2015-04-28
 *
 */
class BabyTreeArrayScanner
{

    protected $options;

    public function scanDir($dir, array $options = [])
    {

        $this->options = array_replace([
            'perms' => true,
            'ownership' => true,
        ], $options);
        $o = new DirScanner();
        return $o->scanDir($dir, function ($path, $rPath, $rootDir, $level) {
            return $this->getBabyTreeArrayEntryByPath($path, $rPath, $rootDir);
        });
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getBabyTreeArrayEntryByPath($path, $rPath, $rootDir)
    {
        $linkTarget = false;
        if (is_link($path)) {
            $type = 'link';
            if (false !== $l = readlink($path)) {
                $linkTarget = str_replace($rootDir, BabyTreeConst::SYMBOL_ROOTDIR_ALIAS, $l);
            }
        }
        elseif (is_dir($path)) {
            $type = 'dir';
        }
        elseif (is_file($path)) {
            $type = 'file';
        }
        else {
            throw new \RuntimeException("Unknown type of resource for $path");
        }


        $perms = FileSystemTool::filePerms($path);
        if (empty($perms)) {
            $perms = false;
        }


        $owner = false;
        $ownerGroup = false;
        if (is_dir($path) || is_file($path)) {
            $owner = fileowner($path);
            $ownerGroup = filegroup($path);
            if (extension_loaded('posix')) {
                $owner = posix_getpwuid($owner)['name'];
                $ownerGroup = posix_getgrgid($ownerGroup)['name'];
            }
        }


        $ret = [
            'type' => $type,
            'path' => $rPath,
            'linkTarget' => $linkTarget,
        ];
        if (true === $this->options['perms']) {
            $ret['perms'] = $perms;
        }
        if (true === $this->options['ownership']) {
            $ret['owner'] = $owner;
            $ret['ownerGroup'] = $ownerGroup;
        }
        return $ret;
    }
}
