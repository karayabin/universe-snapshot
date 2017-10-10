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

use BeeFramework\Component\Log\SuperLogger\Message\MessageInterface;
use Komin\Sound\ShellSoundPlayer\ShellSoundPlayer;


/**
 * PlaySoundListener
 * @author Lingtalfi
 * 2014-10-28
 */
class PlaySoundListener implements ListenerInterface
{

    private static $cpt = 0; // one sound is enough...
    protected $sound;

    public function __construct(array $options = [])
    {
        $options = array_replace([
            'sound' => null,
        ], $options);
        $this->sound = $options['sound'];
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ListenerInterface
    //------------------------------------------------------------------------------/
    public function parse(MessageInterface $message)
    {
        if (0 === self::$cpt) {
            ShellSoundPlayer::playSound($this->sound);
            self::$cpt++;
        }
    }


}
