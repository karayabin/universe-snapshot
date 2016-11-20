<?php

namespace SitemapBuilderBox\Builder\XmlSitemapBuilderPlugin;

/*
 * LingTalfi 2015-10-10
 */
use SitemapBuilderBox\Builder\XmlSitemapBuilder;
use SitemapBuilderBox\Objects\Sitemap;
use SitemapBuilderBox\Objects\Url;

class GoogleMobileXmlSitemapBuilderPlugin implements XmlSitemapBuilderPluginInterface
{
    public function onPrepareBefore(Sitemap $sitemap, XmlSitemapBuilder $xmlSitemapBuilder)
    {
        // do we use google video extension?
        true === self::hasMobile($sitemap) && $xmlSitemapBuilder->setUrlSetAttribute('xmlns:mobile', "http://www.google.com/schemas/sitemap-mobile/1.0");
    }


    public function decorateUrlElement(Url $url, XmlSitemapBuilder $xmlSitemapBuilder)
    {
        if (null !== $url->mobile) {
            $w = $xmlSitemapBuilder->getWriter();
            $w->startElement('mobile:mobile');
            $w->endElement();
        }
    }


    private static function hasMobile(Sitemap $sitemap)
    {
        foreach ($sitemap->getUrls() as $url) {
            if (null !== $url->mobile) {
                return true;
            }
        }
        return false;
    }
}
