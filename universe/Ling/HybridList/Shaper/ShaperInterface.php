<?php


namespace Ling\HybridList\Shaper;


interface ShaperInterface{

    /**
     * @return array, an array of list param names this shaper reacts too.
     */
    public function getReactsTo();
}