<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Bat;

use BeeFramework\Component\FileSystem\DirCopy\DirCopyUtil;
use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;
use BeeFramework\Component\FileSystem\Finder\Finder;
use BeeFramework\Component\FileSystem\UniqueBaseName\UniqueBaseNameUtil;


/**
 * FileTool
 * @author Lingtalfi
 * 2014-08-18
 *
 */
class FileSystemTool
{


    /**
     * http://php.net/manual/en/function.realpath.php#84012
     */
    public static function absolutePath($path)
    {
        $path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
        $startSlash = false;
        if (DIRECTORY_SEPARATOR === substr($path, 0, 1)) {
            $startSlash = true;
        }
        $parts = array_filter(explode(DIRECTORY_SEPARATOR, $path), 'strlen');
        $absolutes = array();
        foreach ($parts as $part) {
            if ('.' == $part) continue;
            if ('..' == $part) {
                array_pop($absolutes);
            }
            else {
                $absolutes[] = $part;
            }
        }
        $ret = implode(DIRECTORY_SEPARATOR, $absolutes);
        if (true === $startSlash) {
            $ret = DIRECTORY_SEPARATOR . $ret;
        }
        return $ret;
    }

    /**
     * Returns TRUE on success or FALSE on failure.
     */
    public static function chmod($file, $mode)
    {
        if (is_string($mode)) {
            $mode = intval($mode, 8);
        }
        $old = umask(0);
        $r = chmod($file, $mode);
        umask($old);
        return $r;
    }


    public static function cleanDir($dir, array $baseNames = ['.DS_Store'])
    {
        if (is_dir($dir)) {
            $f = Finder::create($dir)->ignoreSpecials(false);
            foreach($baseNames as $base){
                $f->baseName($base);
            }
            $f->find(function(FinderFileInfo $f){
                unlink($f);
            });
        }
        else {
            throw new \RuntimeException("dir argument must be a valid dir, $dir given");
        }
    }


    /**
     * Copy the srcDir inside the dstDir
     *
     * mode:
     * - 0: merge, do not erase existing files in dst
     * - 1: replace, replace files in dst
     */
    public static function copyDir($src, $dst, $mode = 0)
    {
        DirCopyUtil::create()->copyDir($src, $dst, $mode);
    }

    /**
     * Copy the content of the srcDir inside the dstDir
     *
     * mode:
     * - 0: merge, do not erase existing files in dst
     * - 1: replace, replace files in dst
     */
    public static function copyDirContent($src, $dst, $mode = 0)
    {
        DirCopyUtil::create()->copyDirContent($src, $dst, $mode);
    }
    


    /**
     * Returns TRUE on success or FALSE on failure.
     */
    public static function copyFile($src, $dst, $dirMode = 0777)
    {
        self::mkdir(dirname($dst), $dirMode, true);

        /**
         * If there is a dir or a symlink already at dst,
         * we need to remove it before we copy the file, otherwise we will get an error
         * or an unexpected behaviour.
         */
        if (is_dir($dst) || is_link($dst)) {
            self::remove($dst);
        }
        return copy($src, $dst);
    }


    public static function dirSize($dir)
    {
        $ret = false;
        if (true === is_readable($dir) && false !== $handle = opendir($dir)) {
            $ret = 0;
            while (false !== ($file = readdir($handle))) {
                $f = $dir . '/' . $file;
                if (
                    $file != '..' &&
                    $file != '.' &&
                    !is_dir($f) &&
                    is_readable($file)
                ) {
                    $ret += filesize($f);
                }
                else if (is_dir($f . $file) && $file != '..' && $file != '.') {
                    $ret += (int)self::dirSize($f);
                }
            }
            closedir($handle);
        }
        return $ret;
    }


    public static function fileExists($file)
    {
        return (file_exists($file) || is_link($file));
    }

    /**
     * mode:
     *  - octal      ( 1777, 0644, ...)
     *  - full       ( -rw-r--r-- )
     *
     * @return false in case of failure
     */
    public static function filePerms($file, $mode = 'octal')
    {
        if (is_readable($file) && false !== $perms = fileperms($file)) {
            if ('full' === $mode) {

                if (($perms & 0xC000) == 0xC000) {
                    // Socket
                    $ret = 's';
                }
                elseif (($perms & 0xA000) == 0xA000) {
                    // Symbolic Link
                    $ret = 'l';
                }
                elseif (($perms & 0x8000) == 0x8000) {
                    // Regular
                    $ret = '-';
                }
                elseif (($perms & 0x6000) == 0x6000) {
                    // Block special
                    $ret = 'b';
                }
                elseif (($perms & 0x4000) == 0x4000) {
                    // Directory
                    $ret = 'd';
                }
                elseif (($perms & 0x2000) == 0x2000) {
                    // Character special
                    $ret = 'c';
                }
                elseif (($perms & 0x1000) == 0x1000) {
                    // FIFO pipe
                    $ret = 'p';
                }
                else {
                    // Unknown
                    $ret = 'u';
                }

                // Owner
                $ret .= (($perms & 0x0100) ? 'r' : '-');
                $ret .= (($perms & 0x0080) ? 'w' : '-');
                $ret .= (($perms & 0x0040) ?
                    (($perms & 0x0800) ? 's' : 'x') :
                    (($perms & 0x0800) ? 'S' : '-'));

                // Group
                $ret .= (($perms & 0x0020) ? 'r' : '-');
                $ret .= (($perms & 0x0010) ? 'w' : '-');
                $ret .= (($perms & 0x0008) ?
                    (($perms & 0x0400) ? 's' : 'x') :
                    (($perms & 0x0400) ? 'S' : '-'));

                // World
                $ret .= (($perms & 0x0004) ? 'r' : '-');
                $ret .= (($perms & 0x0002) ? 'w' : '-');
                $ret .= (($perms & 0x0001) ?
                    (($perms & 0x0200) ? 't' : 'x') :
                    (($perms & 0x0200) ? 'T' : '-'));
            }
            elseif ('octal' === $mode) {
                $ret = substr(sprintf('%o', $perms), -4);
            }
            else {
                throw new \UnexpectedValueException("mode must be one of: full, octal");
            }
        }
        else {
            $ret = false;
        }
        return $ret;
    }

