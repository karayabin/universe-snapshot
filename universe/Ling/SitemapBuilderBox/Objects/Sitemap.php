<?php

namespace Ling\SitemapBuilderBox\Objects;

/*
 * LingTalfi 2015-10-07
 */
use Ling\SitemapBuilderBox\Exception\SitemapBuilderException;

class Sitemap
{

    private $urlSetAttributes;
    private $urls;

    public function __construct()
    {
        $this->urlSetAttributes = [
            'xmlns' => 'http://www.sitemaps.org/schemas/sitemap/0.9',
        ];
        $this->urls = [];
    }

    public static function create()
    {
        return new self;
    }


    /**
     * @return Url[]
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * @return $this
     */
    public function addUrl($url)
    {
        
        if ($url instanceof Url) {
            $this->urls[] = $url;
        }
        elseif (is_array($url)) {
            $o = new Url();
            foreach ($url as $k => $v) {
                $o[$k] = $v;
            }
            $this->urls[] = $o;
        }
        elseif (is_string($url)) {
            $o = new Url();
            $o->loc = $url;
            $this->urls[] = $o;
        }
        else {
            $this->error(sprintf("Invalid url type: Sitemap/Url or array or string expected, %s given", gettype($url)));
        }
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function error($m)
    {
        throw new SitemapBuilderException($m);
    }
}
