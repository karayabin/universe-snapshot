<?php

namespace Ling\SitemapSlicer\SitemapIndexSlicer;

/*
 * LingTalfi 2015-10-10
 */
use Ling\SitemapSlicer\SitemapSlice\SitemapSliceInterface;

interface SitemapIndexSlicerInterface
{

    /**
     * @return SitemapIndexSlicerInterface
     */
    public function file($filePath);

    /**
     * @return SitemapIndexSlicerInterface
     */
    public function defaultSliceWidth($n);

    /**
     * @return SitemapIndexSlicerInterface
     */
    public function addSitemapSlice(SitemapSliceInterface $slice);

    public function execute();


    /**
     * string:url       f ( string:filePath )
     */
    public function url(callable $f);


    /**
     * void     f (  string:errMsg  )
     *
     *
     * @return SitemapIndexSlicerInterface
     */
    public function onWarning(callable $f);
}
