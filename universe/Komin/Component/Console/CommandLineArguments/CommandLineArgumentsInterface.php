<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\CommandLineArguments;


/**
 * CommandLineArgumentsInterface
 * @author Lingtalfi
 * 2015-05-10
 *
 */
interface CommandLineArgumentsInterface
{

    public function hasArgument($name);

    public function getArgument($name, $default = null);
}
