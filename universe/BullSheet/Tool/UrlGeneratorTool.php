<?php

namespace BullSheet\Tool;

/*
 * LingTalfi 2016-02-12
 */
use Bat\CaseTool;

class UrlGeneratorTool
{

    public static function fakeFacebook($name)
    {
        return 'https://www.facebook.com/' . CaseTool::toFlea($name);
    }

    public static function fakeTwitter($name)
    {
        return 'https://www.twitter.com/' . CaseTool::toSnake($name);
    }

    public static function fakeLinkedin($name)
    {
        return 'https://www.linkedin.com/in/' . urlencode(CaseTool::toDog($name) . "-" . strtolower(CharGeneratorTool::alphaNumericChars(9)));
    }

    public static function fakeGooglePlus()
    {
        return 'https://plus.google.com/' . CharGeneratorTool::numbers(21);
    }


}
