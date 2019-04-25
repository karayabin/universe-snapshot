<?php


namespace Ling\HashMap\Util;


use Ling\Bat\FileSystemTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\HashMap\Exception\HashMapException;

/**
 * The HashMapUtil class.
 *
 * This class helps creating a hash map.
 *
 *
 * Hash map
 * ------------
 * A hash map is a file containing a list of relative file names along with their hash identifier.
 * Each line contains the following format:
 *
 * ```txt
 * $relative_path::$file_id
 * ```
 *
 * Where $relative_path is the relative path of the file (relative to the root dir),
 * and $file_id is some kind of hash (a unique identifier) for the file.
 *
 *
 *
 * How to use
 * -------------
 *
 * This util has basically two modes:
 *
 * - either you specify the root dir without paths, in which case all files inside the root dir will be added recursively to the map
 * - or you specify the root dir AND some paths, in which case only the files indicated by the paths are added to the map.
 *      Note: a path can also point to a directory, in which case the directory and its content are added recursively to the map.
 *
 *
 *
 */
class HashMapUtil
{


    /**
     * This property holds the rootDir for this instance.
     * @var string
     */
    protected $rootDir;

    /**
     * This property holds the paths for this instance.
     * It's an array of relative paths (relative to the root dir).
     * If this array is empty, then all files of the root dir are added recursively.
     * Otherwise, only the paths are used.
     *
     * @var array
     */
    protected $paths;

    /**
     * This property holds the ignoreNames for this instance.
     * An array of entry name to ignore.
     * If the entry is a directory, it will be ignored recursively.
     *
     * @var array
     */
    protected $ignoreNames;

    /**
     * This property holds the ignorePaths for this instance.
     * An array of relative paths to ignore (relative to the root dir).
     * If the entry is a directory, it will be ignored recursively.
     * @var array
     */
    protected $ignorePaths;

    /**
     * This property holds the ignoreHidden for this instance.
     * An int representing which files/dirs to ignore.
     *
     * - 0: do not ignore anything
     * - 1: ignore hidden dirs (dirs which name start with a dot)
     * - 2: ignore hidden dirs and hidden files (files which name start with a dot)
     *
     *
     * @var int = 1
     */
    protected $ignoreHidden;


    /**
     * Builds the HashMapUtil instance.
     */
    public function __construct()
    {
        $this->rootDir = null;
        $this->paths = [];
        $this->ignoreNames = [];
        $this->ignorePaths = [];
        $this->ignoreHidden = 1;
    }

    /**
     * Sets the rootDir.
     *
     * @param string $rootDir
     * @return $this
     */
    public function setRootDir(string $rootDir)
    {
        $this->rootDir = $rootDir;
        return $this;
    }

    /**
     * Sets the paths.
     *
     * @param array $paths
     * @return $this
     */
    public function setPaths(array $paths)
    {
        $this->paths = $paths;
        return $this;
    }

    /**
     * Sets the ignoreNames.
     *
     * @param array $ignoreNames
     * @return $this
     */
    public function setIgnoreNames(array $ignoreNames)
    {
        $this->ignoreNames = $ignoreNames;
        return $this;
    }

    /**
     * Sets the ignorePaths.
     *
     * @param array $ignorePaths
     * @return $this
     */
    public function setIgnorePaths(array $ignorePaths)
    {
        $this->ignorePaths = $ignorePaths;
        return $this;
    }

    /**
     * Sets the ignoreHidden.
     *
     * @param int $ignoreHidden
     * @return $this
     */
    public function setIgnoreHidden(int $ignoreHidden)
    {
        $this->ignoreHidden = $ignoreHidden;
        return $this;
    }


    /**
     * Creates the map in the given $mapFile, and returns whether the operation was successful.
     *
     * @param string $mapFile
     * @return bool
     * @throws HashMapException
     */
    public function createMap(string $mapFile)
    {
        if (is_dir($this->rootDir)) {


            //--------------------------------------------
            // mode with paths
            //--------------------------------------------
            if ($this->paths) {
                $files = [];
                foreach ($this->paths as $rpath) {
                    $apath = $this->rootDir . "/" . $rpath;
                    if (is_file($apath)) {
                        $files[] = $rpath;
                    } elseif (is_dir($apath)) {
                        $allFiles = YorgDirScannerTool::getFilesIgnoreMore($apath, $this->ignoreNames, $this->ignorePaths, true, true, false, $this->ignoreHidden);
                        $files = array_merge($files, array_map(function($rfile) use($rpath){
                            return $rpath . "/" . $rfile;
                        }, $allFiles));
                    }
                }
                $files = array_unique($files);
            }
            //--------------------------------------------
            // mode without paths
            //--------------------------------------------
            else {
                $files = YorgDirScannerTool::getFilesIgnoreMore($this->rootDir, $this->ignoreNames, $this->ignorePaths, true, true, false, $this->ignoreHidden);
            }


            //--------------------------------------------
            // creating the map
            //--------------------------------------------
            $heavyExtensions = ["mp4"];
            foreach ($files as $file) {
                $baseName = basename($file);
                $lastPos = strrpos($baseName, '.');
                $absFile = $this->rootDir . "/" . $file;
                if (false !== $lastPos) {
                    $ext = strtolower(substr($baseName, $lastPos + 1));
                    if (false === in_array($ext, $heavyExtensions, true)) {
                        $lines[] = $file . '::' . hash_file("haval160,4", $absFile);
                    } else {
                        $size = filesize($absFile);
                        $lines[] = $file . ' : ' . $size;
                    }
                } else {
                    $lines[] = $file . '::' . hash_file("haval160,4", $absFile);
                }
            }
            return FileSystemTool::mkfile($mapFile, implode(PHP_EOL, $lines));
        } else {
            throw new HashMapException("Dir not found: $this->rootDir.");
        }
    }
}