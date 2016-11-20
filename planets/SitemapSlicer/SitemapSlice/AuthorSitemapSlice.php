<?php

namespace SitemapSlicer\SitemapSlice;

/*
 * LingTalfi 2015-10-10
 */
use SitemapSlicer\TableBindure\TableBindureInterface;

class AuthorSitemapSlice implements SitemapSliceInterface
{

    private $_sliceWidth;
    private $_file;
    private $bindures;

    public function __construct()
    {
        $this->bindures = [];
    }

    public static function create()
    {
        return new static();
    }

    /**
     * @return SitemapSliceInterface
     */
    public function sliceWidth($n)
    {
        $this->_sliceWidth = (int)$n;
        return $this;
    }

    /**
     * @param $cbOrFormatString
     *              string: a format string using tag {n}.
     *                      {n} is replaced with the empty string for the base slice (aka slice 1),
     *                      and with the number of the slice for other slices.
     *              callback: returns the filePath, takes one parameter: n, the number of the slice.
     */
    public function file($cbOrFormatString)
    {
        $this->_file = $cbOrFormatString;
        return $this;
    }


    /**
     * @return SitemapSliceInterface
     */
    public function addTableBindure(TableBindureInterface $b)
    {
        $this->bindures[] = $b;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return TableBindureInterface[]
     */
    public function getTableBindures()
    {
        return $this->bindures;
    }

    /**
     * @return mixed, see file method
     */
    public function getFile()
    {
        return $this->_file;
    }

    /**
     * @return int|null
     */
    public function getSliceWidth()
    {
        return $this->_sliceWidth;
    }


}
