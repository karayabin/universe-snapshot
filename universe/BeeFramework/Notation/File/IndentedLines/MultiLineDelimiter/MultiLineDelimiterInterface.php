<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\IndentedLines\MultiLineDelimiter;


/**
 * MultiLineDelimiterInterface
 * @author Lingtalfi
 * 2015-02-27
 *
 */
interface MultiLineDelimiterInterface
{


    public function isBegin($line);

    public function isEnd($line);
}
