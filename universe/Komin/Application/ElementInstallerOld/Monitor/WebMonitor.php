<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\Monitor;


/**
 * WebMonitor
 * @author Lingtalfi
 * 2015-04-21
 *
 */
class WebMonitor implements MonitorInterface
{


    //------------------------------------------------------------------------------/
    // IMPLEMENTS MonitorInterface
    //------------------------------------------------------------------------------/
    public function msg($msg, $type = 'n')
    {
        $prefix = '';
        $color = 'black';
        switch ($type) {
            case 'n':
                $prefix = 'notice: ';
                $color = 'blue';
                break;
            case 'w':
                $prefix = 'warning: ';
                $color = 'orange';
                break;
            case 'e':
                $prefix = 'error: ';
                $color = 'red';
                break;
            case 'f':
                $prefix = 'failure: ';
                $color = 'red';
                break;
            default:
                break;
        }
        echo '<span style="color:' . $color . '">';
        echo $prefix . $msg . '<br>';
        echo '</span>';
    }
}
