<?php

namespace Ling\SitemapBuilderBox\Builder;

/*
 * LingTalfi 2015-10-08
 * 
 */


use Ling\SitemapBuilderBox\Objects\Sitemap;

interface SitemapBuilderInterface
{

    /**
     * If file is null, the sitemap data is returned.
     * If file is not null, the sitemap is created with the given filename
     */
    public function createSitemapFile(Sitemap $sitemap, $file = null);
}
