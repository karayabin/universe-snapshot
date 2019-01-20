<?php

namespace CopyDir;

/*
 * LingTalfi 2015-10-19
 */
use CopyDir\Exception\CopyDirException;

class CopyDirUtil
{

    /**
     * @var bool: if true, throws an exception if anything goes wrong
     *            if false (default), put errors in the errors array
     */
    private $strictMode;
    private $errors;
    private $followFileLinks;
    private $followDirLinks;

    /**
     *    void      f (  str:src,  str:target,  &str:errMsg )
     *
     * This callback is called whenever we try to make a copy of a dir to an already existing
     * entry which is either a file or a broken link.
     *
     * The default behaviour, if the callback is not defined (or do nothing) is to skip the copying of the
     * directory and to add an error message indicating that an entry with the same name already existed.
     *
     * The callback has the opportunity to change this behaviour by changing the errMsg that will be produced,
     * and/or by removing the existing entry and create a valid directory instead.
     * Once the callback has been executed, the class will re-check whether or not a directory exist,
     * and will use the new directory if found.
     *
     * If the directory has been recreated, the errMsg should be the empty string.
     *
     *
     */
    private $onDirConflict;

    /**
     * Same mechanism as onDirConflict, except that the target can be any type of file (file, symlink, dir).
     * And also, there is no double checking that the file exists after the callback is called, the class
     * just cares about the errMsg which can be either non empty or empty.
     */
    private $onFileConflict;
    private $onFileLinkConflict;
    private $onDirLinkConflict;
    private $onBrokenLinkConflict;

    /**
     * void     f ( str:baseName, str:src, str:target, bool:&continue=true )
     *
     * This callback is triggered before directory entries are processed.
     * It was originally designed to serve as a pre-filter (to filter out undesirable entries).
     *
     * If the callback sets the continue flag to false, the entry will be skip.
     *
     *
     */
    private $onCopyBefore;
    /**
     * void     f ( str:src, str:target )
     *
     * This callback is triggered:
     * - every time a src directory is mapped to a target directory
     * - every time a try to copy a src directory entry into its target correspondent is done
     *
     * This callback was originally designed to allow post chmoding of the target entries.
     *
     */
    private $onCopyAfter;

    public function __construct()
    {
        $this->strictMode = false;
        $this->errors = [];
        $this->followFileLinks = false;
        $this->followDirLinks = false;
        $this->onDirConflict = false;
        $this->onFileConflict = false;
        $this->onFileLinkConflict = false;
        $this->onDirLinkConflict = false;
        $this->onBrokenLinkConflict = false;
        $this->onCopyBefore = false;
        $this->onCopyAfter = false;
    }


    public static function create()
    {
        return new static();
    }


