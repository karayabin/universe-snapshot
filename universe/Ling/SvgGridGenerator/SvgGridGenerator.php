<?php

namespace Ling\SvgGridGenerator;

/*
 * LingTalfi 2016-09-04
 */
class SvgGridGenerator
{


    public static function generate(int $nbColumns, $columnWidth, $gutter = null): array
    {
        $arr = [];
        $current = 0;
        $sw = false;
        
        if(null !== $gutter){
            $nbColumns *= 2;
        }
        
        for ($i = 0; $i < $nbColumns; $i++) {
            if (null === $gutter) {
                $current += $columnWidth;
                $arr[] = $current;
            }
            else {
                if (false === $sw) {
                    $current += $columnWidth;
                }
                else {
                    $current += $gutter;
                }
                $arr[] = $current;
                $sw = !$sw;
            }
        }
        return $arr;
    }


}