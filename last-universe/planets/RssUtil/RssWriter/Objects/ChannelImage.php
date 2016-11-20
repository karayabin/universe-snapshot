<?php

namespace RssUtil\RssWriter\Objects;

/*
 * LingTalfi 2015-10-23
 * http://www.rssboard.org/rss-specification
 */
class ChannelImage
{

    private $url;
    private $title;
    private $link;
    /**
     * Excerpt from the spec:
     *
     * Maximum value for width is 144, default value is 88.
     * Maximum value for height is 400, default value is 31.
     */
    private $width;
    private $height;
    private $description;

    public static function create()
    {
        return new static();
    }

    public function link($link)
    {
        $this->link = $link;
        return $this;
    }

    public function title($title)
    {
        $this->title = $title;
        return $this;
    }

    public function url($url)
    {
        $this->url = $url;
        return $this;
    }

    public function width($width)
    {
        $this->width = $width;
        return $this;
    }

    public function height($height)
    {
        $this->height = $height;
        return $this;
    }

    public function description($description)
    {
        $this->description = $description;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/    
    public function getLink()
    {
        return $this->link;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getDescription()
    {
        return $this->description;
    }


}
