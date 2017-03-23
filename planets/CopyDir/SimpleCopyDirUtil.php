<?php

namespace CopyDir;

/*
 * Features:
 *
 * - on file conflict: overwrite or ignore
 * 
 */

class SimpleCopyDirUtil extends CopyDirUtil
{

    /**
     * @var bool, if true, on file conflict will overwrite the file,
     * else if false (and on file conflict) will ignore the file.
     */
    private $replaceMode;

    public function __construct()
    {
        parent::__construct();
        $this->replaceMode = true;
    }

    public function setReplaceMode($replaceMode)
    {
        $this->replaceMode = (bool)$replaceMode;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function onConflict($src, $target, &$errMsg, $callback, $type)
    {
        if ('onFileConflict' === $callback) {
            if (is_file($target)) {
                if (true === $this->replaceMode) {
                    copy($src, $target);
                }
            }
        }
        $errMsg = null; // ignore all conflicts
        parent::onConflict($src, $target, $errMsg, $callback, $type);
    }
}
