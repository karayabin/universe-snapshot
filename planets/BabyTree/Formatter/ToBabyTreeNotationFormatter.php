<?php


namespace BabyTree\Formatter;

use BabyTree\Exception\BabyTreeException;


/**
 * @author Lingtalfi
 * 2015-12-25
 *
 */
class ToBabyTreeNotationFormatter implements FormatterInterface
{

    private $rootDir;
    private $rootDirAlias;

    private $indentFactor;
    private $indentChar;
    private $sepChar;

    private $showFileInfo;
    private $showPerms;
    private $showOwner;
    private $showOwnerGroup;

    /**
     * Whether or not to convert rootDirAlias notation to absolute path
     */
    private $expandRootDirAliases;


    public function __construct()
    {
        $this->indentFactor = 4;
        $this->indentChar = '-';
        $this->sepChar = '**';
        $this->rootDirAlias = '$';
        $this->showFileInfo = true;
        $this->showOwner = true;
        $this->showOwnerGroup = true;
        $this->showPerms = true;
        $this->expandRootDirAliases = false;

    }

    public static function create()
    {
        return new static();
    }

    public function format(array $babyTreeInfo)
    {
        if (null === $this->rootDir) {
            throw new BabyTreeException("Root dir not set");
        }
        $realRootDir = realpath($this->rootDir);
        if (false === $realRootDir) {
            throw new BabyTreeException("Root dir not found");
        }

        $fmt = "";
        foreach ($babyTreeInfo as $info) {


            $path = $info['path'];
            $type = $info['type'];
            $linkTarget = $info['linkTarget'];
            $perms = $info['perms'];
            $owner = $info['owner'];
            $ownerGroup = $info['ownerGroup'];


            $nbIndentChar = (substr_count($path, DIRECTORY_SEPARATOR)) * $this->indentFactor + 1;
            $lineAndPath = str_repeat($this->indentChar, $nbIndentChar) . " " . basename($path);


            if ('link' === $type) {

                $isRootDirAlias = false;

                // Does the link target really exist?
                if (0 === strpos($linkTarget, '.')) {
                    $realLinkTarget = $realRootDir . DIRECTORY_SEPARATOR . dirname($path) . DIRECTORY_SEPARATOR . $linkTarget;
                } else {
                    if (null !== $this->rootDirAlias && 0 === strpos($linkTarget, $this->rootDirAlias)) {
                        $isRootDirAlias = true;
                        $realLinkTarget = $realRootDir . mb_substr($linkTarget, mb_strlen($this->rootDirAlias));
                        $realLinkTarget = realpath($realLinkTarget);
                    } else {
                        $realLinkTarget = realpath($linkTarget);
                    }
                }

                if (file_exists($realLinkTarget)) {
                    $fileInfo = $this->getFileInfo($perms, $owner, $ownerGroup);
                } else {
                    $fileInfo = " " . $this->sepChar . " [_target_not_found_]";
                }
                if (false === $this->showFileInfo) {
                    $fileInfo = '';
                }


                if (true === $this->expandRootDirAliases && true === $isRootDirAlias) {
                    $linkTarget = $realLinkTarget;
                }
                $fmt .= $lineAndPath . ' -> ' . $linkTarget . $fileInfo;
            } else {
                $colon = '';
                if ('dir' === $type) {
                    $colon = ':';
                }
                $fileInfo = (true === $this->showFileInfo) ? $this->getFileInfo($perms, $owner, $ownerGroup) : '';
                $fmt .= $lineAndPath . $fileInfo . $colon;
            }
            $fmt .= PHP_EOL;
        }
        return $fmt;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function setIndentChar($indentChar)
    {
        $this->indentChar = $indentChar;
        return $this;
    }

    public function setIndentFactor($indentFactor)
    {
        $this->indentFactor = $indentFactor;
        return $this;
    }

    public function setRootDir($rootDir)
    {
        $this->rootDir = $rootDir;
        return $this;
    }

    public function setRootDirAlias($rootDirAlias)
    {
        $this->rootDirAlias = $rootDirAlias;
        return $this;
    }

    public function setSepChar($sepChar)
    {
        $this->sepChar = $sepChar;
        return $this;
    }

    public function setShowFileInfo($showFileInfo)
    {
        $this->showFileInfo = $showFileInfo;
        return $this;
    }

    public function setShowOwner($showOwner)
    {
        $this->showOwner = $showOwner;
        return $this;
    }

    public function setShowOwnerGroup($showOwnerGroup)
    {
        $this->showOwnerGroup = $showOwnerGroup;
        return $this;
    }

    public function setShowPerms($showPerms)
    {
        $this->showPerms = $showPerms;
        return $this;
    }

    public function setExpandRootDirAliases($expandRootDirAliases)
    {
        $this->expandRootDirAliases = $expandRootDirAliases;
        return $this;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function getFileInfo($perms, $owner, $ownerGroup)
    {
        $permFmt = '';

        if (false !== $perms && true === $this->showPerms) {
            $permFmt .= ' ' . $this->sepChar . ' [' . $perms . ']';
        }
        if (false !== $owner && false !== $ownerGroup) {

            $inside = '';
            if (true === $this->showOwner && true === $this->showOwnerGroup) {
                $inside = '{' . $owner . '=' . $ownerGroup . '}';
            } else {
                if (true === $this->showOwner) {
                    $inside = '{' . $owner . '}';
                } elseif (true === $this->showOwnerGroup) {
                    $inside = '{' . $ownerGroup . '}';
                }
            }
            if ($inside) {
                $permFmt .= ' ' . $this->sepChar;
                $permFmt .= ' ' . $inside;
            }
        }

        return $permFmt;
    }
}
