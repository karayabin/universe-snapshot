<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biscotte;


/**
 * BiscotteParserInterface
 * @author Lingtalfi
 * 2014-08-17
 *
 */
interface BiscotteParserInterface
{

    /**
     * @param mixed $value
     * @param string $address,
     *                  this is just used when a syntax error is detected,
     *                  as to improve the error message.
     * @return false|string,
     *
     *          false is returned if biscotte parser cannot
     *          interpret the given value.
     *          Otherwise, a string representing the php code
     *          used to instantiate a service is returned.
     */
    public function parseValue($value, $address);
    
}
