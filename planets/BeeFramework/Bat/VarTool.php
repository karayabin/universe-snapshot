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

use BeeFramework\Notation\Variable\InlineVariableUtil\Adaptor\CallableInlineVariableUtilAdaptor;
use BeeFramework\Notation\Variable\InlineVariableUtil\Adaptor\ClosureInlineVariableUtilAdaptor;
use BeeFramework\Notation\Variable\InlineVariableUtil\Adaptor\PhpDocInlineVariableUtilAdaptor;
use BeeFramework\Notation\Variable\InlineVariableUtil\Adaptor\PhpTypeInlineVariableUtilAdaptor;
use BeeFramework\Notation\Variable\InlineVariableUtil\InlineVariableUtil;


/**
 * VarTool
 * @author Lingtalfi
 * 2014-08-22
 *
 */
class VarTool
{
    public static function dump()
    {
        foreach (func_get_args() as $arg) {
            ob_start();
            var_dump($arg);
            $output = ob_get_clean();
            if ('1' !== ini_get('xdebug.default_enable')) {
                $output = preg_replace("!\]\=\>\n(\s+)!m", "] => ", $output);
            }
            echo '<pre>' . $output . '</pre>';
        }
    }

    public static function isIterable($var)
    {
        return (is_array($var) || $var instanceof \Traversable);
    }

    public static function checkType($var, $type, $varName = null)
    {
        if ($type !== gettype($var)) {
            if (null === $varName) {
                $msg = sprintf("variable is not of expected type %s", $type);
            }
            else {
                $msg = sprintf("variable %s is not of expected type %s", $varName, $type);
            }
            throw new \RuntimeException($msg);
        }
        return true;
    }


    public static function isEmpty($var)
    {
        return (is_null($var) || (is_string($var) && '' === trim($var)));
    }

    /**
     * a super scalar is either a scalar or null
     */
    public static function isSuperScalar($v)
    {
        return (null === $v || is_scalar($v));
    }


    /**
     * @param array $options
     *              - details: bool=false,
     *                              if true, the array's content will be represented
     * @return string
     */
    public static function toString($var, array $options = [])
    {
        $details = (array_key_exists('details', $options)) ? $options['details'] : false;
        $o = new InlineVariableUtil();
        if (true === $details) {
            $o->setAdaptors([
                new ClosureInlineVariableUtilAdaptor(),
                new CallableInlineVariableUtilAdaptor(),
                new PhpDocInlineVariableUtilAdaptor(),

            ]);
        }
        $ret = $o->toString($var);
        return $ret;
    }


    /**
     * Like php's var_export, but we can choose the indent chars,
     * and also we can choose to not indent the first line.
     *
     * (might be useful when formatting code to be written in a class programmatically
     * for instance).
     *
     */
    public static function varExport($var, $indent = ' ', $indentFirstLine = true)
    {
        $str = var_export($var, true);
        $str = preg_replace("/^/m", $indent, $str);
        if (false === $indentFirstLine) {
            $p = explode(PHP_EOL, $str);
            $first = array_shift($p);
            $first = ltrim($first);
            $str = $first;
            if ($p) {
                $str .= PHP_EOL . implode(PHP_EOL, $p);
            }
        }
        return $str;
    }
}
