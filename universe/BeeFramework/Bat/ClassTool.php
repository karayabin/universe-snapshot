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
 * ClassTool
 * @author Lingtalfi
 * 2014-10-30
 *
 */
class ClassTool
{
    public static function getClassShortName($obj, $suffixToRemove = null)
    {
        $r = new \ReflectionClass($obj);
        $ret = $r->getShortName();
        if (null !== $suffixToRemove && is_string($suffixToRemove)) {
            $len = strlen($suffixToRemove);
            if ($suffixToRemove === substr($suffixToRemove, -$len)) {
                $ret = substr($ret, 0, -$len);
            }
        }
        return $ret;
    }


    public static function getFile($objOrClass)
    {
        $r = new \ReflectionClass($objOrClass);
        return $r->getFileName();
    }


    /**
     * http://stackoverflow.com/questions/7153000/get-class-name-from-file
     */
    public static function getClassNameByFile($file)
    {
        $fp = fopen($file, 'r');
        $class = $namespace = $buffer = '';
        $i = 0;
        while (!$class) {
            if (feof($fp)) break;

            $buffer .= fread($fp, 512);
            $tokens = token_get_all($buffer);

            if (strpos($buffer, '{') === false) {
                continue;
            }

            for (; $i < count($tokens); $i++) {
                if ($tokens[$i][0] === T_NAMESPACE) {
                    for ($j = $i + 1; $j < count($tokens); $j++) {
                        if ($tokens[$j][0] === T_STRING) {
                            $namespace .= '\\' . $tokens[$j][1];
                        }
                        else if ($tokens[$j] === '{' || $tokens[$j] === ';') {
                            break;
                        }
                    }
                }

                if ($tokens[$i][0] === T_CLASS) {
                    for ($j = $i + 1; $j < count($tokens); $j++) {
                        if ($tokens[$j] === '{') {
                            $class = $tokens[$i + 2][1];
                        }
                    }
                }
            }
        }
        return $namespace . '\\' . $class;
    }

}
