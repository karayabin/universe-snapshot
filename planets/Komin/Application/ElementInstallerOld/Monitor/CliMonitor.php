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

use Komin\Component\Console\StreamWrapper\ProgramStreamWrappers\ProgramStreamWrappersInterface;


/**
 * CliMonitor
 * @author Lingtalfi
 * 2015-04-22
 *
 */
class CliMonitor implements MonitorInterface
{


    /**
     * @var ProgramStreamWrappersInterface
     */
    protected $streams;

    public function __construct(ProgramStreamWrappersInterface $streams = null)
    {
        if ($streams) {
            $this->setStreams($streams);
        }
    }




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
        $m = "<$color>" . $prefix . $msg . "</$color>";
        $this->streams->out()->write($m, true);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    /**
     * @return ProgramStreamWrappersInterface
     */
    public function getStreams()
    {
        return $this->streams;
    }

    public function setStreams(ProgramStreamWrappersInterface $streams)
    {
        $this->streams = $streams;
    }


}
