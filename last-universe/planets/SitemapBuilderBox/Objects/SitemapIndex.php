<?php

namespace SitemapBuilderBox\Objects;

/*
 * LingTalfi 2015-10-08
 */

class SitemapIndex
{

    private $sitemaps;

    public function __construct()
    {
        $this->sitemaps = [];
    }

    public static function create()
    {
        return new self;
    }

    public function addSitemap(SitemapIndexSitemap $sitemap)
    {
        $this->sitemaps[] = $sitemap;
        return $this;
    }

    /**
     * @return SitemapIndexSitemap[]
     */
    public function getSitemaps()
    {
        return $this->sitemaps;
    }


}
