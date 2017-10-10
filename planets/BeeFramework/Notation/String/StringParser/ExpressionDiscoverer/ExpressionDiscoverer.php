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
 * ExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-12
 *
 *
 */
abstract class ExpressionDiscoverer implements ExpressionDiscovererInterface
{
    protected $pos;
    protected $value;

    public function __construct()
    {
        $this->pos = false;
        $this->value = null;
    }




    //------------------------------------------------------------------------------/
    // IMPLEMENTS ExpressionDiscovererInterface
    //------------------------------------------------------------------------------/
    /**
     * @return null|mixed, the value of the expression if found
     *                      or null if the expression was not found
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return false|int, the last position of the expression, if found,
     *                      or false if the expression was not found
     *
     */
    public function getLastPos()
    {
        return $this->pos;
    }

}
