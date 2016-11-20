<?php

namespace SitemapSlicer\SitemapRecipient;

/*
 * LingTalfi 2015-10-12
 * 
 * This Recipient uses the SitemapBuilderBox to create the sitemap files.
 * https://github.com/lingtalfi/SitemapBuilderBox
 * 
 */
use SitemapBuilderBox\Builder\XmlSitemapBuilder;
use SitemapBuilderBox\Builder\XmlSitemapBuilderPlugin\GoogleImageXmlSitemapBuilderPlugin;
use SitemapBuilderBox\Builder\XmlSitemapBuilderPlugin\GoogleMobileXmlSitemapBuilderPlugin;
use SitemapBuilderBox\Builder\XmlSitemapBuilderPlugin\GoogleVideoXmlSitemapBuilderPlugin;
use SitemapBuilderBox\Objects\Sitemap;

class AuthorSitemapRecipient implements SitemapRecipientInterface
{

    private $sitemapFileName;
    private $maxSitemapEntries;
    private $curNbEntries;
    private $sitemapNumber;
    private $builder;

    /**
     * @var array of eventName => callback
     *
     *      possible eventNames are:
     *
     * - onNewSitemapCreated
     */
    private $eventsCb;

    /**
     * @var Sitemap
     */
    private $sitemap;

    public function __construct()
    {
        $this->maxSitemapEntries = 50000;

        $this->builder = new XmlSitemapBuilder();
        $this->builder->registerPlugin(new GoogleVideoXmlSitemapBuilderPlugin());
        $this->builder->registerPlugin(new GoogleImageXmlSitemapBuilderPlugin());
        $this->builder->registerPlugin(new GoogleMobileXmlSitemapBuilderPlugin());

        $this->eventsCb = [];

    }

    public function start()
    {
        $this->curNbEntries = 0;
        $this->sitemapNumber = 1;
        $this->sitemap = Sitemap::create();
    }

    public function end()
    {
        $this->endCurrentSitemap();
    }


    /**
     * @param $baseName
     *              string: a format string using tag {n}.
     *                      {n} is replaced with the empty string for the base slice (aka slice 1),
     *                      and with the number of the slice for other slices.
     *              callback: returns the filePath, takes one parameter: n, the number of the slice.
     */
    public function setFile($baseName)
    {
        $this->sitemapFileName = $baseName;
        return $this;
    }

    /**
     * Register a callback to be triggered whenever the event $eventName occurs.
     * The callable takes the event data as its arguments.
     */
    public function listenTo($eventName, callable $f)
    {
        $this->eventsCb[$eventName] = $f;
        return $this;
    }

    public function addSitemapEntry($sitemapEntry)
    {

        if ($this->curNbEntries >= $this->maxSitemapEntries) {
            $this->endCurrentSitemap();
        }

        $this->sitemap->addUrl($sitemapEntry);
        $this->curNbEntries++;

    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setMaxSitemapEntries($n)
    {
        $this->maxSitemapEntries = (int)$n;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function endCurrentSitemap()
    {
        if ($this->curNbEntries > 0) {
            $file = $this->getFileName();
            $this->builder->createSitemapFile($this->sitemap, $file);


            $this->dispatch('onNewSitemapCreated', [$file]);

            $this->sitemap = new Sitemap();
            $this->sitemapNumber++;
            $this->curNbEntries = 0;
        }
    }

    private function dispatch($eventName, $args)
    {
        if (array_key_exists($eventName, $this->eventsCb)) {
            call_user_func_array($this->eventsCb[$eventName], $args);
        }
    }

    private function getFileName()
    {
        $file = $this->sitemapFileName;
        $n = $this->sitemapNumber;
        if (is_string($file)) {
            if (1 === $n) {
                $file = str_replace('{n}', '', $file);
            }
            else {
                $file = str_replace('{n}', $n, $file);
            }
        }
        elseif (is_callable($file)) {
            $file = call_user_func($file, $n);
        }
        else {
            // or default value of sitemap{n}.xml
            if (1 === $n) {
                $file = 'sitemap.xml';
            }
            else {
                $file = 'sitemap' . $n . '.xml';
            }
        }
        return $file;
    }
}
