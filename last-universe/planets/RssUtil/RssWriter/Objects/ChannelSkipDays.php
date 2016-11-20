<?php

namespace RssUtil\RssWriter\Objects;

/*
 * LingTalfi 2015-10-23
 * http://www.rssboard.org/rss-specification
 */
class ChannelSkipDays
{

    private $days;

    public function __construct()
    {
        $this->days = [];
    }


    public static function create()
    {
        return new static();
    }

    public function addDay($day)
    {
        $this->days[] = $day;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getDays()
    {
        return $this->days;
    }

}
