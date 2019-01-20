<?php

namespace BullSheet\TimelinesHandler;

/*
 * LingTalfi 2016-02-14
 */
use BullSheet\Iterator\ReferencedTableIterator;

class AuthorTimelinesHandler
{

    private $onExceptionCb;


    public function handle($table, callable $insert, $generator, array $extra = null)
    {
        $p = explode(";", substr($generator, 10));
        list($timelineTable, $percent, $start, $end, $minDelay, $maxDelay) = $p;


        $startTime = strtotime($start);
        $endTime = strtotime($end);
        $minSec = $this->resolveMath($minDelay);
        $maxSec = $this->resolveMath($maxDelay);


        if ($endTime > $startTime) {
            $it = new ReferencedTableIterator($table, $percent, $timelineTable, (null === $extra) ? [] : $extra);
            foreach ($it as $row) {
                if (false !== $row) {

                    $st = $startTime;
                    while (true) {
                        try {
                            call_user_func_array($insert, [$row, &$st]);
                            $st += mt_rand($minSec, $maxSec);
                            if ($st >= $endTime) {
                                break;
                            }
                            $it->injectRow($row);
                        } catch (\Exception $e) {
                            $this->onException($e);
                        }
                    }
                }
            }
        }
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function onException(\Exception $e)
    {
        if (null !== $this->onExceptionCb) {
            call_user_func($this->onExceptionCb, $e);
        }
    }


    private function resolveMath($mathExpr)
    {
        return eval('return ' . $mathExpr . ';');
    }
}
