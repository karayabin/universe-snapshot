<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\StreamWrapper\ProgramStreamWrappers;

use Komin\Component\Console\StreamWrapper\Readable\InputStreamWrapper\InputStreamWrapper;
use Komin\Component\Console\StreamWrapper\Readable\InputStreamWrapper\InputStreamWrapperInterface;
use Komin\Component\Console\StreamWrapper\Writable\ErrorStreamWrapper\BashtmlErrorStreamWrapper;
use Komin\Component\Console\StreamWrapper\Writable\ErrorStreamWrapper\ErrorStreamWrapper;
use Komin\Component\Console\StreamWrapper\Writable\ErrorStreamWrapper\ErrorStreamWrapperInterface;
use Komin\Component\Console\StreamWrapper\Writable\OutputStreamWrapper\BashtmlOutputStreamWrapper;
use Komin\Component\Console\StreamWrapper\Writable\OutputStreamWrapper\OutputStreamWrapper;
use Komin\Component\Console\StreamWrapper\Writable\OutputStreamWrapper\OutputStreamWrapperInterface;


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
