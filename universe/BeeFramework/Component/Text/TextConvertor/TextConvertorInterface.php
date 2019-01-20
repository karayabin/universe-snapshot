<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Text\TextConvertor;


/**
 * TextConvertorInterface
 * @author Lingtalfi
 * 2014-08-29
 *
 */
interface TextConvertorInterface
{

    /**
     * @return string
     */
    public function convert($string);
}
