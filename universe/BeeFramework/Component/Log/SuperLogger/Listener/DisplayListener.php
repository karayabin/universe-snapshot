<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\SuperLogger\Listener;

use BeeFramework\Bat\FileSystemTool;
use BeeFramework\Component\Log\FileRotator\BySizeFileRotator;
use BeeFramework\Component\Log\FileRotator\FileRotatorInterface;
use BeeFramework\Component\Log\SuperLogger\Message\MessageInterface;


/**
 * DisplayListener
 * @author Lingtalfi
 * 2014-10-28
 */
class DisplayListener implements ListenerInterface
{

    protected $newLineChar;

    public function __construct(array $options=[])
    {
        $options = array_replace([
            'newLineChar' => '<br>',
        ],$options);
        $this->newLineChar = $options['newLineChar'];
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ListenerInterface
    //------------------------------------------------------------------------------/
    public function parse(MessageInterface $message)
    {
        echo $this->newLineChar . "SuperLogger: [". $message->getId() ."] -- " . $message->getMessage() . $this->newLineChar;
    }


}
