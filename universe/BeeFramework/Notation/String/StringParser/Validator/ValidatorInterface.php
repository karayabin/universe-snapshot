<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\StringParser\Validator;


/**
 * ValidatorInterface
 * @author Lingtalfi
 * 2015-05-12
 *
 */
interface ValidatorInterface
{
    public function isValid($string, $beginPos, $endPos, $nextSignificantPos);
}
