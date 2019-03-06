<?php

namespace Ling\SitemapBuilderBox\Builder;

/*
 * LingTalfi 2015-10-07
 * 
 */
use Ling\Bat\FileSystemTool;
use Ling\SitemapBuilderBox\Objects\Sitemap;

class TextSitemapBuilder implements SitemapBuilderInterface
{


    public function createSitemapFile(Sitemap $sitemap, $file = null)
    {
        if (null !== $file) {
            FileSystemTool::touchDone($file);
        }
        $old = mb_internal_encoding();
        mb_internal_encoding('utf-8');

        $s = '';
        foreach ($sitemap->getUrls() as $url) {
            $s .= $url->loc . PHP_EOL;
        }
        if (null !== $file) {
            file_put_contents($file, $s);
        }
        mb_internal_encoding($old);
        if (null === $file) {
            return $s;
        }
    }
}
