<?php

namespace SitemapSlicer\TableBindure;

/*
 * LingTalfi 2015-10-10
 */
class AuthorTableBindure implements TableBindureInterface
{

    private $countCb;
    private $rowsCb;
    private $convertToSitemapEntryCb;


    public static function create()
    {
        return new static();
    }

    /**
     * int:nbTotalRows   f  ()
     * @return TableBindureInterface
     */
    public function setCountCallback(callable $f)
    {
        $this->countCb = $f;
        return $this;
    }

    /**
     * array:rows  f ( int offset, int nbItems )
     * @return TableBindureInterface
     */
    public function setRowsCallback(callable $f)
    {
        $this->rowsCb = $f;
        return $this;
    }


    /**
     * mixed:sitemapEntry   f ( array row )
     * Sitemap entry is SitemapBuilder specific
     * @return TableBindureInterface
     */
    public function setConvertToSitemapEntryCallback(callable $f)
    {
        $this->convertToSitemapEntryCb = $f;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * Returns int|null:nbTotalRows
     */
    public function getCount()
    {
        if (is_callable($this->countCb)) {
            return call_user_func($this->countCb);
        }
    }

    public function getRowsCallback()
    {
        return $this->rowsCb;
    }

    public function getConvertToSitemapEntryCallback()
    {
        return $this->convertToSitemapEntryCb;
    }

}