    /**
     * This function returns the number of bytes that were written to the file, or FALSE on failure.
     * @return int|false
     */
    public static function filePutContents($file, $data, $mode = 0, $dirMode = 0777)
    {
        self::mkdir(dirname($file), $dirMode, true);
        return file_put_contents($file, $data, $mode);
    }


    /**
     * @pattern [puschUp™]
     * all non pusch chars are transformed to dash.
     *
     */
    public static function getSafeChars($string)
    {
        $ret = preg_replace('![^a-zA-Z0-9.-_]!u', '-', $string);
        if (false !== $ret) {
            return strtolower($ret);
        }
        throw new \RuntimeException("OOps, sorry, I didn't see that one coming. Looks like we shall improve this method soon...");
    }


    /**
     * @returns string, a path to a non existing file located at the root of
     *          the parentDir.
     */
    public static function getUniqueResource($parentDir, $baseName)
    {
        $o = new UniqueBaseNameUtil();
        return $o->getUniqueResource($baseName, $parentDir);
    }

    /**
     * @returns string, a path to a non existing file
     *                  being sibling of the given file.
     */
    public static function getUniqueResourceBySibling($file)
    {
        $o = new UniqueBaseNameUtil();
        return $o->getUniqueResourceBySibling($file);
    }


    /**
     *
     * Detects if the given link is broken or not.
     * A broken link is a link that we cannot read, or which target doesn't exist
     * on the filesystem.
     *
     *
     * @return bool, returns true if the link is broken, or false otherwise.
     */
    public static function isBrokenLink($resource)
    {
        if (!is_string($resource)) {
            throw new \InvalidArgumentException(sprintf("resource argument must be of type string, %s given", gettype($resource)));
        }
        $ret = false;
        if (is_link($resource)) {
            if (!is_dir($resource) && !is_file($resource)) {
                $ret = true;
            }
        }
        return $ret;
    }

    public static function isEmptyDir($dir)
    {
        if (is_dir($dir)) {
            $f = scandir($dir);
            a($f);
            return (2 === count($f));
        }
        else {
            throw new \InvalidArgumentException("dir argument must be a directory");
        }
    }

    public static function isValidDirPath($path)
    {
        return (is_string($path) && '' !== trim($path));
    }


    /**
     * Returns whether or not the file exists once the method has been executed.
     *
     * @return bool
     */
    public static function mkdir($dir, $mode = 0777, $recursive = true, $throwEx = true)
    {
        $fileExist = false;
        if (false === self::fileExists($dir)) {
            $fileExist = mkdir($dir, $mode, $recursive);
        }
        else {
            $fileExist = true;
        }
        if (false === $fileExist && true === $throwEx) {
            throw new \RuntimeException(sprintf("Cannot create dir %s", $dir));
        }
        return $fileExist;
    }


    /**
     * Returns:
     *
     *  - false: if the given resource does not exist OR if it couldnt' be removed
     *  - true: if the given resource exists AND could be removed
     */
    public static function remove($file)
    {
        if (is_dir($file) && !is_link($file)) {
            if (is_readable($file)) {
                $files = new \FilesystemIterator($file,
                    \FilesystemIterator::KEY_AS_PATHNAME |
                    \FilesystemIterator::CURRENT_AS_FILEINFO |
                    \FilesystemIterator::SKIP_DOTS
                );
                foreach ($files as $f) {
                    self::remove($f);
                }
                return rmdir($file);
            }
            else {
                return false;
            }
        }
        else {
            if (true === self::fileExists($file)) {
                return unlink($file);
            }
        }
        return false;
    }


    public static function symlink($target, $link, $dirMode = 0777)
    {
        $ret = false;
        if (is_link($link) || file_exists($link)) {
            trigger_error(sprintf("File exists: %s. Cannot link the target '%s'", $link, $target), \E_USER_WARNING);
        }
        else {
            self::mkdir(dirname($target), $dirMode, true);
            self::mkdir(dirname($link), $dirMode, true);
            $ret = symlink($target, $link);
        }
        return $ret;
    }


    public static function tempDir($dir = null, $prefix = null, $dirMode = 0777)
    {
        if (null === $dir) {
            $dir = sys_get_temp_dir();
        }
        if (false !== $f = tempnam($dir, $prefix)) {
            unlink($f);
            self::mkdir($f, $dirMode, true);
            return $f;
        }
        return false;
    }

    /**
     * Returns TRUE on success or FALSE on failure.
     */
    public static function touch($file, $time = null, $atime = null, $dirMode = 0777)
    {
        self::mkdir(dirname($file), $dirMode, true);
        if (null === $time) {
            $time = time();
        }
        if (null === $atime) {
            $atime = $time;
        }
        return touch($file, $time, $atime);
    }


}
