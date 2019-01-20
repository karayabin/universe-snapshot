<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Cache\CacheMaster\CacheDisciple;

use BeeFramework\Bat\ArrayTool;
use BeeFramework\Component\Cache\CacheMaster\Exception\CacheMasterException;


/**
 * ByFileMtimeCacheDisciple
 * @author Lingtalfi
 * 2015-06-03
 */
class ByFileMtimeCacheDisciple extends CacheDisciple
{


    protected function isFresh($meta)
    {
        $isValid = true;
        $file2Mtimes = $meta;
        foreach ($file2Mtimes as $file => $mtime) {
            if (is_file($file)) {
                if (false !== $m = filemtime($file)) {
                    if ($m !== $mtime) {
                        $isValid = false;
                        break;
                    }
                }
                else {
                    $isValid = false;
                    break;
                }
            }
            else {
                // the file has been removed?
                $isValid = false;
                break;
            }
        }
        return $isValid;
    }

    protected function createMeta(array $params)
    {
        ArrayTool::checkKeysAndTypes(['files' => 'a'], $params);
        $file2Mtimes = [];
        foreach ($params['files'] as $f) {
            if (file_exists($f) && is_readable($f)) {
                $file2Mtimes[$f] = filemtime($f);
            }
            else {
                throw new CacheMasterException(sprintf("File not found or not readable: %s", $f));
            }
        }
        return $file2Mtimes;
    }


}
