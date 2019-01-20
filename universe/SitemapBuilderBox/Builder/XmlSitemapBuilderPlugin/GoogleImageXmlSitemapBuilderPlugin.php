<?php

namespace SitemapBuilderBox\Builder\XmlSitemapBuilderPlugin;

/*
 * LingTalfi 2015-10-10
 * https://support.google.com/webmasters/answer/178636?hl=en
 */
use SitemapBuilderBox\Objects\Sitemap;
use SitemapBuilderBox\Objects\Url;
use SitemapBuilderBox\Builder\XmlSitemapBuilder;
use SitemapBuilderBox\Tool\SitemapBuilderTool;

class GoogleImageXmlSitemapBuilderPlugin implements XmlSitemapBuilderPluginInterface
{
    public function onPrepareBefore(Sitemap $sitemap, XmlSitemapBuilder $xmlSitemapBuilder)
    {
        // do we use google video extension?
        true === self::hasImage($sitemap) && $xmlSitemapBuilder->setUrlSetAttribute('xmlns:image', 'http://www.google.com/schemas/sitemap-image/1.1');
    }


    public function decorateUrlElement(Url $url, XmlSitemapBuilder $xmlSitemapBuilder)
    {
        if ($url->images) {


            $w = $xmlSitemapBuilder->getWriter();

            foreach ($url->images as $im) {
                
                $w->startElement('image:image');
                (null !== $im->loc && $w->writeElement('image:loc', $this->escape($im->loc)));
                (null !== $im->caption && $w->writeElement('image:caption', $this->escape($im->caption)));
                (null !== $im->geoLocation && $w->writeElement('image:geo_location', $this->escape($im->geoLocation)));
                (null !== $im->title && $w->writeElement('image:title', $this->escape($im->title)));
                (null !== $im->licence && $w->writeElement('image:licence', $this->escape($im->licence)));

                $w->endElement();
            }
        }
    }


    private function escape($v)
    {
        return SitemapBuilderTool::escapeSingleQuoteEntity($v);
    }

    private static function hasImage(Sitemap $sitemap)
    {
        foreach ($sitemap->getUrls() as $url) {
            if ($url->images) {
                return true;
            }
        }
        return false;
    }
}
