<?php


namespace Ling\FileDeletor;


class FileDeletor
{

    protected $prefix;
    /**
     * @var bool=false, whether or not to follow symlinks dirs
     */
    protected $followSymlinks;

    public function __construct()
    {
        $this->prefix = "";
        $this->followSymlinks = false;
    }


    public static function create()
    {
        return new static();
    }

    /**
     * @param array $entries , an array of entries to delete.
     * Each entry can use the wildcard (*).
     *
     * Example:
     *
     * $entriesToDelete = [
     *      "cache/derby/cache/Ekom",
     *      "cache/derby/cache/Ekom.*",
     *      "cache/derby/cache/Module.Ekom.*",
     *      "cache/derby/related/Ekom",
     * ];
     *
     *
     * @param $nbDeleted , the number of deleted entries.
     *              If the entry contains a wildcard, every deleted file will count
     *
     * @param $nbNotDeleted , the number of not deleted entries (perm error for instance).
     *              If the entry contains a wildcard, every not deleted file will count
     *
     */
    public function deleteEntries(array $entries, &$nbDeleted = 0, &$nbNotDeleted = 0)
    {
        $realFiles = []; // resolving wildcards
        foreach ($entries as $entry) {
            $realEntry = $this->prefix . $entry;
            if (false === strpos($realEntry, '*')) {
                $realFiles[] = $realEntry;
            } else {
                foreach (glob($realEntry) as $file) {
                    $realFiles[] = $file;
                }
            }
        }


        //--------------------------------------------
        // REMOVING FILES
        //--------------------------------------------
        foreach ($realFiles as $file) {
            self::_remove($file, $nbDeleted, $nbNotDeleted);
        }
    }

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function _remove($file, &$nbDeleted = 0, &$nbNotDeleted = 0)
    {
        if (is_dir($file)) {
            if (is_link($file)) {
                if (false === $this->followSymlinks) {
                    return false;
                }
            }
            if (is_readable($file)) {
                $files = new \FilesystemIterator($file,
                    \FilesystemIterator::KEY_AS_PATHNAME |
                    \FilesystemIterator::CURRENT_AS_FILEINFO |
                    \FilesystemIterator::SKIP_DOTS
                );
                foreach ($files as $f) {
                    self::_remove($f, $nbDeleted, $nbNotDeleted);
                }
                if (false === rmdir($file)) {
                    $nbNotDeleted++;
                } else {
                    $nbDeleted++;
                }
            } else {
                $nbNotDeleted++;
            }
        } elseif (is_file($file)) {
            if (true === @unlink($file)) {
                $nbDeleted++;
            } else {
                $nbNotDeleted++;
            }
        }
    }
}