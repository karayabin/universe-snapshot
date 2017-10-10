<?php


namespace Kamille\Utils\Laws\ThemeCollection;


use Kamille\Utils\Laws\Theme\LawsThemeInterface;

class ThemeCollection
{

    private static $themes = [];

    /**
     * @return LawsThemeInterface|false
     */
    public static function getTheme($theme)
    {
        if (!array_key_exists($theme, self::$themes)) {
            $theme = ucfirst($theme);
            $class = 'Theme\\' . $theme . "Theme";
            if (class_exists($class)) {
                self::$themes[$theme] = new $class;
            } else {
                self::$themes[$theme] = false;
            }
        }
        return self::$themes[$theme];
    }
}