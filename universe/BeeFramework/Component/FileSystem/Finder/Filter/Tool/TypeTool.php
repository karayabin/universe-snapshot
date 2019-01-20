<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\Finder\Filter\Tool;
use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;


/**
 * TypeTool
 * @author Lingtalfi
 * 2015-05-06
 * 
 */
class TypeTool {
    
    const TYPE_DIR = 1;
    const TYPE_FILE = 2;
    const TYPE_LINK = 4;


    /**
     * @param $types, a combination of flags 
     * @return bool
     */
    public static function typeMatch($types, FinderFileInfo $f){
        if ($f->isLink()) {
            return (self::TYPE_LINK === (self::TYPE_LINK & $types));
        }
        else {
            return (
                (true === $f->isDir() && (self::TYPE_DIR === (self::TYPE_DIR & $types))) ||
                (true === $f->isFile() && (self::TYPE_FILE === (self::TYPE_FILE & $types)))
            );
        }
    }

}
