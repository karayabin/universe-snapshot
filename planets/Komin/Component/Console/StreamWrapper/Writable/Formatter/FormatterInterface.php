<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\StreamWrapper\Writable\Formatter;


/**
 * FormatterInterface
 * @author Lingtalfi
 * 2015-03-11
 * 
 * A formatter is designed to help implementing custom notations 
 * when writing to the output.
 *
 */
interface FormatterInterface
{
    /**
     * 
     * @return string, the formatted expression
     */
    public function format($expression);
}
