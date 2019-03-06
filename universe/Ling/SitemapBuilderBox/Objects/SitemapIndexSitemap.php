<?php

namespace Ling\SitemapBuilderBox\Objects;

/*
 * LingTalfi 2015-10-08
 */

class SitemapIndexSitemap
{

    public $loc;
    public $lastmod;


    public function __construct()
    {

    }

    public static function create()
    {
        return new self;
    }


    public function setLastmod($lastmod)
    {
        $this->lastmod = $lastmod;
        return $this;
    }

    public function setLoc($loc)
    {
        $this->loc = $loc;
        return $this;
    }

}
