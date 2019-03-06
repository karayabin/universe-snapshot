<?php


namespace BabyYaml\Helper;
use Ling\BabyYaml\Helper\ArrayExportUtil\ArrayExportUtil;


/**
 * ArrayTool
 * @author Lingtalfi
 * 2014-08-21
 *
 */
class ArrayTool
{


    public static function export(array $array, $return = false, $style = 'php')
    {
        return ArrayExportUtil::create()->arrayExport($array, $return, $style);
    }

}
