<?php


namespace Authenticate\Util;


use Bat\ArrayTool;

class ProfileMergeTool
{


    /**
     * Merge profile1 into profile2
     */
    public static function merge(array $profile1, array $profile2)
    {
        $input = array_merge_recursive($profile1, $profile2);
        return ArrayTool::arrayUniqueRecursive($input);
    }
}