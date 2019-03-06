<?php

namespace Ling\SitemapBuilderBox\Builder\XmlSitemapBuilderPlugin;

/*
 * LingTalfi 2015-10-09
 */
use Ling\SitemapBuilderBox\Objects\Sitemap;
use Ling\SitemapBuilderBox\Objects\Url;
use Ling\SitemapBuilderBox\Builder\XmlSitemapBuilder;

interface XmlSitemapBuilderPluginInterface
{

    public function onPrepareBefore(Sitemap $sitemap, XmlSitemapBuilder $xmlSitemapBuilder);

    public function decorateUrlElement(Url $url, XmlSitemapBuilder $xmlSitemapBuilder);
}
