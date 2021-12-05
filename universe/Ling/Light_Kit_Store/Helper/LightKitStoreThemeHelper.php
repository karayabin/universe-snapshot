<?php


namespace Ling\Light_Kit_Store\Helper;

/**
 * The LightKitStoreThemeHelper class.
 *
 *
 * About weak/strong links
 * -------
 *
 * Weak links are opposed to strong links, so that you basically have two link colors to play with.
 *
 * You can interpret the weak/strong the way you like.
 *
 * You could for instance use strong links on important information, such as title, prices...
 * You could for instance use weak links on less important information, such as a product characteristic, the number of evaluations, ...
 *
 * Note: both the weak and strong links resolve to the unique link hover color when hovered upon.
 *
 */
class LightKitStoreThemeHelper
{

    /**
     * Returns the link hover color, depending on the chosen theme.
     *
     *
     *
     * @return string
     */
    public static function getLinkHoverColor(): string
    {
        return "#952c2c";
    }


    /**
     * Returns the star color, depending on the chosen theme.
     *
     *
     *
     * @return string
     */
    public static function getStarColor(): string
    {
        return "#ff9b00";
    }


    /**
     * Returns the weak link color, depending on the chosen theme.
     * See the class notes for more details.
     *
     * @return string
     */
    public static function getWeakLinkColor(): string
    {
        return "#007185";
    }

    /**
     * Returns the strong link color, depending on the chosen theme.
     * See the class notes for more details.
     * @return string
     */
    public static function getStrongLinkColor(): string
    {
        return "#0F1111";
    }
}