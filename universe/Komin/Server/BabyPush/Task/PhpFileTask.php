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
 * PhpFileTask
 * @author Lingtalfi
 * 2014-10-24
 *
 */
class PhpFileTask extends Task
{


    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS TaskInterface
    //------------------------------------------------------------------------------/
    public function execute()
    {
        $oTask = $this;
        require_once $this->file;
        $this->endTask();
    }

}
