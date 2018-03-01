<?php


namespace Kamille\Mvc\Theme;

use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Exception\KamilleException;
use Kamille\Mvc\Theme\ThemeWidget\Renderer\ThemeWidgetRendererInterface;


class Theme
{

    /**
     *
     * This method tries to invoke a ThemeWidgetRendererInterface object, based
     * on the given identifier,
     * and throws an exception in case of failure.
     *
     * Basically, it just prepends "Theme\$ThemeName\" in front of the given identifier.
     *
     *
     * $ThemeName comes from the application theme (which is supposed to be defined here:
     * ApplicationParameters::get("theme")).
     *
     *
     *
     * @param $identifier
     * @return ThemeWidgetRendererInterface
     * @throws \Exception
     */
    public static function getWidgetRenderer($identifier)
    {
        $themeName = ucfirst(ApplicationParameters::get("theme"));
        $class = "Theme\\$themeName\\$identifier";
        $o = new $class;
        if ($o instanceof ThemeWidgetRendererInterface) {
            return $o;
        } else {
            throw new KamilleException("Class $class should be ThemeWidgetRendererInterface object");
        }
        return $o;
    }
}