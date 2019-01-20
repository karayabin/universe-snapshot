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

use BeeFramework\Bat\FileSystemTool;
use BeeFramework\Bat\RandomTool;
use BeeFramework\Bat\StringTool;
use Komin\Server\BabyPush\Task\TaskInterface;


/**
 * BabyPushServerTool
 * @author Lingtalfi
 * 2014-10-24
 *
 */
class BabyPushServerTool
{

    const ENDFLAG = '--__BabyPushEndFlag__--';

    public static function addEndFlag(&$content)
    {
        $content = self::ENDFLAG . "\n" . $content;
    }

    public static function removeEndFlag(&$content)
    {
        $content = str_replace(self::ENDFLAG . "\n", "", $content);
    }

    public static function isEnded($content)
    {
        return (self::ENDFLAG === substr($content, 0, strlen(self::ENDFLAG)));
    }


}
