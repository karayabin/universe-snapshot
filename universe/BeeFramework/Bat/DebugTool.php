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

use BeeFramework\Bat\BdotTool;



/**
 * DebugTool  # deprecated tool
 * @author Lingtalfi
 * 2014-08-13
 *
 */
class DebugTool
{


    public static function arrayDiff(array $a, array $b, $strictEqual = true)
    {
        $ret = [
            'added' => [],
            'modified' => [],
            'removed' => [],
        ];
        // let's first browse a and see if some keys are missing in b,
        // or if some values have been modified in b
        BdotTool::walk($a, function ($v, $k, $p) use ($b, $strictEqual, &$ret) {
            $found = false;
            $bv = BdotTool::getDotValue($p, $b, null, $found);
            if (true === $found) {
                // check if value b has been modified
                if (
                    (true === $strictEqual && $v !== $bv) ||
                    (false === $strictEqual && $v != $bv)
                ) {
                    $ret['modified'][] = [
                        $p,
                        VarTool::toString($v),
                        VarTool::toString($bv),
                    ];
                }
            }
            else { // removed from b
                $ret['removed'][] = [
                    $p,
                    VarTool::toString($v),
                ];
            }
        });

        // now we need to browse b to see which keys have been added
        BdotTool::walk($b, function ($v, $k, $p) use ($a, &$ret) {
            $found = false;
            $av = BdotTool::getDotValue($p, $a, null, $found);
            if (false === $found) {
                $ret['added'][] = [
                    $p,
                    VarTool::toString($v),
                ];
            }
        });

        return $ret;
    }





