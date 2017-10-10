<?php


namespace Kamille\Utils\ThemeHelper;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Mvc\HtmlPageHelper\HtmlPageHelper;

class KamilleThemeHelper
{
    public static function css($fileName)
    {
        $url = "/theme/" . ApplicationParameters::get("theme") . '/css/' . $fileName;
        HtmlPageHelper::css($url);
    }

    public static function js($fileName)
    {
        $url = "/theme/" . ApplicationParameters::get("theme") . '/js/' . $fileName;
        HtmlPageHelper::js($url);
    }

    public static function loadJsInitFile(array $model, $lazy = true)
    {
        $d = $model['__DIR__'];
        $f = $d . "/init.js.php";
        if (file_exists($f)) {
            if (true === $lazy) {
                ob_start();
                $v = $model;
                include $f;
                $s = ob_get_clean();
                HtmlPageHelper::addBodyEndSnippet($s);
            } else {
                $v = $model;
                include $f;
            }
        }
    }
}