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
use BeeFramework\Notation\File\BabyDash\Tool\BabyDashTool;
use BeeFramework\Notation\FileSystem\BabyTree\BabyTreeConst;


/**
 * BabyTreeNotationScanner
 * @author Lingtalfi
 * 2015-04-28
 *
 */
class BabyTreeNotationScanner
{

    protected $options;

    public function scanDir($string, array $options = [])
    {

        $ret = [];
        $this->options = array_replace([
            'perms' => true,
            'ownership' => true,
            'sepChar' => '**',
        ], $options);

        $r = BabyDashTool::parseString($string);
        $parents = [];
        foreach ($r as $key => $value) {
            $this->parseEntry($key, $value, $parents, $ret);
        }
        return $ret;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function parseEntry($key, $value, array $parents, array &$ret)
    {

        $type = null;
        $xplode = null;
        if (is_array($value)) {
            $type = 'dir';
            $xplode = explode($this->options['sepChar'], $key, 3);
        }
        elseif (is_string($value)) {
            $xplode = explode($this->options['sepChar'], $value, 3);
            if (false !== strpos($xplode[0], ' -> ')) {
                $type = 'link';
            }
            else {
                $type = 'file';
            }
        }
        else {
            throw new \UnexpectedValueException(sprintf("value argument must be of type string or array, %s given", gettype($value)));
        }
        $entry = [
            'type' => $type,
        ];

        $compo = null;
        if ('link' !== $type) {
            $compo = $this->parseFileOrDir($xplode, $parents, $entry);
        }
        else {
            $this->parseLink($xplode, $parents, $entry);
        }
        $ret[] = $entry;


        if ('dir' === $type && null !== $compo) {
            $parents[] = $compo;
            foreach ($value as $k => $v) {
                $this->parseEntry($k, $v, $parents, $ret);
            }
            array_pop($parents);
        }
        return $ret;
    }


    private function parseLink(array $xplode, array $parents, array &$entry)
    {

        $path = trim($xplode[0]);
        $p = explode(' -> ', $path, 2);
        if (2 === count($p)) {
            $path = trim($p[0]);
            if ($parents) {
                $path = implode(DIRECTORY_SEPARATOR, $parents) . DIRECTORY_SEPARATOR . $path;
            }
            $entry['path'] = $path;
            $entry['linkTarget'] = trim($p[1]);
        }
        else {
            throw new \RuntimeException("invalid link path: $path");
        }

        if (array_key_exists(1, $xplode)) {
            $first = trim($xplode[1]);
            if ('[_resource_not_existing_]' !== $first) {
                $entry['perms'] = substr($first, 1, -1);
                if (array_key_exists(2, $xplode)) {
                    $this->parseOwnership($xplode[2], $entry);
                }

            }
        }
    }

    private function parseFileOrDir(array $xplode, array $parents, array &$entry)
    {

        $path = trim($xplode[0]);
        $component = $path;
        if ($parents) {
            $path = implode(DIRECTORY_SEPARATOR, $parents) . DIRECTORY_SEPARATOR . $path;
        }
        $entry['path'] = $path;
        $entry['linkTarget'] = false;
        if (array_key_exists(1, $xplode)) {
            $perms = trim($xplode[1]);
            $entry['perms'] = substr($perms, 1, -1);
            if (array_key_exists(2, $xplode)) {
                $this->parseOwnership($xplode[2], $entry);
            }
        }
        return $component;
    }

    private function parseOwnership($ownership, array &$entry)
    {
        $ownership = trim($ownership);
        $ownership = substr($ownership, 1, -1);
        $p = explode('=', $ownership, 2);
        if (2 === count($p)) {
            $entry['owner'] = $p[0];
            $entry['ownerGroup'] = $p[1];
        }
        else {
            throw new \RuntimeException("invalid ownership format, equal symbol not found");
        }
    }
}
