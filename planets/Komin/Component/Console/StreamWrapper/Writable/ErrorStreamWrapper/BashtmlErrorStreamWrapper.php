<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\StreamWrapper\Writable\ErrorStreamWrapper;

use Komin\Component\Console\StreamWrapper\Writable\Formatter\BashtmlFormatter;


/**
 * BashtmlErrorStreamWrapper
 * @author Lingtalfi
 * 2015-03-11
 *
 */
class BashtmlErrorStreamWrapper extends ErrorStreamWrapper 
{
    public function __construct()
    {
        parent::__construct(); 
        $this->setFormatter(new BashtmlFormatter());
    }
}
