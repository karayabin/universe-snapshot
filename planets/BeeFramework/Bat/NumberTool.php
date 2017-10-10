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
 * NumberTool
 * @author Lingtalfi
 *
 *
 */
class NumberTool
{

    /**
     * @param $pattern , a string using intuitive
     *                  comparison notation, for instance
     *                  < 6
     *                  Only one operator is permitted per pattern.
     *                  The following operators are available:
     *                  - <
     *                  - >
     *                  - <=
     *                  - >=
     *                  - =
     *                  - !
     *
     *                  If no operator is detected, the = operator
     *                  is implicitly used.
     *
     *
     * @param $number
     * @return bool
     */
    public static function compare($pattern, $number)
    {
        $ret = false;
        if (is_string($pattern)) {
            if (is_numeric($number)) {


                $pattern = trim($pattern);
                $first = substr($pattern, 0, 1);
                $pNumber = '';
                $op = '=';
                switch ($first) {
                    case '<':
                    case '>':
                        $two = substr($pattern, 0, 2);
                        if ('<=' === $two || '>=' === $two) {
                            $op = $two;
                            $pNumber = substr($pattern, 2);
                        } else {
                            $pNumber = substr($pattern, 1);
                        }
                        break;
                    case '!':
                    case '=':
                        $op = $first;
                        $pNumber = substr($pattern, 1);
                        break;
                }
                $pNumber = trim($pNumber);
                $ret = eval('return ' . $pNumber . ' ' . $op . ' ' . $number . ';');

            } else {
                throw new \RuntimeException(sprintf("Invalid number argument, a number was expected, %s given", gettype($number)));
            }

        } else {
            throw new \RuntimeException(sprintf("Invalid pattern argument, a string was expected, %s given", gettype($pattern)));
        }
        return $ret;
    }

}
