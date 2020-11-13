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
     * @param int $ignoreHidden = 1
     * Do we ignore entries starting with a dot (.)?
     * - 0: do not ignore hidden entries
     * - 1: ignore hidden directories
     * - 2: ignore hidden directories and files
     *
     * If a directory is ignored, its content is ignored recursively.
     *
     * @return array
     *
     */
    public static function getDirs(string $dir, bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1): array
    {
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($relativePath, $recursive, $ignoreHidden) {
            if (0 === $level || true === $recursive) {
                if (is_dir($path)) {

                    $baseName = basename($rPath);
                    if (1 === $ignoreHidden && 0 === strpos($baseName, '.')) {
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
     *
     * @param int $ignoreHidden = 1
     * Do we ignore entries starting with a dot (.)?
     * - 0: do not ignore hidden entries
     * - 1: ignore hidden directories
     * - 2: ignore hidden directories and files
     *
     * If a directory is ignored, its content is ignored recursively.
     *
     * @return array
     *
     */
    public static function getEntries(string $dir, bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1): array
    {
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($relativePath, $recursive, $ignoreHidden) {
            if (0 === $level || true === $recursive) {


                $baseName = basename($rPath);
                if ($ignoreHidden > 0 && 0 === strpos($baseName, '.')) {
                    if (
                        is_dir($path) ||
                        (is_file($path) && 2 === $ignoreHidden)
                    ) {
                        $skipDir = true;
                        return null;
                    }
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
     *
     * @param int $ignoreHidden = 1
     * Do we ignore entries starting with a dot (.)?
     * - 0: do not ignore hidden entries
     * - 1: ignore hidden directories
     * - 2: ignore hidden directories and files
     *
     * If a directory is ignored, its content is ignored recursively.
     *
     * @return array
     *
     */
    public static function getFiles(string $dir, bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1): array
    {
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($relativePath, $recursive, $ignoreHidden) {
            if (0 === $level || true === $recursive) {


                $fileName = basename($rPath);
                if ($ignoreHidden > 0 && 0 === strpos($fileName, '.')) {
                    if (
                        is_dir($path) ||
                        (is_file($path) && 2 === $ignoreHidden)
                    ) {
                        $skipDir = true;
                        return null;
                    }
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
     * @param int $ignoreHidden = 1
     * Do we ignore entries starting with a dot (.)?
     * - 0: do not ignore hidden entries
     * - 1: ignore hidden directories
     * - 2: ignore hidden directories and files
     *
     * If a directory is ignored, its content is ignored recursively.
     *
     *
     * @return array
     */
    public static function getFilesIgnore(string $dir, array $ignore = [], bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1): array
    {
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($relativePath, $recursive, $ignore, $ignoreHidden) {
            if (0 === $level || true === $recursive) {
                $baseName = basename($rPath);

                if ($ignoreHidden > 0 && 0 === strpos($baseName, '.')) {
                    if (
                        is_dir($path) ||
                        (is_file($path) && 2 === $ignoreHidden)
                    ) {
                        $skipDir = true;
                        return null;
                    }
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
     * Same as getFilesIgnore, but also allows to ignore files by relative paths.
     *
     * So for instance, if you want to ignore the img dir but only /www/site1/img and not /www/site2/img, you can.
     *
     *
     *
     *
     * @param string $dir
     * @param array $ignoreNames
     * Array of file/directory names to ignore.
     * If the entry is a directory, the directory's content will be ignored recursively.
     *
     *
     * @param array $ignorePaths
     * Array of relative paths to ignore.
     * If the entry is a directory, the directory's content will be ignored recursively.
     * Note: a relative path doesn't start with slash.
     *
     * @param bool $recursive = false
     * @param bool $relativePath = false
     * @param bool $followSymlinks = false
     *
     * @param int $ignoreHidden = 1
     * Do we ignore entries starting with a dot (.)?
     * - 0: do not ignore hidden entries
     * - 1: ignore hidden directories
     * - 2: ignore hidden directories and files
     *
     * If a directory is ignored, its content is ignored recursively.
     *
     * @return array
     */
    public static function getFilesIgnoreMore(string $dir, array $ignoreNames = [], $ignorePaths = [], bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1): array
    {
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($relativePath, $recursive, $ignoreNames, $ignorePaths, $ignoreHidden) {
            if (0 === $level || true === $recursive) {
                $baseName = basename($rPath);

                if ($ignoreHidden > 0 && 0 === strpos($baseName, '.')) {
                    if (
                        is_dir($path) ||
                        (is_file($path) && 2 === $ignoreHidden)
                    ) {
                        $skipDir = true;
                        return null;
                    }
                }


                if (in_array($baseName, $ignoreNames)) {
                    $skipDir = true;
                    return null;
                }

                if (in_array($rPath, $ignorePaths)) {
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
     * @param int $ignoreHidden = 1
     * Do we ignore entries starting with a dot (.)?
     * - 0: do not ignore hidden entries
     * - 1: ignore hidden directories
     * - 2: ignore hidden directories and files
     *
     * If a directory is ignored, its content is ignored recursively.
     *
     * @return array
     */
    public static function getFilesWithPrefix(string $dir, string $prefix, bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1): array
    {
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($prefix, $relativePath, $recursive, $ignoreHidden) {
            if (0 === $level || true === $recursive) {


                $baseName = basename($rPath);
                if ($ignoreHidden > 0 && 0 === strpos($baseName, '.')) {
                    if (
                        is_dir($path) ||
                        (is_file($path) && 2 === $ignoreHidden)
                    ) {
                        $skipDir = true;
                        return null;
                    }
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
     * @param int $ignoreHidden = 1
     * Do we ignore entries starting with a dot (.)?
     * - 0: do not ignore hidden entries
     * - 1: ignore hidden directories
     * - 2: ignore hidden directories and files
     *
     * If a directory is ignored, its content is ignored recursively.
     *
     * @return array
     *
     */
    public static function getFilesWithExtension(string $dir, $extension = null, bool $extensionCaseSensitive = false, bool $recursive = false,
                                                 bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1): array
    {
        if (is_string($extension)) {
            $extension = [$extension];
        }
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($relativePath, $recursive, $ignoreHidden, $extension, $extensionCaseSensitive) {
            if (0 === $level || true === $recursive) {

                $fileName = basename($rPath);
                if ($ignoreHidden > 0 && 0 === strpos($fileName, '.')) {
                    if (
                        is_dir($path) ||
                        (is_file($path) && 2 === $ignoreHidden)
                    ) {
                        $skipDir = true;
                        return null;
                    }
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


    /**
     * Return the list of files (not dirs) NOT ending with the given $extension(s).
     *
     *
     * @param string $dir
     * @param bool $recursive = false
     * @param string|array $extension
     * The extensions to exclude.
     *
     * @param bool $extensionCaseSensitive = false
     * Whether or not to use case sensitive comparisons for the file extensions.
     *
     * @param bool $relativePath = false
     * Whether to return absolute paths (by default), or relative paths.
     *
     * @param bool $followSymlinks = false
     *
     * @param int $ignoreHidden = 1
     * Do we ignore entries starting with a dot (.)?
     * - 0: do not ignore hidden entries
     * - 1: ignore hidden directories
     * - 2: ignore hidden directories and files
     *
     * If a directory is ignored, its content is ignored recursively.
     *
     * @return array
     *
     */
    public static function getFilesWithoutExtension(string $dir, $extension, bool $extensionCaseSensitive = false, bool $recursive = false,
                                                    bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1): array
    {
        if (is_string($extension)) {
            $extension = [$extension];
        }
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($relativePath, $recursive, $ignoreHidden, $extension, $extensionCaseSensitive) {
            if (0 === $level || true === $recursive) {

                $fileName = basename($rPath);
                if ($ignoreHidden > 0 && 0 === strpos($fileName, '.')) {
                    if (
                        is_dir($path) ||
                        (is_file($path) && 2 === $ignoreHidden)
                    ) {
                        $skipDir = true;
                        return null;
                    }
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
                        if (true === $match) {
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


    /**
     * Return the list of files (not dirs) which matches the given $name(s).
     *
     * The matching uses the fnmatch function under the hood (https://www.php.net/manual/en/function.fnmatch.php).
     *
     * The matching is done against the file base names (i.e. the filename and the extension)
     *
     *
     * Examples of pattern you can use as the name:
     *
     * - *gr[ae]y.byml
     *
     *
     * The pattern above will match both:
     *
     * - redgray.byml
     * - grey.byml
     *
     * but not:
     *
     * - gray
     * - red.byml
     *
     *
     *
     *
     *
     * @param string $dir
     * @param bool $recursive = false
     * @param string|array $name
     * The allowed names.
     *
     * @param bool $extensionCaseSensitive = false
     * Whether or not to use case sensitive comparisons for the file name.
     *
     * @param bool $relativePath = false
     * Whether to return absolute paths (by default), or relative paths.
     *
     * @param bool $followSymlinks = false
     *
     * @param int $ignoreHidden = 1
     * Do we ignore entries starting with a dot (.)?
     * - 0: do not ignore hidden entries
     * - 1: ignore hidden directories
     * - 2: ignore hidden directories and files
     *
     * If a directory is ignored, its content is ignored recursively.
     *
     * @return array
     *
     */
    public static function getFilesWithName(string $dir, string $name, bool $extensionCaseSensitive = false, bool $recursive = false,
                                            bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1): array
    {
        if (is_string($name)) {
            $name = [$name];
        }
        return DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($dir, function ($path, $rPath, $level, &$skipDir) use ($relativePath, $recursive, $ignoreHidden, $name, $extensionCaseSensitive) {
            if (0 === $level || true === $recursive) {

                $fileName = basename($rPath);
                if ($ignoreHidden > 0 && 0 === strpos($fileName, '.')) {
                    if (
                        is_dir($path) ||
                        (is_file($path) && 2 === $ignoreHidden)
                    ) {
                        $skipDir = true;
                        return null;
                    }
                }


                if (is_file($path)) {


                    //--------------------------------------------
                    // NAME MATCH?
                    //--------------------------------------------

                    $flags = null;
                    if (true === $extensionCaseSensitive) {
                        $flags = \FNM_CASEFOLD;
                    }
                    $match = false;
                    foreach ($name as $_name) {

                        if (true === fnmatch($_name, $fileName, $flags)) {
                            $match = true;
                        }
                    }
                    if (false === $match) {
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


}
