<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Notation\String\ShellExpansion;

use BeeFramework\Bat\MicroStringTool;


/**
 * ShellExpansionUtil
 * @author Lingtalfi
 *
 *
 */
class ShellExpansionUtil
{

    protected $fileNameSeparatorChar;

    public function __construct(array $options = [])
    {
        $options = array_replace([
            'sepChar' => '/',
        ], $options);
        $this->fileNameSeparatorChar = $options['sepChar'];
        if (']' === $this->fileNameSeparatorChar) {
            $this->fileNameSeparatorChar = '\\]'; // not tested
        }
    }


    public function match($pattern, $string)
    {
        if (preg_match('!\?|\*|\{!', $pattern)) {
            $reg = $this->toPhpRegex($pattern);
            if (preg_match($reg, $string)) {
                return true;
            }
        } else {
            return (false !== strpos($string, $pattern));
        }
        return false;
    }


    public function toPhpRegex($pattern)
    {
        $c = '!';
        $reg = $pattern;
        //------------------------------------------------------------------------------/
        // FILENAME EXPANSION
        //------------------------------------------------------------------------------/
        $reg = $this->applyFileNameExpansionToRegex($reg, [
            'regexChar' => $c,
        ]);

        //------------------------------------------------------------------------------/
        // BRACE EXPANSION
        //------------------------------------------------------------------------------/
        $reg = $this->applyBraceExpansionToRegex($reg, [
            'regexChar' => $c,
        ]);
        return $c . $reg . $c;
    }

    public function applyFileNameExpansionToRegex($string, array $options = [])
    {
        $options = array_replace([
            'regexChar' => '!',
        ], $options);
        $q = $options['regexChar'];
        $ranges = MicroStringTool::getProtectedRangesPos($string, [
            '"',
            "'",
            ['{', '}'],
        ]);
        $segments = [];
        $len = strlen($string);
        $replace = function ($string, $start, $length) use ($q) {
            return preg_replace_callback('!\\*|\\?!', function ($m) use ($q) {
                if ('*' === $m[0]) {
                    return '[^' . $this->fileNameSeparatorChar . ']*';
                } elseif ('?' === $m[0]) {
                    return '[^' . $this->fileNameSeparatorChar . ']';
                }
                return preg_quote($m[0], $q);
            }, substr($string, $start, $length));
        };
        if ($ranges) {

            $start = 0;
            while (null !== $r = array_shift($ranges)) {
                if ($r[0] !== 0) {
                    $segments[] = $replace($string, $start, $r[0] - $start);
                }
                $segments[] = substr($string, $r[0], $r[1] - $r[0] + 1);
                $start = $r[1] + 1;
            }
            $segments[] = $replace($string, $start, $len);
        } else {
            $segments[] = $replace($string, 0, $len);
        }
        $segments = array_filter($segments);
        return implode('', array_filter($segments));
    }

    private function applyBraceExpansionToRegex($string, array $options = [])
    {
        $options = array_replace([
            'regexChar' => '!',
        ], $options);
        $char = $options['regexChar'];
        $protection = [
            '"',
            "'",
            ['{', '}'],
        ];
        $nodes = MicroStringTool::getProtectedRangesPos($string, $protection);
        if (isset($nodes)) {
            $n = array_reverse($nodes);
            foreach ($n as $node) {
                $len = $node[1] - $node[0];
                $inner = substr($string, $node[0] + 1, $len - 1);
                $bReplace = false;
                if (true === $this->isBraceGenerator($inner)) {
                    $p = explode('..', $inner);
                    $replace = '[' . $p[0] . '-' . $p[1] . ']';
                    $bReplace = true;
                } else {

                    $p = MicroStringTool::explodeUnprotected(',', $inner, $protection);
                    if (count($p) > 1) {
                        array_walk($p, function (&$v) use ($char) {
                            if (true === MicroStringTool::hasUnprotectedString($v, '{')) {

                                $v = $this->applyBraceExpansionToRegex($v);
                            } else {
                                $v = preg_quote($v, $char);
                            }
                        });
                        $replace = '(?:' . implode('|', $p) . ')';
                        $bReplace = true;
                    } else {
                        $string = str_replace(['{', '}'], ['\{', '\}'], $string);
                    }
                }
                if ($bReplace) {
                    $string = substr_replace($string, $replace, $node[0], $len + 1);
                }
            }
        }
        return $string;
    }

    private function isBraceGenerator($string)
    {
        return !!preg_match('!^[a-z0-9]+\.\.[a-z0-9]+$!i', $string);
    }
}