    public static function tree($dir = null, array $options = [])
    {
        if (null === $dir) {
            $dir = '.';
        }

        if (array_key_exists('layout', $options)) {
            $layout = $options['layout'];
            if (!is_string($layout)) {
                throw new \UnexpectedValueException("layout must be a string");
            }
            switch ($layout) {
                case 'treePerms':
                    $options = array_replace([
                        'perms' => 'full',
                        'htmlTable' => false,
                        'colSep' => ' ',
                        'colWrap' => function ($c, $colName) {
                            if ('perms' === $colName) {
                                return '[' . $c . ']';
                            }
                            return $c;
                        },
                        'cols' => ['perms', 'file'],
                    ], $options);
                    break;
                case 'tree':
                    $options = array_replace([
                        'htmlTable' => false,
                        'colSep' => ' ',
                        'cols' => ['file'],
                    ], $options);
                    break;
                default:
                    throw new \UnexpectedValueException(sprintf("Unknown layout %s", $layout));
                    break;
            }
        }


        $options = array_replace([
            'htmlTable' => true,
            'showHeaders' => true, // only if htmlTable is true
            'hideHidden' => true, // do not show files (not dirs) which baseName starts with dot
            'useDefaultStyle' => true, // only if htmlTable is true
            'eol' => '<br />', // only if htmlTable is false
            'colSep' => ' - ', // only if htmlTable is false
            'colWrap' => function ($c, $colName) {
                return $c;
            },
            'ind' => '─',
            'indRepeat' => 4,
            'useHtml' => true, // let this to true if the output is html
            'excludeFilter' => function ($path) { // return true to exclude the entry
//                    return !!strpos($path, 'fixtures');
            },
            'fileMode' => 'baseName', // baseName | path
            'maxDepth' => -1, // how many extra levels do you want to search in, -1 means unlimited
            'perms' => 'octal', // null | octal | full
            'size' => 'h', // null | string(unit, see ConvertTool::convertBytes)
            'mtime' => 'Y-m-d H:i:s', // null, date format
            'atime' => 'Y-m-d H:i:s', // null, date format
            'ctime' => 'Y-m-d H:i:s', // null, date format
            'owner' => true,
            'group' => true,
            'onError' => function ($msg, &$options) {
                return '<span class="debugtool-tree-permerror">[cannot read this ' . $msg . ']</span>';
            },
            'useIsSymlink' => true,
            'symlinkDest' => true,
            'posixResolve' => true, // try to resolve owner and/or group if posix functions are enabled
            'followSymlinks' => false, // if true and the path is a symlink to a dir, the content of the dest dir will be processed too.
            /**
             * cols are displayed in order. Available tags are:
             * - file
             * - type
             * - size
             * - perms
             * - owner
             * - group
             * - isSymlink
             * - symlinkDest
             * - mtime
             * - atime
             * - ctime
             */
            'cols' => ['file', 'type', 'size', 'perms', 'owner', 'group', 'isSymlink', 'symlinkDest', 'mtime', 'atime', 'ctime'],
        ], $options);


        $eol = $options['eol'];
        $showHeaders = $options['showHeaders'];
        $hideHidden = $options['hideHidden'];
        $fileMode = $options['fileMode'];
        $maxDepth = $options['maxDepth'];
        $useDefaultStyle = $options['useDefaultStyle'];
        $ind = $options['ind'];
        $indRepeat = $options['indRepeat'];
        $useHtml = $options['useHtml'];
        $colSep = $options['colSep'];
        $colWrap = $options['colWrap'];
        $perms = $options['perms'];
        $size = $options['size'];
        $table = $options['htmlTable'];
        $displayedCols = $options['cols'];
        $owner = $options['owner'];
        $group = $options['group'];
        $posixResolve = $options['posixResolve'];
        $mtime = $options['mtime'];
        $atime = $options['atime'];
        $ctime = $options['ctime'];
        $excludeFilter = $options['excludeFilter'];
        $useIsSymlink = $options['useIsSymlink'];
        $symlinkDest = $options['symlinkDest'];
        $followSymlinks = $options['followSymlinks'];
        $onError = $options['onError'];


        if (!is_array($displayedCols)) {
            throw new \InvalidArgumentException("order must be an array");
        }
        if (!is_callable($colWrap)) {
            throw new \InvalidArgumentException("colWrap must be a callable");
        }
        if (!in_array($fileMode, ['baseName', 'path'])) {
            throw new \UnexpectedValueException("option.fileMode must be either baseName or path");
        }


        $printFiles = function ($dir, $level = 0, array &$unfinishedLevels = []) use (
            $eol,
            $ind,
            $hideHidden,
            $indRepeat,
            $colSep,
            $colWrap,
            &$printFiles,
            &$options,
            $table,
            $displayedCols,
            $size,
            $fileMode,
            $maxDepth,
            $owner,
            $useHtml,
            $group,
            $posixResolve,
            $mtime,
            $atime,
            $ctime,
            $excludeFilter,
            $useIsSymlink,
            $symlinkDest,
            $followSymlinks,
            $onError,
            $perms
        ) {

            if (-1 !== $maxDepth && $maxDepth < $level) {
                return;
            }

            if (true === is_readable($dir)) {
                $o = new \FilesystemIterator($dir);
                $o = new \CallbackFilterIterator($o, function ($current) use ($hideHidden) {
                    /**
                     * @var \SplFileInfo $current
                     */
                    if ($current->isFile() && true === $hideHidden && '.' === substr($current->getBasename(), 0, 1)) {
                        return false;
                    }
                    return true;
                });
                $cpt = 0;
                $nbEntries = count(iterator_to_array($o));
                foreach ($o as $path => $f) {
                    /**
                     * @var \SplFileInfo $f
                     */

                    $isLink = is_link($path);

                    // skip?
                    if (is_callable($excludeFilter) && true === $excludeFilter($path)) {

                    }
                    else {

                        //------------------------------------------------------------------------------/
                        // CREATE COLS
                        //------------------------------------------------------------------------------/
                        $cols = [];
                        $cols['type'] = $f->isDir() ? 'dir' : 'file';
                        if (true === $table) {
                            $indent = str_repeat($ind, 1 + $level * $indRepeat);
                        }
                        else {
                            $levelContinues = false;
                            if ($cpt < $nbEntries - 1) {
                                $fork = '├';
                                $levelContinues = true;
                            }
                            else {
                                $fork = '└';
                            }


                            $sp = (true === $useHtml) ? '&nbsp;&nbsp;' : ' ';
                            $indent = '';
                            for ($i = 0; $i <= $level; $i++) {
                                if ($level === $i) {
                                    $indent .= $fork . str_repeat($ind, $indRepeat);
                                }
                                else {
                                    if (array_key_exists($i, $unfinishedLevels)) {
                                        $indent .= '│';
                                    }
                                    $indent .= str_repeat($sp, $indRepeat);
                                }
                            }

                            if (true === $levelContinues) {
                                if (!array_key_exists($level, $unfinishedLevels)) {
                                    $unfinishedLevels[$level] = true;
                                }
                            }
                            else {
                                unset($unfinishedLevels[$level]);
                            }
                        }


                        if ('baseName' === $fileMode) {
                            $cols['file'] = $f->getBasename();
                        }
                        elseif ('path' === $fileMode) {
                            $cols['file'] = $path;
                        }


                        if ($perms) {
                            if (false === ($p = FileSystemTool::filePerms($path, $perms))) {
                                $p = $onError($cols['type'], $options);
                            }
                            $cols['perms'] = $p;
                        }
                        if ($size) {
                            $s = 0;
                            $err = false;
                            if (is_dir($path)) {
                                if (false === $s = FileSystemTool::dirSize($path)) {
                                    $err = true;
                                }
                            }
                            else {
                                if (false === $s = @filesize($path)) {
                                    $err = true;
                                }
                            }
                            if (false === $err) {
                                $si = ConvertTool::convertBytes($s, $size);
                                $si2 = '';
                                if ('h' !== $size) {
                                    $si2 = $size;
                                }
                                $cols['size'] = $si . $si2;
                            }
                            else {
                                $cols['size'] = $onError($cols['type'], $options);
                            }
                        }
                        if ($owner) {
                            if (false !== $fowner = @fileowner($path)) {
                                if (true === $posixResolve && function_exists("posix_getpwuid")) {
                                    $fowner = posix_getpwuid($fowner)['name'];
                                }
                                $cols['owner'] = $fowner;
                            }
                            else {
                                $cols['owner'] = $onError($cols['type'], $options);
                            }
                        }
                        if ($group) {
                            if (false !== $gowner = @filegroup($path)) {
                                if (true === $posixResolve && function_exists("posix_getgrgid")) {
                                    $gowner = posix_getgrgid($gowner)['name'];
                                }
                                $cols['group'] = $gowner;
                            }
                            else {
                                $cols['group'] = $onError($cols['type'], $options);
                            }
                        }

                        if (is_string($mtime)) {
                            if (false !== $n = @filemtime($path)) {
                                $cols['mtime'] = date($mtime, $n);
                            }
                            else {
                                $cols['mtime'] = $onError($cols['type'], $options);
                            }
                        }
                        if (is_string($atime)) {
                            if (false !== $n = @fileatime($path)) {
                                $cols['atime'] = date($atime, $n);
                            }
                            else {
                                $cols['atime'] = $onError($cols['type'], $options);
                            }
                        }
                        if (is_string($ctime)) {
                            if (false !== $n = @filectime($path)) {
                                $cols['ctime'] = date($ctime, $n);
                            }
                            else {
                                $cols['ctime'] = $onError($cols['type'], $options);
                            }
                        }
                        if (true === $useIsSymlink) {
                            $cols['isSymlink'] = ($isLink) ? 'yes' : 'no';
                        }
                        if (true === $symlinkDest) {
                            $cols['symlinkDest'] = ($isLink) ? readlink($path) : '';
                        }


                        //------------------------------------------------------------------------------/
                        // DISPLAY COLS
                        //------------------------------------------------------------------------------/
                        if ($displayedCols) {
                            if ($table) {
                                echo '<tr>';
                            }
                            $first = true;
                            foreach ($displayedCols as $col) {
                                if (array_key_exists($col, $cols)) {
                                    $value = $colWrap($cols[$col], $col);


                                    if (true === $first) {
                                        $value = $indent . $value;
                                    }


                                    if ($table) {
                                        echo '<td>' . $value . '</td>';
                                    }
                                    else {
                                        if (false === $first) {
                                            echo $colSep;
                                        }
                                        echo $value;
                                    }
                                }
                                if (true === $first) {
                                    $first = false;
                                }
                            }
                            if ($table) {
                                echo '</tr>';
                            }
                            else {
                                echo $eol;
                            }
                        }
                    }


                    //------------------------------------------------------------------------------/
                    // GO DEEPER TO THE NEXT LEVEL...
                    //------------------------------------------------------------------------------/
                    if (is_dir($path)) {

                        if (
                            false === $isLink ||
                            (true === $isLink && $followSymlinks)
                        ) {
                            $printFiles($path, $level + 1, $unfinishedLevels);
                        }
                    }
                    $cpt++;
                }
            }
        };

        if ($table) {
            if (true === $useDefaultStyle) {
                echo '<style>
                .debugtool-treetable{
                    border-collapse: collapse;
                }

                .debugtool-treetable,
                .debugtool-treetable tr,
                .debugtool-treetable th,
                .debugtool-treetable td
                {
                    border: 1px solid #ddd;
                    padding:3px;
                    white-space: pre;
                }

                .debugtool-tree-permerror{
                    color: red;
                }

                </style>';
                echo '<table class="debugtool-treetable">' . PHP_EOL;
            }
            else {
                echo '<table>' . PHP_EOL;
            }
            if ($showHeaders && $displayedCols) {
                echo '<tr>';
                foreach ($displayedCols as $col) {
                    echo '<th>' . $col . '</th>';
                }
                echo '</tr>';
            }
        }
        $printFiles($dir, 0);
        if ($table) {
            echo '</table>' . PHP_EOL;
        }
    }
}
