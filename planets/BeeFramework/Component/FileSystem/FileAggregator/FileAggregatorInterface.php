<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\FileAggregator;


/**
 * FileAggregatorInterface
 * @author Lingtalfi
 * 2015-03-06
 *
 * A file aggregator is more a concept than a real tool.
 *
 * Basically, to collect some files, one would use the finder tool,
 * because of its flexibility.
 *
 * However, for some reasons, one would want to hide the complexity of the finder
 * behind one simple method, and that's all the file aggregator does, basically.
 *
 * You might want to use this if you have relatively complex finder rules,
 * and you want to call them in a simple manner.
 * I used it for the service container code builder object.
 *
 *
 *
 */
interface FileAggregatorInterface
{

    public function collectFiles($dir);
}
