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
 * ShellCommandTask
 * @author Lingtalfi
 * 2014-10-24
 *
 */
class ShellCommandTask extends Task
{


    protected $cmd;

    public function __construct($cmd)
    {
        $this->cmd = $cmd;
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS TaskInterface
    //------------------------------------------------------------------------------/
    public function execute()
    {
        $proc = popen($this->cmd, 'r');
        while (!feof($proc)) {
            $this->feedPipe(fread($proc, 4096));
        }
        $this->endTask();
    }

}
