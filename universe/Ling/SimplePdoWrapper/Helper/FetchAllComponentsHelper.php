<?php


namespace Ling\SimplePdoWrapper\Helper;


use Ling\SimplePdoWrapper\Util\Where;

/**
 * The FetchAllComponentsHelper class.
 */
class FetchAllComponentsHelper
{


    /**
     * Parses the given components array, and if one of them is a Where component, merges it with the given Where instance.
     *
     * @param Where $where
     * @param array $components
     */
    public static function mergeWhereByComponents(Where $where, array $components)
    {
        foreach ($components as $component) {
            if ($component instanceof Where) {
                $where->merge($component);
                break;
            }
        }
    }
}