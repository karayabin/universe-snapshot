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
use Ling\Komin\Component\Console\StreamWrapper\Readable\InputStreamWrapper\InputStreamWrapperInterface;
use Ling\Komin\Component\Console\StreamWrapper\Writable\ErrorStreamWrapper\ErrorStreamWrapperInterface;
use Ling\Komin\Component\Console\StreamWrapper\Writable\OutputStreamWrapper\OutputStreamWrapperInterface;


/**
 * ProgramStreamWrappersInterface
 * @author Lingtalfi
 * 2015-03-14
 *
 */
interface ProgramStreamWrappersInterface
{
    /**
     * @return InputStreamWrapperInterface
     */
    public function in();

    /**
     * @return OutputStreamWrapperInterface
     */
    public function out();

    /**
     * @return ErrorStreamWrapperInterface
     */
    public function error();
}
