<?php

namespace PermsHiker\Parser;

/*
 * LingTalfi 2016-06-16
 * Note: I don't use php7 syntax here because I plan to use this class
 * on old server that I need to backup, but god do I want to.
 */
use Bat\FileSystemTool;
use Bat\LocalHostTool;
use DirScanner\DirScanner;
use PermsHiker\Exception\PermsHikerException;
use PermsHiker\Filter\PermsHikerFilterInterface;

class PermsHikerParser
{

    /**
     * array of commonPerms, each entry being the an array containing:
     *      - owner
     *      - ownerGroup
     *      - type (f|d)
     *      - mode (octal notation, like 0755 for instance)
     *
     */
    private $commonPerms;

    /**
     * component separator of a perms list entry.
     * Default is the colon (:).
     */
    private $separator;
    private $errors;
    /**
     * If true (default),
     * the hiker will fall back to owner/ownergroup ids if it cannot get the names.
     */
    private $allowOwnerId;

    /**
     * When strict mode is on (false by default).
     * Any error turns into an exception (it does everything or nothing, but not half of the task).
     */
    private $strictMode;
    /**
     * When dirsOnly mode is on (default is off), only dirs are collected (not files)
     */
    private $dirsOnly;
    private $filters;

    public function __construct()
    {
        $this->commonPerms = [];
        $this->errors = [];
        $this->filters = [];
        $this->separator = ':';
        $this->allowOwnerId = true;
        $this->strictMode = false;
        $this->dirsOnly = false;
    }


    public static function create()
    {
        return new static();
    }


    public function toArray($dir)
    {
        $ret = [];
        DirScanner::create()->scanDir($dir, function ($path, $rPath, $level) use (&$ret) {
            if (false !== ($entry = $this->getPermsListEntry($path, $rPath))) {
                $ret[] = $entry;
            }
        });
        return $ret;
    }


    public function toFile($dir, $targetFile)
    {
        $s = '';
        DirScanner::create()->scanDir($dir, function ($path, $rPath, $level) use (&$s) {
            if (false !== ($entry = $this->getPermsListEntry($path, $rPath))) {
                $s .= $entry . PHP_EOL;
            }
        });


        // apply filters
        foreach ($this->filters as $f) {
            $s = $f->filter($s);
        }


        if (false === file_put_contents($targetFile, $s)) {
            $this->_error("Could not put the contents into $targetFile");
        }
        return (false === $this->hasErrors());
    }


    public function addCommonPerm($owner, $ownerGroup, $fileType, $mode)
    {
        $fileType = strtolower($fileType);
        if ('d' !== $fileType && 'f' !== $fileType) {
            throw new PermsHikerException("fileType must be either d (directory) or f (file)");
        }

        if (!is_string($mode)) {
            $mode = '0' . decoct($mode);
        }

        if (LocalHostTool::isUnix()) {
            // it's easier to work with numbers later, so do the conversion now...
            if (!is_numeric($owner)) {
                $out = [];
                $ret = 0;
                $newOwner = exec("id -u $owner", $out, $ret);
                if (0 === $ret) {
                    $owner = (int)$newOwner;
                }
            }
            if (!is_numeric($ownerGroup)) {
                $out = [];
                $ret = 0;
                $newOwnerGroup = exec("grep $ownerGroup: /etc/group | cut -d: -f3", $out, $ret);
                if (0 === $ret) {
                    $ownerGroup = (int)$newOwnerGroup;
                }
            }
        }


        $this->commonPerms[] = [
            $owner,
            $ownerGroup,
            $fileType,
            $mode,
        ];
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function hasErrors()
    {
        return (0 !== count($this->errors));
    }

    public function getErrors()
    {
        return $this->errors;
    }


    public function setAllowOwnerId($allowOwnerId)
    {
        $this->allowOwnerId = $allowOwnerId;
        return $this;
    }

    public function setStrictMode($strictMode)
    {
        $this->strictMode = $strictMode;
        return $this;
    }

    public function setDirsOnly($dirsOnly)
    {
        $this->dirsOnly = $dirsOnly;
        return $this;
    }

    public function addFilter(PermsHikerFilterInterface $f)
    {
        $this->filters[] = $f;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function _error($m)
    {
        if (true === $this->strictMode) {
            throw new PermsHikerException($m);
        }
        $this->errors[] = $m;
    }

    private function getPermsListEntry($path, $rPath)
    {

        if (!is_link($path)) {
            if (false !== ($mode = FileSystemTool::filePerms($path, false))) {

                $owner = fileowner($path);
                $ownerGroup = filegroup($path);
                $type = (is_dir($path)) ? 'd' : 'f';

                if (true === $this->permMatch($owner, $ownerGroup, $type, $mode)) {
                    return false;
                }

                if (true === $this->dirsOnly && 'f' === $type) {
                    return false;
                }

                // now let's return the formatted line
                if (extension_loaded('posix')) {
                    $owner = posix_getpwuid($owner)['name'];
                    $ownerGroup = posix_getgrgid($ownerGroup)['name'];


                    /**
                     * this is for the case where:
                     *      - we are on a non unix machine
                     *      - and the owner and ownerGroup arguments, passed to the addCommonPerm method
                     *              were names rather than ids
                     */
                    if (true === $this->permMatch($owner, $ownerGroup, $type, $mode)) {
                        return false;
                    }

                }
                else {
                    if (false === $this->allowOwnerId) {
                        $this->_error("cannot access the owner/ownergroup names. Set allowOwnerId to true, or make sure posix extension for php is available");
                    }
                }

                return './' . $rPath .
                $this->separator . $owner .
                $this->separator . $ownerGroup .
                $this->separator . $mode;
            }
            else {
                $this->_error("could not access permissions for file $path");
            }
        }
        return false;
    }

    private function permMatch($owner, $ownerGroup, $type, $mode)
    {
        // if this entry matches a commonPerm, skip it
        foreach ($this->commonPerms as $commonPerm) {

            list($_owner, $_ownerGroup, $_type, $_mode) = $commonPerm;

            if (
                (int)$_owner === (int)$owner &&
                (int)$_ownerGroup === (int)$ownerGroup &&
                $type === $_type &&
                $mode === $_mode
            ) {
                return true;
            }
        }
        return false;
    }
}
