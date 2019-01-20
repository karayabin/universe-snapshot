<?php

namespace SitemapBuilderBox\Builder\XmlSitemapBuilderPlugin;

/*
 * LingTalfi 2015-10-09
 */
use SitemapBuilderBox\Objects\Sitemap;
use SitemapBuilderBox\Objects\Url;
use SitemapBuilderBox\Builder\XmlSitemapBuilder;

interface XmlSitemapBuilderPluginInterface
{

    public function onPrepareBefore(Sitemap $sitemap, XmlSitemapBuilder $xmlSitemapBuilder);

    public function decorateUrlElement(Url $url, XmlSitemapBuilder $xmlSitemapBuilder);
}
