<?php

namespace SitemapBuilderBox\Objects;

/*
 * LingTalfi 2015-10-10
 * https://support.google.com/webmasters/answer/178636?hl=en
 */
class Image
{

    // required
    public $loc;
    
    // optional
    public $caption;
    public $geoLocation;
    public $title;
    public $licence;
    
    
    
    public static function create()
    {
        return new self;
    }

    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }

    public function setGeoLocation($geoLocation)
    {
        $this->geoLocation = $geoLocation;
        return $this;
    }

    public function setLicence($licence)
    {
        $this->licence = $licence;
        return $this;
    }

    public function setLoc($loc)
    {
        $this->loc = $loc;
        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    
}
