<?php

namespace SitemapSlicer\SitemapSlice;

/*
 * LingTalfi 2015-10-10
 */
use SitemapSlicer\TableBindure\TableBindureInterface;

interface SitemapSliceInterface
{


    /**
     * @return SitemapSliceInterface
     */
    public function sliceWidth($n);

    /**
     * @param $cbOrFormatString
     *              string: a format string using tag {n}.
     *                      {n} is replaced with the empty string for the base slice (aka slice 1),
     *                      and with the number of the slice for other slices.
     *              callback: returns the filePath, takes one parameter: n, the number of the slice.
     * @return SitemapSliceInterface
     */
    public function file($cbOrFormatString);


    /**
     * @return SitemapSliceInterface
     */
    public function addTableBindure(TableBindureInterface $b);


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return TableBindureInterface[]
     */
    public function getTableBindures();

    /**
     * @return mixed, see file method
     */
    public function getFile();

    /**
     * @return int|null
     */
    public function getSliceWidth();


}
