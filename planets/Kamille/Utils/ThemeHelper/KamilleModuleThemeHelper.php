<?php


namespace Kamille\Utils\ThemeHelper;


use Kamille\Mvc\HtmlPageHelper\HtmlPageHelper;

class KamilleModuleThemeHelper
{

    public static function css($fileName)
    {
        $moduleName = static::getModuleName();
//        HtmlPageHelper::css("/theme/_default_/modules/$moduleName/css/$fileName"); // ?
//        HtmlPageHelper::css("/theme/$themeName/modules/$moduleName/css/$fileName"); // ?
        HtmlPageHelper::css("/modules/$moduleName/css/$fileName");
    }


    public static function js($fileName)
    {
        $moduleName = static::getModuleName();
        HtmlPageHelper::css("/modules/$moduleName/js/$fileName");
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected static function getModuleName(): string // override me
    {
        return "ThisApp";
    }
}