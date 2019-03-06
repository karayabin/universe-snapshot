<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\Komin\Component\Console\StreamWrapper\ProgramStreamWrappers;

use Ling\Komin\Component\Console\StreamWrapper\Readable\InputStreamWrapper\InputStreamWrapper;
use Ling\Komin\Component\Console\StreamWrapper\Readable\InputStreamWrapper\InputStreamWrapperInterface;
use Ling\Komin\Component\Console\StreamWrapper\Writable\ErrorStreamWrapper\BashtmlErrorStreamWrapper;
use Ling\Komin\Component\Console\StreamWrapper\Writable\ErrorStreamWrapper\ErrorStreamWrapper;
use Ling\Komin\Component\Console\StreamWrapper\Writable\ErrorStreamWrapper\ErrorStreamWrapperInterface;
use Ling\Komin\Component\Console\StreamWrapper\Writable\OutputStreamWrapper\BashtmlOutputStreamWrapper;
use Ling\Komin\Component\Console\StreamWrapper\Writable\OutputStreamWrapper\OutputStreamWrapper;
use Ling\Komin\Component\Console\StreamWrapper\Writable\OutputStreamWrapper\OutputStreamWrapperInterface;


/**
 * BashtmlProgramStreamWrappers
 * @author Lingtalfi
 * 2015-03-25
 *
 */
class BashtmlProgramStreamWrappers extends ProgramStreamWrappers
{
    public function __construct(array $options = [])
    {
        $options = array_replace([
            'out' => null,
            'err' => null,
        ], $options);
        if (null === $options['out']) {
            $options['out'] = new BashtmlOutputStreamWrapper();
        }
        if (null === $options['err']) {
            $options['err'] = new BashtmlErrorStreamWrapper();
        }
        parent::__construct($options);
    }


}
