<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biskotte\Parser\InstantiationSnippet\SpecialArg;


/**
 * SpecialArg
 * @author Lingtalfi
 * 2015-05-26
 *
 */
class SpecialArg
{
    public static function create()
    {
        return new static();
    }
}
