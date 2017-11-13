<?php


namespace HybridList\ListShaper;


use HybridList\Shaper\ShaperInterface;

interface ListShaperInterface extends ShaperInterface
{
    /**
     * @param $input , string, the input value
     * @param array &$rows , the current rows that we can shape if necessary
     * @param array &$info , an array used to fix the info array returned by the HybridList itself.
     *          It can contain any combination of the following keys (same definition as the
     *          corresponding properties in HybridList):
     *              - sliceNumber
     *              - sliceLength
     *              - totalNumberOfItems
     *              - offset
     *
     *
     * @return void
     */
    public function execute($input, array &$rows, array &$info = []);


}