    /**
     * Copies/maps src to target.
     *
     * @return true if no error occurred, false otherwise,
     *              or throws an exception if an error occurs and strict mode is on (strict mode is on by default).
     * @throws CopyDirException
     */
    public function copyDir($src, $target)
    {
        if (2 === func_num_args()) {
            $this->errors = [];
        }

        if (is_dir($src)) {
            if (is_readable($src)) {

                $cleanTarget = true;
                // case where the target is a file or a broken link (it's supposed to be either a file or not exist)
                if (
                    is_file($target) ||
                    (is_link($target) && (false === is_file($target) && false === is_dir($target)))
                ) {
                    $errMsg = "Cannot create dir $target, because an entry (of type file or broken link) with the same name was already found";
                    if (is_callable($this->onDirConflict)) {
                        call_user_func_array($this->onDirConflict, [$src, $target, &$errMsg]);
                    }
                    clearstatcache(); // not sure if needed for is_dir($target) call, so in doubt...
                    if (!is_dir($target)) {
                        $cleanTarget = false;
                    }
                    if ($errMsg) {
                        $this->error($errMsg);
                    }
                }


                if (true === $cleanTarget) {

                    $targetIsDir = true;
                    if (!is_dir($target)) {
                        if (false === mkdir($target, 0777, true)) {
                            $this->error("Couldn't create the target dir: $target");
                            $targetIsDir = false;
                        }
                    }
                    if (true === $targetIsDir) {

                        $this->_onCopyAfter($src, $target);


                        if (is_writable($target)) {
                            $files = scandir($src);
                            foreach ($files as $baseName) {
                                if ('.' !== $baseName && '..' !== $baseName) {


                                    $file = $src . '/' . $baseName;
                                    $targetFile = $target . '/' . $baseName;


                                    $continue = true;
                                    if (is_callable($this->onCopyBefore)) {
                                        call_user_func_array($this->onCopyBefore, [$baseName, $file, $targetFile, &$continue]);
                                    }


                                    if (true === $continue) {

                                        $isProcessedAsLink = false;
                                        if (is_link($file)) {
                                            if (is_file($file)) {
                                                if (false === $this->followFileLinks) {
                                                    $isProcessedAsLink = true;
                                                    $this->copyFileLink($file, $targetFile);
                                                }
                                            }
                                            elseif (is_dir($file)) {
                                                if (false === $this->followDirLinks) {
                                                    $isProcessedAsLink = true;
                                                    $this->copyDirLink($file, $targetFile);
                                                }
                                            }
                                            else {
                                                // broken link
                                                $isProcessedAsLink = true;
                                                $this->copyBrokenLink($file, $targetFile);
                                            }
                                        }


                                        if (false === $isProcessedAsLink) {
                                            if (is_file($file)) {
                                                $this->copyFile($file, $targetFile);
                                            }
                                            elseif (is_dir($file)) {
                                                $this->copyDir($file, $targetFile, true);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        else {
                            $this->error("Target dir must be writable: $target");
                        }
                    }
                }
            }
            else {
                $this->error("src is not readable: $src");
            }
        }
        else {
            $this->error("src is not a dir: $src");
        }


        // handling errors
        if (true === $this->strictMode && $this->errors) {
            $m = 'The following errors have occurred: ' . implode(', ', $this->errors);
            $e = new CopyDirException($m);
            $e->errorArray = $this->errors;
            throw $e;
        }
        return (0 === count($this->errors));
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setStrictMode($strictMode)
    {
        $this->strictMode = (bool)$strictMode;
        return $this;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function setFollowDirLinks($followDirLinks)
    {
        $this->followDirLinks = (bool)$followDirLinks;
        return $this;
    }

    public function setFollowFileLinks($followFileLinks)
    {
        $this->followFileLinks = (bool)$followFileLinks;
        return $this;
    }

    public function setOnBrokenLinkConflict($onBrokenLinkConflict)
    {
        $this->onBrokenLinkConflict = $onBrokenLinkConflict;
        return $this;
    }

    public function setOnCopyAfter($onCopyAfter)
    {
        $this->onCopyAfter = $onCopyAfter;
        return $this;
    }

    public function setOnCopyBefore($onCopyBefore)
    {
        $this->onCopyBefore = $onCopyBefore;
        return $this;
    }

    public function setOnDirConflict($onDirConflict)
    {
        $this->onDirConflict = $onDirConflict;
        return $this;
    }

    public function setOnDirLinkConflict($onDirLinkConflict)
    {
        $this->onDirLinkConflict = $onDirLinkConflict;
        return $this;
    }

    public function setOnFileConflict($onFileConflict)
    {
        $this->onFileConflict = $onFileConflict;
        return $this;
    }

    public function setOnFileLinkConflict($onFileLinkConflict)
    {
        $this->onFileLinkConflict = $onFileLinkConflict;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function copyFile($src, $target)
    {
        $this->copyThing($src, $target, "file", "onFileConflict");
    }

    private function copyFileLink($src, $target)
    {
        $this->copyThing($src, $target, "file link", "onFileLinkConflict");
    }

    private function copyDirLink($src, $target)
    {
        $this->copyThing($src, $target, "dir link", "onDirLinkConflict");
    }

    private function copyBrokenLink($src, $target)
    {
        $this->copyThing($src, $target, "broken link", "onBrokenLinkConflict");
    }


    private function copyThing($src, $target, $type, $callback)
    {
        if (!file_exists($target) && !is_link($target)) {
            switch ($type) {
                case 'dir link':
                case 'file link':
                case 'broken link':
                    $link = readlink($src);
                    if (false === symlink($link, $target)) {
                        $this->error("Could not copy $type $src to $target");
                    }
                    break;
                default:
                    if (false === copy($src, $target)) {
                        $this->error("Could not copy $type $src to $target");
                    }
                    break;
            }
        }
        else {
            $errMsg = "Couldn't create $type $target, because an entry with the same name already existed";
            $this->onConflict($src, $target, $errMsg, $callback, $type);
            if ($errMsg) {
                $this->error($errMsg);
            }
        }
        $this->_onCopyAfter($src, $target);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function onConflict($src, $target, &$errMsg, $callback, $type)
    {
        if (is_callable($this->$callback)) {
            call_user_func_array($this->$callback, [$src, $target, &$errMsg]);
        }
    }


    protected function _onCopyAfter($src, $target)
    {
        if (is_callable($this->onCopyAfter)) {
            call_user_func($this->onCopyAfter, $src, $target);
        }
    }

    protected function error($m)
    {
        $this->errors[] = $m;
    }
}
