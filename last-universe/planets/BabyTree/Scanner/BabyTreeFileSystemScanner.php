<?php

namespace BabyTree\Scanner;

/*
 * LingTalfi 2015-12-24
 */
use BabyTree\Exception\BabyTreeException;
use Bat\FileSystemTool;
use DirScanner\DirScanner;

class BabyTreeFileSystemScanner
{


    private $perms;
    private $ownership;
    private $rootDirAlias;
    private $usePortableLinkTargetNotation;

    public function __construct()
    {
        $this->perms = true;
        $this->ownership = true;
        $this->rootDirAlias = '$';
        $this->usePortableLinkTargetNotation = true;
    }

    public static function create()
    {
        return new static();
    }

    /**
     * array:BabyTreeInfo|false     scanDir ( str:dir )
     */
    public function scanDir($dir)
    {
        $o = new DirScanner();
        $o->setFollowLinks(false);
        return $o->scanDir($dir, function ($path, $rPath, $level) use ($dir) {
            return $this->getBabyTreeArrayEntryByPath($path, $rPath, $dir);
        });
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

    public function setUsePortableLinkTargetNotation($usePortableLinkTargetNotation)
    {
        $this->usePortableLinkTargetNotation = $usePortableLinkTargetNotation;
        return $this;
    }

    public function setRootDirAlias($rootDirAlias)
    {
        $this->rootDirAlias = $rootDirAlias;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getBabyTreeArrayEntryByPath($path, $rPath, $rootDir)
    {
        $linkTarget = false;
        if (is_link($path)) {
            $type = 'link';
            if (false !== $l = readlink($path)) {
                if (false !== $realPathRootDir = realpath($rootDir)) {

                    // alias replacement...
                    if (true === $this->usePortableLinkTargetNotation) {
                        // ...if the link points to an existing target
                        if (false !== $realLinkTargetPath = realpath($l)) {
                            if (0 === strpos($realLinkTargetPath, $realPathRootDir)) {
                                $l = $this->rootDirAlias . mb_substr($realLinkTargetPath, mb_strlen($realPathRootDir));
                            }
                        }
                        // ...or even if it doesn't
                        elseif (0 === strpos($l, $realPathRootDir)) {
                            $l = $this->rootDirAlias . mb_substr($l, mb_strlen($realPathRootDir));
                        }
                    }
                }
                $linkTarget = $l;
            }
        } elseif (is_dir($path)) {
            $type = 'dir';
        } elseif (is_file($path)) {
            $type = 'file';
        } else {
            $this->warning("Unknown type of resource for $path");
        }

        $ret = [
            'type' => $type,
            'path' => $rPath,
            'linkTarget' => $linkTarget,
        ];


        // perms addition
        if (true === $this->perms) {
            $perms = FileSystemTool::filePerms($path, false);
            if (empty($perms)) {
                $perms = false;
            }
            $ret['perms'] = $perms;
        }
        if (true === $this->ownership) {
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
            $ret['owner'] = $owner;
            $ret['ownerGroup'] = $ownerGroup;
        }
        return $ret;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function warning($m)
    {
        throw new BabyTreeException($m);
    }

}
