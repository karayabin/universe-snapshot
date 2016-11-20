<?php

namespace SitemapBuilderBox\Builder\XmlSitemapBuilderPlugin;

/*
 * LingTalfi 2015-10-09
 */
use SitemapBuilderBox\Objects\Sitemap;
use SitemapBuilderBox\Objects\Url;
use SitemapBuilderBox\Builder\XmlSitemapBuilder;
use SitemapBuilderBox\Tool\SitemapBuilderTool;

class GoogleVideoXmlSitemapBuilderPlugin implements XmlSitemapBuilderPluginInterface
{
    public function onPrepareBefore(Sitemap $sitemap, XmlSitemapBuilder $xmlSitemapBuilder)
    {
        // do we use google video extension?
        true === self::hasVideo($sitemap) && $xmlSitemapBuilder->setUrlSetAttribute('xmlns:video', "http://www.google.com/schemas/sitemap-video/1.1");
    }


    public function decorateUrlElement(Url $url, XmlSitemapBuilder $xmlSitemapBuilder)
    {
        if (null !== $url->video) {


            $w = $xmlSitemapBuilder->getWriter();
            $w->startElement('video:video');


            $v = $url->video;


            (null !== $v->thumbnailLoc && $w->writeElement('video:thumbnail_loc', $this->escape($v->thumbnailLoc)));
            (null !== $v->title && $w->writeElement('video:title', $this->escape($v->title)));
            (null !== $v->description && $w->writeElement('video:description', $this->escape($v->description)));
            (null !== $v->contentLoc && $w->writeElement('video:content_loc', $this->escape($v->contentLoc)));
            (null !== $v->playerLoc && $this->writeElementWithAttributes($w, 'video:player_loc', $this->escape($v->playerLoc), $v->playerLocAttr));
            (null !== $v->duration && $w->writeElement('video:duration', $v->duration));
            (null !== $v->expirationDate && $w->writeElement('video:expiration_date', $v->expirationDate));
            (null !== $v->rating && $w->writeElement('video:rating', $v->rating));
            (null !== $v->viewCount && $w->writeElement('video:view_count', $v->viewCount));
            (null !== $v->publicationDate && $w->writeElement('video:publication_date', $v->publicationDate));
            (null !== $v->familyFriendly && $w->writeElement('video:family_friendly', $v->familyFriendly));
            (null !== $v->restriction && $this->writeElementWithAttributes($w, 'video:restriction', $v->restriction, $v->restrictionAttr));
            (null !== $v->galleryLoc && $this->writeElementWithAttributes($w, 'video:gallery_loc', $this->escape($v->galleryLoc), $v->galleryLocAttr));
            (null !== $v->price && $this->writeElementWithAttributes($w, 'video:price', $v->price, $v->priceAttr));
            (null !== $v->requiresSubscription && $w->writeElement('video:requires_subscription', $v->requiresSubscription));
            (null !== $v->uploader && $this->writeElementWithAttributes($w, 'video:uploader', $this->escape($v->uploader), $v->uploaderAttr));
            (null !== $v->live && $w->writeElement('video:live', $v->live));


            $w->endElement();
        }
    }

    private function writeElementWithAttributes(\XMLWriter $w, $element, $value, array $attr = null)
    {
        if (null !== $value) {
            $w->startElement($element);
            if ($attr) {
                foreach ($attr as $k => $v) {
                    $w->startAttribute($k);
                    $w->text(SitemapBuilderTool::escapeSingleQuoteEntity($v));
                    $w->endAttribute();
                }
            }
            $w->text($value);
            $w->endElement();
        }
        return true;
    }

    private function escape($v)
    {
        return SitemapBuilderTool::escapeSingleQuoteEntity($v);
    }

    private static function hasVideo(Sitemap $sitemap)
    {
        foreach ($sitemap->getUrls() as $url) {
            if (null !== $url->video) {
                return true;
            }
        }
        return false;
    }
}
