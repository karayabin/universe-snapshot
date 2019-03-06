<?php

namespace Ling\SitemapBuilderBox\Tool;

/*
 * LingTalfi 2015-10-07
 */
class SitemapBuilderTool
{



    // seems that php doesn't escape the single quote entity as one would expect.
    public static function escapeSingleQuoteEntity($s)
    {
        return str_replace("'", '&apos;', $s);
    }

}
