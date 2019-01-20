<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Sound\ShellSoundPlayer;

use BeeFramework\Bat\MachineTool;
use BeeFramework\Component\Log\SuperLogger\SuperLogger;


/**
 * ShellSoundPlayer
 * @author Lingtalfi
 * 2014-10-29
 *
 * This was created to make a beep for SuperLogger.
 * It's not a full featured player as one may expect.
 *
 */
class ShellSoundPlayer
{

    protected $sound;

    public function __construct($sound)
    {
        $this->sound = $sound;
    }


    public function play()
    {
        if (file_exists($this->sound)) {
            // mac users:
            if (true === MachineTool::hasProgram('afplay')) {
                passthru("afplay " . '"' . $this->sound . '"');
            }
            // others: http://superuser.com/questions/276596/play-mp3-or-wav-file-via-linux-command-line
            elseif (true === MachineTool::hasProgram('mpg123')) {
                passthru("mpg123 " . '"' . $this->sound . '"');
            }
            elseif (true === MachineTool::hasProgram('mplayer')) {
                passthru("mplayer " . '"' . $this->sound . '"');
            }
        }
        else {
            SuperLogger::getInst()->log('shellSound.notFound.sound', sprintf("Sound not found: %s", $this->sound));
        }
    }


    public static function playSound($sound)
    {
        if (in_array($sound, ['beep', 'pop', 'sonar'])) {
            $sound = __DIR__ . "/../../_assets/sounds/" . $sound . '.mp3';
        }
        $o = new self($sound);
        $o->play();
    }


}
