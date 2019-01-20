<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\FileRotator;


/**
 * FileRotatorInterface
 * @author Lingtalfi
 * 2015-05-25
 *
 */
interface FileRotatorInterface
{

    public function addMessage($plainText, $appendCarriageReturn = true);
}
