<?php

namespace SitemapSlicer\TableBindure;

/*
 * LingTalfi 2015-10-10
 */
interface TableBindureInterface
{

    /**
     * int:nbTotalRows   f  ()
     * @return TableBindureInterface
     */
    public function setCountCallback(callable $f);

    /**
     * array:rows  f ( int offset, int nbItems )
     * @return TableBindureInterface
     */
    public function setRowsCallback(callable $f);


    /**
     * mixed:sitemapEntry   f ( array row )
     * Sitemap entry is SitemapBuilder specific
     * @return TableBindureInterface
     */
    public function setConvertToSitemapEntryCallback(callable $f);


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * Returns int|null:nbTotalRows
     */
    public function getCount();

    public function getRowsCallback();

    public function getConvertToSitemapEntryCallback();

}
