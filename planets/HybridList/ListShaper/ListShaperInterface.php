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
     * @param array $originalItems , an array containing the original items (before any ListShaper has applied)
     *
     *
     * @return void
     */
    public function execute($input, array &$rows, array &$info = [], array $originalItems = []);

    /**
     * This method is called before the original items are filtered by list shapers.
     * It provides the list shaper the opportunity to collect information about the current list.
     *
     *
     * @param array $originalItems
     * @return void
     */
    public function prepareWithOriginalItems(array $originalItems);

    /**
     * Defines the priority in which shaper execute.
     *
     * @return null|int, the lowest number has the highest priority.
     *          null means auto.
     */
    public function getPriority();


}