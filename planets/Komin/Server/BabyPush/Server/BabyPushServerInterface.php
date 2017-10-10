<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Server\BabyPush\Server;

use Komin\Server\BabyPush\Task\TaskInterface;


/**
 * BabyPushServerInterface
 * @author Lingtalfi
 * 2014-10-24
 *
 */
interface BabyPushServerInterface
{


    /**
     * @return string: fileId
     */
    public function createPipe(array $taskParams = []);



    public function executeTask(TaskInterface $task, $fileId);

    /**
     * @return [data, isEnd]:
     *  - data: string
     *  - isEnd: bool
     */
    public function watchProgression($fileId);
}
