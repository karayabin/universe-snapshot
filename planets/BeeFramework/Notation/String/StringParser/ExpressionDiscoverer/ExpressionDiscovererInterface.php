<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\StringParser\ExpressionDiscoverer;


/**
 * ExpressionDiscovererInterface
 * @author Lingtalfi
 * 2015-05-12
 *
 * An expression discoverer will try discovering an expression in a string,
 * starting at a given position.
 *
 */
interface ExpressionDiscovererInterface
{

    /**
     * Parse a string, looking for an expression.
     * If the expression is found, the method will define the value and the position
     * of the last char of the expression, and then return true.
     *
     * It returns false otherwise (and the value and position are not set).
     *
     *
     * @return bool
     */
    public function parse($string, $pos = 0);

    /**
     * @return null|mixed, the value of the expression if found
     *                      or null if the expression was not found
     */
    public function getValue();

    /**
     * @return false|int, the last position of the expression, if found,
     *                      or false if the expression was not found
     *
     */
    public function getLastPos();
}
