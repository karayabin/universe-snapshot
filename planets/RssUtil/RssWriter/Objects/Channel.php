<?php

namespace RssUtil\RssWriter\Objects;

/*
 * LingTalfi 2015-10-23
 * http://www.rssboard.org/rss-specification
 */
class Channel
{

    private $title;
    private $link;
    private $description;
    private $language;
    private $copyright;
    private $managingEditor;
    private $webMaster;
    private $pubDate;
    private $lastBuildDate;
    private $category;
    private $generator;
    private $docs;
    private $cloud;
    private $ttl;
    private $image;
    private $rating;
    private $textInput;
    private $skipHours;
    private $skipDays;


    private $attrCategory;
    private $attrCloud;


    /**
     * @var Item[]
     */
    private $items;

    public function __construct()
    {
        $this->items = [];
        $this->attrCategory = [];
        $this->attrCloud = [];
    }

    public static function create()
    {
        return new static();
    }


    public function addItem(Item $item)
    {
        $this->items[] = $item;
        return $this;
    }

    public function getItems()
    {
        return $this->items;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function category($category, array $attr = [])
    {
        $this->category = $category;
        $this->attrCategory = $attr;
        return $this;
    }

    public function cloud($cloud, array $attr = [])
    {
        $this->cloud = $cloud;
        $this->attrCloud = $attr;
        return $this;
    }

    public function copyright($copyright)
    {
        $this->copyright = $copyright;
        return $this;
    }

    public function description($description)
    {
        $this->description = $description;
        return $this;
    }

    public function docs($docs)
    {
        $this->docs = $docs;
        return $this;
    }

    public function generator($generator)
    {
        $this->generator = $generator;
        return $this;
    }

    public function image(ChannelImage $image)
    {
        $this->image = $image;
        return $this;
    }

    public function language($language)
    {
        $this->language = $language;
        return $this;
    }

    public function lastBuildDate($lastBuildDate)
    {
        $this->lastBuildDate = $lastBuildDate;
        return $this;
    }

    public function link($link)
    {
        $this->link = $link;
        return $this;
    }

    public function managingEditor($managingEditor)
    {
        $this->managingEditor = $managingEditor;
        return $this;
    }

    public function pubDate($pubDate)
    {
        $this->pubDate = $pubDate;
        return $this;
    }

    public function rating($rating)
    {
        $this->rating = $rating;
        return $this;
    }

    public function skipDays(ChannelSkipDays $skipDays)
    {
        $this->skipDays = $skipDays;
        return $this;
    }

    public function skipHours(ChannelSkipHours $skipHours)
    {
        $this->skipHours = $skipHours;
        return $this;
    }

    public function textInput($textInput)
    {
        $this->textInput = $textInput;
        return $this;
    }

    public function title($title)
    {
        $this->title = $title;
        return $this;
    }

    public function ttl($ttl)
    {
        $this->ttl = $ttl;
        return $this;
    }

    public function webMaster($webMaster)
    {
        $this->webMaster = $webMaster;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    public function getCategory()
    {
        return $this->category;
    }

    public function getCloud()
    {
        return $this->cloud;
    }

    public function getCopyright()
    {
        return $this->copyright;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDocs()
    {
        return $this->docs;
    }

    public function getGenerator()
    {
        return $this->generator;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getLastBuildDate()
    {
        return $this->lastBuildDate;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getManagingEditor()
    {
        return $this->managingEditor;
    }

    public function getPubDate()
    {
        return $this->pubDate;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getSkipDays()
    {
        return $this->skipDays;
    }

    public function getSkipHours()
    {
        return $this->skipHours;
    }

    public function getTextInput()
    {
        return $this->textInput;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getTtl()
    {
        return $this->ttl;
    }

    public function getWebMaster()
    {
        return $this->webMaster;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getAttrCategory()
    {
        return $this->attrCategory;
    }

    public function getAttrCloud()
    {
        return $this->attrCloud;
    }

}
