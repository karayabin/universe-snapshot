<?php

namespace UrlFriendlyListHelper\Displayer;

/*
 * LingTalfi 2015-11-01
 */
class PuppyBaseDisplayer
{

    public static function create()
    {
        return new static();
    }

    public function renderHtml(array $rows)
    {
        $s = '';
        foreach ($rows as $row) {
            foreach ($row as $k => $v) {
                $s .= "$k: $v<br>";
            }
            $s .= '<hr>';
        }
        return $s;
    }
}
