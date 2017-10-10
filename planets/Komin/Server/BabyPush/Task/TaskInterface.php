<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Server\BabyPush\Task;


/**
 * TaskInterface
 * @author Lingtalfi
 * 2014-10-24
 *
 */
interface TaskInterface
{

    public function setPipe($pipe);

    public function execute();

    public function feedPipe($data);

    public function endTask();
}
