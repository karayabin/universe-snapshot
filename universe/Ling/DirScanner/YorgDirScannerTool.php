<?php


namespace Ling\DirScanner;


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
     * @param string $dir
     * @param bool $recursive = false
     *
     * @param bool $relativePath = false
     * whether to return the results as relative path or absolute paths (default).
     *
     * @param bool $followSymlinks = false
     *
     * @param bool $ignoreHidden = true
     * Whether to ignore files/directories which name starts with a dot (.).
     * If a directory is ignored, its content is ignored recursively.
     * @return array
     *
     */
    public static function getDirs(string $dir, bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, bool $ignoreHidden = true): array
    {
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($relativePath, $recursive, $ignoreHidden) {
            if (0 === $level || true === $recursive) {
                if (is_dir($path)) {

                    $baseName = basename($rPath);
                    if (true === $ignoreHidden && 0 === strpos($baseName, '.')) {
                        $skipDir = true;
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
     * @param string $dir
     * @param bool $recursive = false
     *
     * @param bool $relativePath = false
     * whether to return the results as relative path or absolute paths (default).
     *
     * @param bool $followSymlinks = false
     * @param bool $ignoreHidden = true
     * Whether to ignore files/directories which name starts with a dot (.).
     * If a directory is ignored, its content is ignored recursively.
     * @return array
     *
     */
    public static function getEntries(string $dir, bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, bool $ignoreHidden = true): array
    {
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($relativePath, $recursive, $ignoreHidden) {
            if (0 === $level || true === $recursive) {


                $baseName = basename($rPath);
                if (true === $ignoreHidden && 0 === strpos($baseName, '.')) {
                    $skipDir = true;
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
     * @param string $dir
     * @param bool $recursive
     * @param bool $relativePath = false
     * whether to return the results as relative path or absolute paths (default).
     *
     * @param bool $followSymlinks = false
     *
     * @param bool $ignoreHidden = true
     * Whether to ignore files/directories which name starts with a dot (.).
     * If a directory is ignored, its content is ignored recursively.
     * @return array
     *
     */
    public static function getFiles(string $dir, bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, bool $ignoreHidden = true): array
    {
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($relativePath, $recursive, $ignoreHidden) {
            if (0 === $level || true === $recursive) {


                $fileName = basename($rPath);
                if (true === $ignoreHidden && 0 === strpos($fileName, '.')) {
                    $skipDir = true;
                    return null;
                }

                if (is_file($path)) {
                    if (true === $relativePath) {
                        return $rPath;
                    }
                    return $path;
                }
            }
        });
    }


    /**
     * Returns the list of files (not dirs) which name aren't in the $ignore array.
     *
     *
     *
     *
     * @param string $dir
     * The directory to parse.
     *
     * @param array $ignore
     * An array of file/dir names to ignore.
     * If the entry is a directory, the directory's content will be ignored recursively.
     * If the entry is a file, the file will be ignored.
     *
     * @param bool $recursive = false
     * Whether to scan the directory recursively.
     * If not, only the direct children of the $dir will be scanned.
     *
     *
     * @param bool $relativePath = false
     * Whether to return absolute paths (by default), or relative paths.
     *
     * @param bool $followSymlinks = false
     * Whether to follow symlinks (directories).
     *
     * @param bool $ignoreHidden = false
     * Whether to ignore files/directories which name starts with a dot (.).
     * If a directory is ignored, its content is ignored recursively.
     *
     *
     * @return array
     */
    public static function getFilesIgnore(string $dir, array $ignore = [], bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, bool $ignoreHidden = false): array
    {
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($relativePath, $recursive, $ignore, $ignoreHidden) {
            if (0 === $level || true === $recursive) {
                $baseName = basename($rPath);

                if (true === $ignoreHidden && 0 === strpos($baseName, '.')) {
                    $skipDir = true;
                    return null;
                }


                if (in_array($baseName, $ignore)) {
                    $skipDir = true;
                    return null;
                }

                if (is_file($path)) {
                    if (true === $relativePath) {
                        return $rPath;
                    }
                    return $path;
                }
            }
        });
    }


    /**
     *
     * Returns the list of files which name start with the given $prefix.
     *
     * @param string $dir
     * @param string $prefix
     * @param bool $recursive = false
     * @param bool $relativePath = false
     * Whether to return absolute paths (by default), or relative paths.
     * @param bool $followSymlinks = false
     *
     * @param bool $ignoreHidden = true
     * Whether to ignore files/directories which name starts with a dot (.).
     * If a directory is ignored, its content is ignored recursively.
     *
     * @return array
     */
    public static function getFilesWithPrefix(string $dir, string $prefix, bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, bool $ignoreHidden = true): array
    {
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($prefix, $relativePath, $recursive, $ignoreHidden) {
            if (0 === $level || true === $recursive) {


                $baseName = basename($rPath);
                if (true === $ignoreHidden && 0 === strpos($baseName, '.')) {
                    $skipDir = true;
                    return null;
                }


                if (is_file($path)) {

                    if (0 !== strpos($baseName, $prefix)) {
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
     * Return the list of files (not dirs) having the given $extension(s).
     *
     *
     * @param string $dir
     * @param bool $recursive = false
     * @param string|array|null $extension
     * The allowed extensions.
     * If null, all extensions are allowed.
     *
     * @param bool $extensionCaseSensitive = false
     * Whether or not to use case sensitive comparisons for the file extensions.
     *
     * @param bool $relativePath = false
     * Whether to return absolute paths (by default), or relative paths.
     *
     * @param bool $followSymlinks = false
     *
     * @param bool $ignoreHidden = true
     * Whether to ignore files/directories which name starts with a dot (.).
     * If a directory is ignored, its content is ignored recursively.
     * @return array
     *
     */
    public static function getFilesWithExtension(string $dir, $extension = null, bool $extensionCaseSensitive = false, bool $recursive = false,
                                                 bool $relativePath = false, bool $followSymlinks = false, bool $ignoreHidden = true): array
    {
        if (is_string($extension)) {
            $extension = [$extension];
        }
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($relativePath, $recursive, $ignoreHidden, $extension, $extensionCaseSensitive) {
            if (0 === $level || true === $recursive) {

                $fileName = basename($rPath);
                if (true === $ignoreHidden && 0 === strpos($fileName, '.')) {
                    $skipDir = true;
                    return null;
                }


                if (is_file($path)) {


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
