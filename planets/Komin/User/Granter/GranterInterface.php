<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\User\Granter;


/**
 * GranterInterface
 * @author Lingtalfi
 * 2015-02-01
 *
 */
interface GranterInterface
{

    /**
     * @param $badges , string|array
     * @return bool, true if the user is granted to perform the action
     */
    public function isGranted($badges);
}
