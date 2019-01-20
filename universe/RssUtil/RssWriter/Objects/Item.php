<?php

namespace RssUtil\RssWriter\Objects;

/*
 * LingTalfi 2015-10-23
 * http://www.rssboard.org/rss-specification
 */
class Item
{

    private $title;
    private $link;
    private $description;
    private $author;
    private $category;
    private $comments;
    private $enclosure;
    private $guid;
    private $pubDate;
    private $source;


    private $attrSource;
    private $attrEnclosure;
    private $attrCategory;
    private $attrGuid;

    public function __construct()
    {
        $this->attrSource = [];
        $this->attrEnclosure = [];
        $this->attrCategory = [];
        $this->attrGuid = [];
    }


    public static function create()
    {
        return new static();
    }


    public function author($author)
    {
        $this->author = $author;
        return $this;
    }

    public function category($category, array $attr = [])
    {
        $this->category = $category;
        $this->attrCategory = $attr;
        return $this;
    }

    public function comments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    public function description($description)
    {
        $this->description = $description;
        return $this;
    }

    public function enclosure($enclosure, array $attr = [])
    {
        $this->enclosure = $enclosure;
        $this->attrEnclosure = $attr;
        return $this;
    }

    public function guid($guid, array $attr = [])
    {
        $this->guid = $guid;
        $this->attrGuid = $attr;
        return $this;
    }

    public function link($link)
    {
        $this->link = $link;
        return $this;
    }

    public function pubDate($pubDate)
    {
        $this->pubDate = $pubDate;
        return $this;
    }

    public function source($source, array $attr = [])
    {
        $this->source = $source;
        $this->attrSource = $attr;
        return $this;
    }

    public function title($title)
    {
        $this->title = $title;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/


    public function getAuthor()
    {
        return $this->author;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getEnclosure()
    {
        return $this->enclosure;
    }

    public function getGuid()
    {
        return $this->guid;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getPubDate()
    {
        return $this->pubDate;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function getTitle()
    {
        return $this->title;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getAttrCategory()
    {
        return $this->attrCategory;
    }

    public function getAttrEnclosure()
    {
        return $this->attrEnclosure;
    }

    public function getAttrGuid()
    {
        return $this->attrGuid;
    }

    public function getAttrSource()
    {
        return $this->attrSource;
    }


}
