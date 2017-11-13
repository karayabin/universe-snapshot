<?php


namespace HybridList;


interface HybridListInterface
{

    /**
     * @return array
     *          - items: the rows
     *          - sliceNumber: the number of the slice representing the items (aka the current page number)
     *          - sliceLength: the number of items per slice
     *          - totalNumberOfItems: the total number of items
     *          - offset: the offset of the returned slice's first element (compared to the whole items array)
     *
     */
    public function execute();
}