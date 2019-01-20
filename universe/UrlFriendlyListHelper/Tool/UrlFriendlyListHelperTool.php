<?php

namespace UrlFriendlyListHelper\Tool;

/*
 * LingTalfi 2015-11-04
 */
class UrlFriendlyListHelperTool
{

    public static function getConcreteName($name, $suffix)
    {
        $newName = $name;
        if ($suffix > 1) {
            $newName .= $suffix;
        }
        return $newName;
    }
}
