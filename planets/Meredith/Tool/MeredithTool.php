<?php

namespace Meredith\Tool;

/**
 * LingTalfi 2015-12-29
 */
class MeredithTool
{

    public static function jsQuoteEscape($s)
    {
        return str_replace('"', '\"', $s);
    }
}