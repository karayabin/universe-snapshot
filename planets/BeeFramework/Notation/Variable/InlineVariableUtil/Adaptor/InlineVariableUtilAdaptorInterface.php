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
 * InlineVariableUtilAdaptorInterface
 * @author Lingtalfi
 * 2015-04-26
 *
 */
interface InlineVariableUtilAdaptorInterface
{

    /**
     * @return false|string,
     *              returns false if this adaptor is not adapted for the var,
     *              or the string representation of the var otherwise.
     */
    public function toString($var, $type);
}
