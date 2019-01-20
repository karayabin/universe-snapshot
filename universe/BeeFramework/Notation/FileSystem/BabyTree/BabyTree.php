<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\FileSystem\BabyTree;

use BeeFramework\Bat\FileSystemTool;
use BeeFramework\Bat\FileTool;
use BeeFramework\Notation\FileSystem\BabyTree\ArrayEntryFormatter\DebugArrayEntryFormatter;
use BeeFramework\Notation\FileSystem\BabyTree\ArrayEntryFormatter\NotationArrayEntryFormatter;
use BeeFramework\Notation\FileSystem\BabyTree\Forker\ForkerUtil;
use BeeFramework\Notation\FileSystem\BabyTree\Scanner\BabyTreeNotationScanner;
use BeeFramework\Notation\FileSystem\BabyTree\Tool\BabyTreeTool;


/**
 * BabyTree
 * @author Lingtalfi
 * 2015-04-28
 *
 */
class BabyTree
{

    protected $array;

    private function __construct(array $array)
    {
        $this->array = $array;
    }


    public static function createFromDir($dir)
    {
        return new static (BabyTreeTool::scanTree($dir));
    }

    public static function createFromNotation($string, array $options = [])
    {
        $o = new BabyTreeNotationScanner();
        $r = $o->scanDir($string, $options);
        return new static ($r);
    }

    public static function createFromNotationFile($file, array $options = [])
    {
        if (is_string($file)) {
            if (file_exists($file)) {
                return self::createFromNotation(file_get_contents($file), $options);
            }
            else {
                throw new \InvalidArgumentException("file not found: $file");
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("file argument must be of type string, %s given", gettype($file)));
        }
    }


    public function toNotationFile($file, array $options = [])
    {
        FileTool::checkValidFilePath($file);
        $options['cr'] = PHP_EOL; 
        FileSystemTool::filePutContents($file, $this->toNotationString($options));

    }


    public function toDebugString(array $options = [])
    {
        $s = '';
        $cr = (array_key_exists('cr', $options)) ? $options['cr'] : '<br>';
        $o = new DebugArrayEntryFormatter($options);
        foreach ($this->array as $entry) {
            $s .= $o->format($entry);
            $s .= $cr;
        }
        return $s;
    }

    public function toNotationString(array $options = [])
    {
        $cr = (array_key_exists('cr', $options)) ? $options['cr'] : '<br>';
        $s = '';
        $o = new NotationArrayEntryFormatter($options);
        foreach ($this->array as $entry) {
            $s .= $o->format($entry);
            $s .= $cr;
        }
        return $s;
    }

    /**
     *
     * @param array $options , ForkerUtil options, see ForkerUtil doc for more details
     *
     *      - replace: bool=true
     *      - perms: bool=true
     *      - ownership: bool=true
     *      - contents: []
     *      - ignoreBaseName: [.DS_Store]
     *      - ...?
     */
    public function fork($dstDir, array $options = [])
    {
        $o = new ForkerUtil();
        $o->fork($this->getArray(), $dstDir, $options);
    }


    public function getArray()
    {
        return $this->array;
    }


}
