<?php

namespace BabyTree\Parser;

/*
 * LingTalfi 2015-12-24
 */
use BabyDash\BabyDashTool;
use BabyTree\Exception\BabyTreeException;

class BabyTreeNotationParser
{


    private $perms;
    private $ownership;
    private $sepChar;
    private $linkChar;

    //


    public function __construct()
    {
        $this->perms = true;
        $this->ownership = true;
        $this->sepChar = '**';
        $this->linkChar = ' -> ';
    }


    public static function create()
    {
        return new static();
    }

    public function scan($string)
    {
        $ret = [];
        $r = BabyDashTool::parse($string);
        $parents = [];
        foreach ($r as $key => $value) {
            $this->parseEntry($key, $value, $parents, $ret);
        }
        return $ret;
    }

    public function setLinkChar($linkChar)
    {
        $this->linkChar = $linkChar;
        return $this;
    }

    public function setOwnership($ownership)
    {
        $this->ownership = $ownership;
        return $this;
    }

    public function setPerms($perms)
    {
        $this->perms = $perms;
        return $this;
    }

    public function setSepChar($sepChar)
    {
        $this->sepChar = $sepChar;
        return $this;
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
            $xplode = explode($this->sepChar, $key, 3);
        }
        elseif (is_string($value)) {
            $xplode = explode($this->sepChar, $value, 3);
            if (false !== strpos($xplode[0], $this->linkChar)) {
                $type = 'link';
            }
            else {
                $type = 'file';
            }
        }
        else {
            $this->error(sprintf("value argument must be of type string or array, %s given", gettype($value)));
        }

        // preparing BabyTreeInfo array
        $entry = [
            'type' => $type,
        ];

        $fileOrDir = null;
        if ('link' !== $type) {
            $fileOrDir = $this->parseFileOrDir($xplode, $parents, $entry);
        }
        else {
            $this->parseLink($xplode, $parents, $entry);
        }
        $ret[] = $entry;


        if ('dir' === $type && null !== $fileOrDir) {
            $parents[] = $fileOrDir;
            foreach ($value as $k => $v) {
                $this->parseEntry($k, $v, $parents, $ret);
            }
            array_pop($parents);
        }
        return $ret;
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
        if (array_key_exists(1, $xplode)) { // the optional perms/ownership part
            $this->parsePermsAndOwnership($xplode, $entry);
        }
        return $component;
    }

    private function parseLink(array $xplode, array $parents, array &$entry)
    {

        $path = trim($xplode[0]);
        $p = explode($this->linkChar, $path, 2);
        if (2 === count($p)) {
            $path = trim($p[0]);
            if ($parents) {
                $path = implode(DIRECTORY_SEPARATOR, $parents) . DIRECTORY_SEPARATOR . $path;
            }
            $entry['path'] = $path;
            $entry['linkTarget'] = trim($p[1]);
        }
        else {
            $this->error("invalid link path: $path");
        }

        if (array_key_exists(1, $xplode)) {
            $this->parsePermsAndOwnership($xplode, $entry);
        }
    }


    private function parsePermsAndOwnership(array $xplode, array &$entry)
    {
        $sliced = array_slice($xplode, 1);
        foreach ($sliced as $arr) {
            $permsOrOwnerShip = trim($arr);
            if (true === $this->perms && false === (array_key_exists('perms', $entry))) {
                $entry['perms'] = false;
            }
            if (true === $this->ownership && false === (array_key_exists('owner', $entry))) {
                $entry['owner'] = false;
                $entry['ownerGroup'] = false;
            }


            if (
                true === $this->perms &&
                '[' === substr($permsOrOwnerShip, 0, 1) &&
                ']' === substr($permsOrOwnerShip, -1)
            ) {
                if ('[_resource_not_existing_]' !== $permsOrOwnerShip) {
                    $entry['perms'] = substr($permsOrOwnerShip, 1, -1);
                }
            }
            elseif (
                true === $this->ownership &&
                '{' === substr($permsOrOwnerShip, 0, 1) &&
                '}' === substr($permsOrOwnerShip, -1)
            ) {

                if ('[_resource_not_existing_]' !== $permsOrOwnerShip) {
                    $this->parseOwnership(substr($permsOrOwnerShip, 1, -1), $entry);
                }
            }
        }
    }

    private function parseOwnership($ownership, array &$entry)
    {
        $p = explode('=', $ownership, 2);
        if (2 === count($p)) {
            $entry['owner'] = $p[0];
            $entry['ownerGroup'] = $p[1];
        }
        else {
            $this->error("invalid ownership format, equal symbol not found");
        }
    }

    private function error($m)
    {
        throw new BabyTreeException($m);
    }
}
