<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Variable\InlineVariableUtil\Adaptor;


/**
 * InlineVariableUtilAdaptor
 * @author Lingtalfi
 * 2015-04-26
 *
 */
abstract class InlineVariableUtilAdaptor implements InlineVariableUtilAdaptorInterface
{

    public function __construct()
    {
    }

    abstract protected function getStringVersion($var, $type);


    /**
     * @return false|string,
     *              returns false if this adaptor is not adapted for the var,
     *              or the string representation of the var otherwise.
     */
    public function toString($var, $type)
    {
        if (false !== $s = $this->getStringVersion($var, $type)) {
            $var = $s;
            return $this->decorate($var);
        }
        return false;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function decorate($var)
    {
        return $var;
    }

}
