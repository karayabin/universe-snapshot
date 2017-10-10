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


/**
 * FileTool
 * @author Lingtalfi
 * 2014-08-18
 *
 */
class FileTool
{

    /**
     * Appends a suffix to a pathName, taking consideration of the extension.
     *
     * @param $pathName
     * @param $saltSuffix
     * @return string
     */
    public static function addSaltSuffix($pathName, $saltSuffix)
    {
        $extension = self::getExtension($pathName);
        if (false !== $extension) {
            $pathName = self::getFileName($pathName) . $saltSuffix . '.' . $extension;
        }
        else {
            $pathName .= $saltSuffix;

        }
        return $pathName;
    }

    public static function checkValidFilePath($file)
    {
        if (is_string($file)) {
            if ('' === trim($file)) {
                throw new \InvalidArgumentException("file argument must not be empty");
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("file argument must be of type string, %s given", gettype($file)));
        }
    }

    /**
     * Returns true only if:
     * - dir exists
     * - file exists and is located under the dir
     *
     */
    public static function existsUnder($file, $dir)
    {
        if (false !== $rDir = realpath($dir)) {
            if (false !== $rFile = realpath($file)) {
                return ($rDir === substr($rFile, 0, strlen($rDir)));
            }
        }
        return false;
    }


    /**
     * Resolves the dot components (. and ..) from a path.
     *
     *
     * @param string $path , the path of the resource to resolve.
     * @return string, the resolved absolute path
     */
    public static function resolveDot($path, $isWin = null)
    {
        $prefix = null;
        $path = self::prepareAbsolutePathStripPrefix($path, $prefix, $isWin);
        if (false !== strpos($path, '..')) {
            $parts = [];
            $p = explode('/', $path);
            foreach ($p as $index => $part) {
                if ('..' === $part) {
                    array_pop($parts);
                }
                else {
                    $parts[] = $part;
                }
            }
            $parts = array_filter($parts);
            $path = implode('/', $parts);
        }

        if (true === $isWin) {
            $path = str_replace('/', '\\', $path);
        }
        if (null !== $prefix) {
            $path = $prefix . ltrim($path, '/');
        }
        return $path;
    }


    /**
     * For non hidden files, the extension is the last component.
     * For hidden files, the first component is ignored
     *      (therefore .htaccess has no extension for instance).
     *
     * @return false|string
     */
    public static function getExtension($pathName)
    {
        $ret = false;
        $path = basename($pathName);
        if (false !== $pos = strrpos($path, '.', 1)) {
            $ret = substr($path, $pos + 1);
        }
        return $ret;
    }

    /**
     * For non hidden files,
     * returns all the components located after the first component.
     * For hidden files,
     * the first component is stripped.
     *
     * @return array
     */
    public static function getExtensions($pathName)
    {
        $ret = [];
        $path = basename($pathName);
        /**
         * For hidden files, the first (non blank) segment is the first component
         */
        if (false !== $pos = strpos($path, '.', 1)) {
            $path = substr($path, $pos + 1);
            $ret = explode('.', $path);
        }
        return $ret;
    }


    /**
     * FileName is like php's basename but without the last extension.
     * If it's a hidden file, the first component is not considered as an extension.
     *
     * So the fileName for doo.soo.poo is doo.soo,
     * but the fileName for .htaccess is .htaccess for instance.
     */
    public static function getFileName($string)
    {
        $string = basename($string);
        if (false !== $pos = strrpos($string, '.')) {
            /**
             * remove the last extension,
             * but beware that hidden files' first component IS NOT an extension!
             */
            if (0 !== $pos) {
                $string = substr($string, 0, $pos);
            }
        }
        return $string;
    }

    /**
     * First component is the first dot separated component.
     * For hidden files (starting with dot), the leading dot is ignored.
     */
    public static function getFirstComponent($string)
    {
        $string = basename($string);
        if (false !== $pos = strpos($string, '.', 1)) {
            $string = substr($string, 0, $pos);
        }
        return $string;
    }

