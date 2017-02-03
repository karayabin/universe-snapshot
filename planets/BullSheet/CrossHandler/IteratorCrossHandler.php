<?php

namespace BullSheet\CrossHandler;

/*
 * LingTalfi 2016-02-14
 * 
 */

use BullSheet\Exception\BullSheetException;
use BullSheet\Iterator\ReferencedTableIterator;

class IteratorCrossHandler
{

    private $onExceptionCb;

    //


    public static function create()
    {
        return new static();
    }


    /**
     * Populate some database.
     */
    public function handle($table, callable $insert, $crossNotation, array $weights)
    {
        if (0 === strpos($crossNotation, "cross:")) {


            $p = explode(";", substr($crossNotation, 6));;
            if (4 === count($p)) {
                list($leftTable, $leftProportion, $rightTable, $rightProportion) = $p;


                $leftProportion = (float)$leftProportion;
                $rightProportion = (float)$rightProportion;


                $lWeights = array_key_exists('left', $weights) ? $weights['left'] : null;
                $rWeights = array_key_exists('right', $weights) ? $weights['right'] : null;


                $leftIt = new ReferencedTableIterator($table, $leftProportion, $leftTable, $lWeights);
                $rightIt = new ReferencedTableIterator($table, $rightProportion, $rightTable, $rWeights);


                foreach ($leftIt as $lrow) {
                    if (false !== $lrow) {
                        foreach ($rightIt as $rrow) {
                            if (false !== $rrow) {
                                try {

                                    call_user_func($insert, $lrow, $rrow);
                                    $rightIt->injectRow($rrow);
                                } catch (\Exception $e) {
                                    $this->onException($e);
                                }
                            }
                        }
                        $leftIt->injectRow($lrow);
                    }
                }
            } else {
                throw new BullSheetException("Invalid cross notation: 4 arguments were expected");
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
}
