<?php

namespace Ling\SitemapBuilderBox;

/*
 * LingTalfi 2015-10-08
 * Just a front end interface for the various SitemapBuilder (xml, text, syndication feed).
 * 
 * 
 */
use Ling\Bat\FileSystemTool;
use Ling\SitemapBuilderBox\Objects\Sitemap;
use Ling\SitemapBuilderBox\Builder\TextSitemapBuilder;
use Ling\SitemapBuilderBox\Builder\XmlSitemapBuilder;

class SitemapBuilder
{

    public function createSitemapFile(Sitemap $sitemap, $file, $format = 'xml', $compression = 'auto')
    {
        $ext = strtolower(FileSystemTool::getFileExtension($file));
        switch ($format) {
            case 'xml':
                $o = new XmlSitemapBuilder();
                if ($this->isGz($ext, $compression)) {
                    $data = $o->createSitemapFile($sitemap);
                    $this->compressWithGz($file, $data);
                }
                else {
                    $o->createSitemapFile($sitemap, $file);
                }
                break;
            case 'text':
                $o = new TextSitemapBuilder();
                if ($this->isGz($ext, $compression)) {
                    $data = $o->createSitemapFile($sitemap);
                    $this->compressWithGz($file, $data);
                }
                else {
                    $o->createSitemapFile($sitemap, $file);
                }
                break;
            default:
                $this->error("Invalid format: $format");
                break;
        }
        return $this;
    }


    public static function create()
    {
        return new self;
    }


    private function isGz($ext, $compression)
    {
        if (
            ('gz' === $ext && 'auto' === $compression)
            ||
            'gz' === $compression
        ) {
            return true;
        }
        return false;
    }

    private function compressWithGz($file, $data)
    {

        FileSystemTool::touchDone($file);
        if (false !== ($gzData = gzencode($data))) {
            if (false !== ($fp = fopen($file, "w"))) {
                (false !== fwrite($fp, $gzData)) || $this->error("Cannot write to file $file");
                fclose($fp);
            }
            else {
                $this->error("Could not open the file $file");
            }
        }
        else {
            $this->error("Could not gzencode the data");
        }
    }

    private function error($m)
    {
        throw new \Exception($m);
    }

}
