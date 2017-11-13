<?php


namespace SokoForm\Util;


class SokoUtil
{


    /**
     * This is a helper primarily designed for the SokoFormRenderer object.
     *
     * It injects/merges the css class into the attributes property of the
     * given preferences array.
     * If the attributes does not exist, it's created.
     *
     *
     * @param $cssClass
     * @param array $preferences
     */
    public static function addCssClassToPreferencesAttributes($cssClass, array &$preferences)
    {
        /**
         * Adding attributes, or merging if it's already set by the user.
         */
        $attr = [];
        if (array_key_exists("attributes", $preferences)) {
            $attr = $preferences['attributes'];
            if (array_key_exists("class", $attr)) {
                $cssClasses = explode(" ", $attr['class']);
                $cssClasses[] = $cssClass;
                $cssClasses = array_unique($cssClasses);
                $attr['class'] = implode(" ", $cssClasses);
            } else {
                $attr['class'] = $cssClass;
            }
        } else {
            $attr['class'] = $cssClass;
        }
        $preferences["attributes"] = $attr;
    }
}