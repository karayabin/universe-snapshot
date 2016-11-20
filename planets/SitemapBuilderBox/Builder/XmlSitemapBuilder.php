<?php

namespace SitemapBuilderBox\Builder;

/*
 * LingTalfi 2015-10-07
 * 
 */
use Bat\FileSystemTool;
use SitemapBuilderBox\Builder\XmlSitemapBuilderPlugin\XmlSitemapBuilderPluginInterface;
use SitemapBuilderBox\Exception\SitemapBuilderException;
use SitemapBuilderBox\Objects\Sitemap;
use SitemapBuilderBox\Objects\SitemapIndex;
use SitemapBuilderBox\Objects\Url;
use SitemapBuilderBox\Tool\SitemapBuilderTool;

class XmlSitemapBuilder implements SitemapBuilderInterface
{


    private $writer;
    private $urlSetAttr;
    private $sitemapIndexAttr;
    private $plugins;

    public function __construct()
    {
        if (false === extension_loaded('libxml')) {
            throw new SitemapBuilderException("SitemapBuilder requires extension libxml to be loaded");
        }
        $this->urlSetAttr = [
            'xmlns' => 'http://www.sitemaps.org/schemas/sitemap/0.9',
        ];
        $this->sitemapIndexAttr = [
            'xmlns' => 'http://www.sitemaps.org/schemas/sitemap/0.9',
        ];
    }

    public function registerPlugin(XmlSitemapBuilderPluginInterface $plugin)
    {
        $this->plugins[] = $plugin;
        return $this;
    }

    public function setUrlSetAttributes(array $urlSetAttr)
    {
        $this->urlSetAttr = $urlSetAttr;
        return $this;
    }

    public function setUrlSetAttribute($key, $value)
    {
        $this->urlSetAttr[$key] = $value;
        return $this;
    }

    public function setSitemapIndexAttributes(array $sitemapIndexAttr)
    {
        $this->sitemapIndexAttr = $sitemapIndexAttr;
        return $this;
    }

    public function setSitemapIndexAttribute($key, $value)
    {
        $this->sitemapIndexAttr[$key] = $value;
        return $this;
    }


    public function createSitemapFile(Sitemap $sitemap, $file = null)
    {
        if (null !== $file) {
            FileSystemTool::touchDone($file);
        }

        $w = $this->getXmlWriter();
        $this->startSiteMap($w, $file, $sitemap);
        foreach ($sitemap->getUrls() as $url) {
            $this->appendUrl($w, $url);
        }
        $this->endSiteMap($w);
        if (null === $file) {
            return $w->outputMemory(true);
        }
    }

    public function createSitemapIndexFile(SitemapIndex $sitemapIndex, $file)
    {
        FileSystemTool::touchDone($file);
        $w = $this->getXmlWriter();
        $w->openURI($file) || $this->error("Could not create a new xmlwriter using uri $file");
        $this->prepare($w);
        $w->startElement('sitemapindex') || $this->error("Could not start element sitemapindex");
        $this->prepareAttributes($w, $this->sitemapIndexAttr);

        foreach ($sitemapIndex->getSitemaps() as $sitemap) {
            (null !== $sitemap->loc) || $this->error("Loc not defined for sitemap");

            $w->startElement('sitemap');
            $w->writeElement('loc', $sitemap->loc);
            (null !== $sitemap->lastmod && $w->writeElement('lastmod', $sitemap->lastmod));
            $w->endElement();
        }

        $w->endElement();
        $w->endDocument();
    }


    public function setWriter(\XMLWriter $writer)
    {
        $this->writer = $writer;
        return $this;
    }

    public function getWriter()
    {
        return $this->writer;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function startSiteMap(\XMLWriter $w, $file = null, $sitemap)
    {
        if (null !== $file) {
            $w->openUri($file) || $this->error("Could not create a new xmlwriter using uri $file");
        }
        else {
            $w->openMemory() || $this->error("Could not create a new xmlwriter using memory");
        }

        $this->callPlugins('onPrepareBefore', [$sitemap, $this]);


        $this->prepare($w);
        $w->startElement('urlset') || $this->error("Could not start element urlset");
        $this->prepareAttributes($w, $this->urlSetAttr);
    }

    private function callPlugins($methodName, array $args)
    {
        if ($this->plugins) {
            foreach ($this->plugins as $plugin) {
                call_user_func_array([$plugin, $methodName], $args);
            }
        }
    }


    private function appendUrl(\XMLWriter $w, Url $url)
    {
        (null !== $url->loc) || $this->error("Loc not defined");
        $w->startElement('url');
        $w->writeElement('loc', SitemapBuilderTool::escapeSingleQuoteEntity($url->loc));
        (null !== $url->lastmod && $w->writeElement('lastmod', $url->lastmod));
        (null !== $url->changefreq && $w->writeElement('changefreq', $url->changefreq));
        (null !== $url->priority && $w->writeElement('priority', $url->priority));


        $this->callPlugins('decorateUrlElement', [$url, $this]);


        $w->endElement();
    }


    private function endSitemap(\XMLWriter $w)
    {
        $w->endElement();
        $w->endDocument();
    }

    private function prepareAttributes(\XMLWriter $w, array $attributes)
    {
        foreach ($attributes as $k => $v) {
            $w->writeAttribute($k, $v) || $this->error("Could not write attribute $k");
        }
    }


    private function prepare(\XMLWriter $w)
    {
        $w->startDocument('1.0', 'UTF-8') || $this->error("Could not create the document tag");
        $w->setIndent(true) || $this->error("Could not set indent");
        $w->setIndentString(str_repeat(' ', 4)) || $this->error("Could not set indent string");
    }

    /**
     * @return \XMLWriter
     */
    private function getXmlWriter()
    {
        if (null === $this->writer) {
            $this->writer = new \XMLWriter();
        }
        return $this->writer;
    }

    private function error($m)
    {
        throw new SitemapBuilderException($m);
    }


}
