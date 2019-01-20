<?php

namespace CopyDir;

/*
 * LingTalfi 2015-10-19
 * 
 * Features:
 * - on file conflict: if the target is a file, its content gets replaced with
 *          the content of the src. 
 * - by default ignore conflict errors
 * - can handle mapping of permissions
 * 
 * 
 */

class AuthorCopyDirUtil extends CopyDirUtil
{

    private $applyPerms;
    private $applyOwner;
    private $ignoreConflictErrors;

    public function __construct()
    {
        parent::__construct();
        $this->applyOwner = false;
        $this->applyPerms = false;
        $this->ignoreConflictErrors = true;
    }

    public function setPreservePerms($bool)
    {
        $bool = (bool)$bool;
        $this->applyOwner = $bool;
        $this->applyPerms = $bool;
        return $this;
    }

    public function setIgnoreConflictErrors($ignoreConflictErrors)
    {
        $this->ignoreConflictErrors = (bool)$ignoreConflictErrors;
        return $this;
    }






    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function onConflict($src, $target, &$errMsg, $callback, $type)
    {
        if ('onFileConflict' === $callback) {
            if (is_file($target)) {
                copy($src, $target);
                $errMsg = null;
            }
        }
        if (true === $this->ignoreConflictErrors) {
            $errMsg = null;
        }
        parent::onConflict($src, $target, $errMsg, $callback, $type);
    }

    protected function _onCopyAfter($src, $target)
    {
        if (is_link($src) && false === is_file($src) && false === is_dir($src)) {
            // broken link case, we don't need to chmod it
        }
        else {
            if (true === $this->applyPerms) {
                $octal = substr(sprintf('%o', fileperms($src)), -4);
                if (false === chmod($target, octdec($octal))) {
                    $this->error("Cannot chmod $target with perms $octal");
                }
            }
            if (true === $this->applyOwner) {
                if (false !== ($owner = fileowner($src))) {
                    if (false !== ($ownerGroup = filegroup($src))) {
                        if (false === chown($target, $owner)) {
                            if (true === extension_loaded('posix')) {
                                $owner = posix_getpwuid($owner)['name'];
                            }
                            $this->error("Could not chown for $target with owner=$owner");
                        }
                        if (false === chgrp($target, $ownerGroup)) {
                            if (true === extension_loaded('posix')) {
                                $ownerGroup = posix_getgrgid($ownerGroup)['name'];
                            }
                            $this->error("Could not chgrp for $target with owner=$ownerGroup");
                        }

                    }
                    else {
                        $this->error("Couldn't access group owner information for $src");
                    }
                }
                else {
                    $this->error("Couldn't access file owner information for $src");
                }
            }
        }
        parent::_onCopyAfter($src, $target);
    }


}
