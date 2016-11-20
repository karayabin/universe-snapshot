<?php

namespace BullSheet\Tool;

/*
 * LingTalfi 2016-02-12
 */
use Bat\CaseTool;

class UrlGeneratorTool
{

    public static function fakeFacebook(string $name): string
    {
        return 'https://www.facebook.com/' . CaseTool::toFlea($name);
    }

    public static function fakeTwitter(string $name): string
    {
        return 'https://www.twitter.com/' . CaseTool::toSnake($name);
    }

    public static function fakeLinkedin(string $name): string
    {
        return 'https://www.linkedin.com/in/' . urlencode(CaseTool::toDog($name) . "-" . strtolower(CharGeneratorTool::alphaNumericChars(9)));
    }

    public static function fakeGooglePlus(): string
    {
        return 'https://plus.google.com/' . CharGeneratorTool::numbers(21);
    }


}
