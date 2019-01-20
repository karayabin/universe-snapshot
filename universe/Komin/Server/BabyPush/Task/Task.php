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

use Komin\Server\BabyPush\Server\BabyPushServerTool;


/**
 * Task
 * @author Lingtalfi
 * 2014-10-24
 *
 */
abstract class Task implements TaskInterface
{


    protected $pipe;


    //------------------------------------------------------------------------------/
    // IMPLEMENTS TaskInterface
    //------------------------------------------------------------------------------/
    public function setPipe($pipe)
    {
        $this->pipe = $pipe;
    }

    public function feedPipe($data)
    {
        file_put_contents($this->pipe, $data, \FILE_APPEND);
    }

    public function endTask()
    {
        $content = file_get_contents($this->pipe);
        BabyPushServerTool::addEndFlag($content);
        file_put_contents($this->pipe, $content, 0);
    }
}
