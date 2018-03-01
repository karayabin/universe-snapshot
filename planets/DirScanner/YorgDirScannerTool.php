<?php


namespace DirScanner;

use Bat\FileSystemTool;


/**
 * YorgDirScannerTool
 * @author Lingtalfi
 * 2016-01-09
 *
 */
class YorgDirScannerTool
{


    /**
     * Return the list of directories of a given folder.
     *
     *
     * @param $dir
     * @param bool $recursive
     * @param bool $relativePath , whether or not to return the results as relative path (default is absolute paths)
     * @param bool $followSymlinks
     * @param bool $ignoreHidden
     * @return array
     *
     */
    public static function getDirs($dir, $recursive = false, $relativePath = false, $followSymlinks = false, $ignoreHidden = true)
    {
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level) use ($relativePath, $recursive, $ignoreHidden) {
            if (0 === $level || true === $recursive) {
                if (is_dir($path)) {
                    if (true === $ignoreHidden && 0 === strpos($rPath, '.')) {
                        return null;
                    }
                    if (true === $relativePath) {
                        return $rPath;
                    }
                    return $path;
                }
            }
        });
    }


    /**
     * Return the list of entries (files or dirs) of a given folder.
     *
     *
     * @param $dir
     * @param bool $recursive
     * @param bool $relativePath , whether or not to return the results as relative path (default is absolute paths)
     * @param bool $followSymlinks
     * @param bool $ignoreHidden
     * @return array
     *
     */
    public static function getEntries($dir, $recursive = false, $relativePath = false, $followSymlinks = false, $ignoreHidden = true)
    {
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level) use ($relativePath, $recursive, $ignoreHidden) {
            if (0 === $level || true === $recursive) {
                if (true === $ignoreHidden && 0 === strpos($rPath, '.')) {
                    return null;
                }
                if (true === $relativePath) {
                    return $rPath;
                }
                return $path;
            }
        });
    }

    /**
     * Return the list of files (not dirs) of a given folder.
     *
     *
     * @param $dir
     * @param bool $recursive
     * @param bool $relativePath , whether or not to return the results as relative path (default is absolute paths)
     * @param bool $followSymlinks
     * @param bool $ignoreHidden
     * @return array
     *
     */
    public static function getFiles($dir, $recursive = false, $relativePath = false, $followSymlinks = false, $ignoreHidden = true)
    {
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level) use ($relativePath, $recursive, $ignoreHidden) {
            if (0 === $level || true === $recursive) {
                if (is_file($path)) {
                    if (true === $ignoreHidden && 0 === strpos($rPath, '.')) {
                        return null;
                    }
                    if (true === $relativePath) {
                        return $rPath;
                    }
                    return $path;
                }
            }
        });
    }

    /**
     * Return the list of files (not dirs) of a given folder.
     *
     *
     * @param $dir
     * @param bool $recursive
     * @param string|array|null $extension , the allowed extensions;
     *                                          if null, all extensions are allowed (enhances the tool modularity)
     *
     * @param bool $extensionCaseSensitive , whether or not to use case sensitive comparisons for the file extensions
     * @param bool $relativePath , whether or not to return the results as relative path (default is absolute paths)
     * @param bool $followSymlinks
     * @param bool $ignoreHidden
     * @return array
     *
     */
    public static function getFilesWithExtension($dir, $extension = null, $extensionCaseSensitive = false, $recursive = false, $relativePath = false, $followSymlinks = false, $ignoreHidden = true)
    {
        if (is_string($extension)) {
            $extension = [$extension];
        }
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level) use ($relativePath, $recursive, $ignoreHidden, $extension, $extensionCaseSensitive) {
            if (0 === $level || true === $recursive) {
                if (is_file($path)) {
                    if (true === $ignoreHidden && 0 === strpos($rPath, '.')) {
                        return null;
                    }



                    //--------------------------------------------
                    // EXTENSION MATCH?
                    //--------------------------------------------
                    if (null !== $extension) {
                        $searchPath = $path;
                        if (false === $extensionCaseSensitive) {
                            $searchPath = strtolower($searchPath);
                        }
                        $match = false;
                        foreach ($extension as $_extension) {
                            if (false === $extensionCaseSensitive) {
                                $_extension = strtolower($_extension);
                            }
                            if ($_extension === substr($searchPath, -1 * (strlen($_extension)))) {
                                $match = true;
                            }
                        }
                        if (false === $match) {
                            return null;
                        }
                    }


                    if (true === $relativePath) {
                        return $rPath;
                    }
                    return $path;
                }
            }
        });
    }
}
