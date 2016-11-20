<?php

namespace RssUtil\RssWriter\Objects;

/*
 * LingTalfi 2015-10-23
 * http://www.rssboard.org/rss-specification
 */
class ChannelSkipHours
{

    private $hours;

    public function __construct()
    {
        $this->hours = [];
    }


    public static function create()
    {
        return new static();
    }

    public function addHour($hour)
    {
        $this->hours[] = $hour;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getHours()
    {
        return $this->hours;
    }

}
