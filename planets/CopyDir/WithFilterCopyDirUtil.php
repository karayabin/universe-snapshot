<?php

namespace CopyDir;

/*
 * Features:
 *
 * - can filter directories
 * 
 */
class WithFilterCopyDirUtil extends SimpleCopyDirUtil
{

    /**
     * bool fn ( baseName, file, targetFile )
     * - baseName: base name of the entry
     * - file: absolute path to the source entry
     * - targetFile: absolute path to the target entry
     */
    private $filter;


    public function setFilter(callable $filter)
    {
        $this->filter = $filter;
        $this->setOnCopyBefore(function ($baseName, $file, $targetFile, &$continue) use ($filter) {
            $continue = call_user_func($filter, $baseName, $file, $targetFile);
        });
        return $this;
    }
}