    /**
     * @return string|false, the relative path from $from to $to,
     *                      computed by string analysis only.
     *                      If $from and $to are identical, the empty
     *                      string is returned.
     *
     *                      If $from and $to have are not of the same type
     *                      (one absolute and one relative), false will be returned.
     *
     *                      On windows, if two absolute paths are given and they
     *                      are not on the same drive, false is returned.
     *
     * @test
     */
    public static function getRelativePath($from, $to, $isWin = null)
    {
        $s = '';
        if (is_string($from)) {
            if (is_string($to)) {

                $from = self::resolveDot($from);
                $to = self::resolveDot($to);
                $prefixFrom = null;
                $prefixTo = null;
                $from = self::prepareAbsolutePathStripPrefix($from, $prefixFrom, $isWin);
                $to = self::prepareAbsolutePathStripPrefix($to, $prefixTo, $isWin);

                if ($prefixTo !== $prefixFrom) {
                    return false;
                }

                if ($from !== $to) {

                    $fromComps = [];
                    $toComps = [];
                    if ('' !== $from) {
                        $fromComps = explode('/', $from);
                    }
                    if ('' !== $to) {
                        $toComps = explode('/', $to);
                    }

                    /**
                     * Searching for the longest heading common components
                     */
                    $commons = [];
                    /**
                     * foreach component of from located AFTER the common components,
                     * we store a .. component.
                     * This is used to go up in the tree from "from" to "to",
                     * so that we reach the common base.
                     */
                    $fromTrailing = [];
                    $longestRunning = true;
                    foreach ($fromComps as $i => $comp) {
                        if (
                            true === $longestRunning &&
                            array_key_exists($i, $toComps) &&
                            $comp === $toComps[$i]
                        ) {
                            $commons[] = $comp;
                            unset($toComps[$i]);
                        }
                        else {
                            $longestRunning = false;
                            $fromTrailing[] = '..';
                        }
                    }
                    $s = implode('/', $fromTrailing);
                    if ($toComps) {
                        if ('' !== $s) {
                            $s .= '/';
                        }
                        $s .= implode('/', $toComps);
                    }
                    if ('' !== $s && $isWin) {
                        $s = str_replace('/', '\\', $s);
                    }

                }
            }
            else {
                throw new \InvalidArgumentException(sprintf("to must be of type string, %s given", gettype($to)));
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("from must be of type string, %s given", gettype($from)));
        }
        return $s;
    }

    /**
     * @return array
     * Tags are like file extensions, but without the last
     */
    public static function getTags($path)
    {
        $ret = self::getExtensions($path);
        array_pop($ret);
        return $ret;
    }

    public static function split($file, array $options = [])
    {
        $options = array_replace([
            'sepChar' => '-',
            'minSep' => 10,
            /**
             * Will remove entries which are made of blank space only
             */
            'filter' => true,
            'autoCast' => true,
            /**
             * Will throw an exception if the file cannot be read
             */
            'strict' => true,
        ], $options);

        $sepChar = $options['sepChar'];

        if (is_string($file)) {
            if (false !== $content = @file_get_contents($file)) {
                if (is_string($sepChar)) {
                    $ret = preg_split('!' . preg_quote($sepChar, '!') . '{' . (int)$options['minSep'] . ',}[a-z-A-Z0-9]*!m', $content);

                    $filter = $options['filter'];
                    $autoCast = $options['autoCast'];

                    if ($filter || $autoCast) {
                        foreach ($ret as $k => $v) {
                            $v = trim($v, PHP_EOL);

                            if (true === $filter && '' === $v) {
                                unset($ret[$k]);
                            }
                            elseif (true === $autoCast) {
                                $ret[$k] = StringTool::autoCast($v);
                            }
                        }
                    }
                    return $ret;

                }
                else {
                    throw new \InvalidArgumentException("sepChar must be a string");
                }
            }
            elseif (true === $options['strict']) {
                throw new \RuntimeException(sprintf("Cannot access the content of file: %s", $file));
            }
        }
        else {
            throw new \InvalidArgumentException("file must be a string");
        }
        return false;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * Strips the filesystem root prefix if any (C:\ on win, / on unix),
     * then convert all backslashes to forward slashes.
     * Then remove the trailing slashes.
     *
     */
    private static function prepareAbsolutePathStripPrefix($path, &$prefix = null, &$isWin = null)
    {
        if (null === $isWin) {
            $isWin = MachineTool::isWindows();
        }
        if ($isWin) {
            $three = substr($path, 0, 3);
            if (preg_match('!^[A-Z]:\\\$!i', $three)) {
                $prefix = $three;
                $path = substr($path, 3);
            }
            $path = str_replace('\\', '/', $path);
        }
        else {
            if ('/' === substr($path, 0, 1)) {
                $prefix = '/';
                if (false === $path = substr($path, 1)) {
                    $path = '';
                }
            }
        }
        $path = trim($path, '/');
        return $path;
    }
}
