<?php


namespace Kamille\Mvc\HtmlPageHelper;


class HtmlPageHelper
{
    public static $title;
    public static $description;
    private static $keywords = [];
    private static $listCss = [];
    private static $listJs = [];
    private static $meta = [];
    //
    private static $loadedJsLibs = [];
    private static $bodyClasses = [];
    private static $bodyAttributes = [];


    public static function displayHead()
    {
        echo "<head>" . PHP_EOL;


        if (null !== self::$title) {
            echo "\t" . '<title>' . self::$title . '</title>' . PHP_EOL;
        }

        if (null !== self::$description) {
            echo "\t" . '<meta name="description" content="' . htmlspecialchars(self::$description) . '">' . PHP_EOL;
        }


        foreach (self::$meta as $attr) {
            echo "\t" . '<meta ' . self::htmlAttributes($attr) . '>' . PHP_EOL;
        }

        self::displayHeadAssets();

        echo "</head>" . PHP_EOL;
    }


    public static function addKeywords(array $keyWords)
    {
        foreach ($keyWords as $word) {
            self::$keywords[] = $word;
        }
    }

    public static function addBodyClass($cssClass)
    {
        self::$bodyClasses[] = $cssClass;
    }

    public static function addBodyAttribute($attrName, $attrValue)
    {
        self::$bodyAttributes[$attrName] = $attrValue;
    }

    public static function displayOpeningBodyTag()
    {
        $attr = [];

        if (count(self::$bodyAttributes) > 0) {
            $attr = self::$bodyAttributes;
        }
        if (count(self::$bodyClasses) > 0) {
            $attr['class'] = implode(" ", self::$bodyClasses);
        }
        echo '<body' . self::htmlAttributes($attr) . '>' . PHP_EOL;
    }


    public static function addMeta(array $attributes)
    {
        self::$meta[] = $attributes;
    }


    public static function css($url, $libName = null, array $htmlAttributes = null)
    {
        self::$listCss[$url] = [$htmlAttributes, $libName];
    }

    // inHead: if false, is displayed just before the body end
    public static function js($url, $libName = null, array $htmlAttributes = null, $inHead = true)
    {
        self::$listJs[$url] = [$htmlAttributes, $libName, $inHead];
    }

    private static function displayHeadAssets()
    {

        //--------------------------------------------
        // CSS
        //--------------------------------------------
        $cssLibs = [];
        foreach (self::$listCss as $url => $item) {
            $s = (null === $item[0]) ? '' : self::htmlAttributes($item[0]);
            $lib = $item[1];

            if (null !== $lib) {
                if (false === array_key_exists($lib, $cssLibs)) {
                    $cssLibs[$lib] = true;
                } else {
                    continue;
                }
            }

            echo "\t" . '<link rel="stylesheet" href="' . htmlspecialchars($url) . '"' . $s . '>' . PHP_EOL;

        }


        //--------------------------------------------
        // JS
        //--------------------------------------------
        foreach (self::$listJs as $url => $item) {

            $s = (null === $item[0]) ? '' : self::htmlAttributes($item[0]);
            $lib = $item[1];
            $inHead = $item[2];
            if (false === $inHead) {
                continue;
            }
            if (null !== $lib) {
                if (false === array_key_exists($lib, self::$loadedJsLibs)) {
                    self::$loadedJsLibs[$lib] = true;
                } else {
                    continue;
                }
            }

            echo "\t" . '<script src="' . htmlspecialchars($url) . '"' . $s . '></script>' . PHP_EOL;

        }
    }


    public static function displayBodyEndAssets($displayBodyEnd = true)
    {
        echo PHP_EOL;
        foreach (self::$listJs as $url => $item) {

            $s = (null === $item[0]) ? '' : self::htmlAttributes($item[0]);
            $lib = $item[1];
            $inHead = $item[2];
            if (true === $inHead) {
                continue;
            }
            if (null !== $lib) {
                if (false === array_key_exists($lib, self::$loadedJsLibs)) {
                    self::$loadedJsLibs[$lib] = true;
                } else {
                    continue;
                }
            }

            echo "\t" . '<script src="' . htmlspecialchars($url) . '"' . $s . '></script>' . PHP_EOL;

        }
        if (true === $displayBodyEnd) {
            echo '</body>' . PHP_EOL;
        }
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    private static function htmlAttributes(array $attributes)
    {
        $s = '';
        foreach ($attributes as $k => $v) {
            if (is_numeric($k)) {
                $s .= ' ';
                $s .= htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
            } else {
                if (null !== $v) {
                    $s .= ' ';
                    $s .= htmlspecialchars($k, ENT_QUOTES, 'UTF-8') . '="' . htmlspecialchars($v, ENT_QUOTES, 'UTF-8') . '"';
                }
            }
        }
        return $s;
    }


}


