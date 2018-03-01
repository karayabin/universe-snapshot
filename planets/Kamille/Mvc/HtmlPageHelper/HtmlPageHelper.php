<?php


namespace Kamille\Mvc\HtmlPageHelper;


use Bat\StringTool;

class HtmlPageHelper
{
    public static $title;
    public static $description;
    private static $keywords = [];
    private static $listCss = [];
    private static $listJs = [];
    private static $meta = [];
    private static $metaBlocks = [];
    //
    private static $loadedJsLibs = [];
    private static $bodyClasses = [];
    private static $bodyAttributes = [];
    private static $htmlAttributes = [];
    private static $bodyEndSnippets = [];


    public static function renderPageFromContent($content)
    {

        echo '<!DOCTYPE html>' . PHP_EOL;
        echo '<html' . StringTool::htmlAttributes(HtmlPageHelper::getHtmlTagAttributes()) . '>' . PHP_EOL;
        HtmlPageHelper::displayHead();
        HtmlPageHelper::displayOpeningBodyTag();
        echo $content;
        HtmlPageHelper::displayBodyEndSection(true);
        echo '</html>' . PHP_EOL;
    }

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

        foreach (self::$metaBlocks as $str) {
            echo $str . PHP_EOL;
        }

        self::displayHeadAssets();

        echo "</head>" . PHP_EOL;
    }

    public static function getHtmlTagAttributes()
    {
        return self::$htmlAttributes;
    }

    public static function addKeywords(array $keyWords)
    {
        foreach ($keyWords as $word) {
            self::$keywords[] = $word;
        }
    }

    public static function addBodyEndSnippet($snippet)
    {

        self::$bodyEndSnippets[] = $snippet;
    }

    public static function addHtmlTagAttribute($k, $v)
    {
        self::$htmlAttributes[$k] = $v;
    }


    /**
     * html lang attribute is important for screen readers (https://www.w3schools.com/html/html_attributes.asp)
     * Example of langs:
     * - en-US
     *
     */
    public static function setLang($lang)
    {
        self::$htmlAttributes["lang"] = $lang;
    }

    public static function addBodyClass($cssClass)
    {
        self::$bodyClasses[] = $cssClass;
    }

    public static function hasBodyClass($cssClass)
    {
        return in_array($cssClass, self::$bodyClasses);
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

    public static function addMetaBlock($string)
    {
        self::$metaBlocks[] = $string;
    }


    public static function css($url, $libName = null, array $htmlAttributes = null)
    {
        self::$listCss[$url] = [$htmlAttributes, $libName];
    }

    /**
     * inHead: bool|after
     * - if true, is displayed in the head
     * - if false, is displayed just in the bodyEndSection, which is just before the html body tag end
     * - if after, is displayed after the bodyEndSection, and before the html body tag end
     *              This allows you to call the js method from your templates,
     *              and yet you still can have a general init.js file after them.
     *
     * libName: to avoid loading multiple variations of the same library.
     *              For instance, if two different widgets use jquery,
     *              - widget A use version jquery-1.13.min.js
     *              - widget B use version jquery-2.1.14.min.js
     *
     *              Then if both widgets specify libName=jquery,
     *              jquery lib will only be loaded the first time, and subsequent calls are ignored,
     *              thus preventing potential conflicts between two different versions of the same library.
     *
     *              Whichever widget declares its dependency first wins,
     *              the rest is on you!
     *
     *
     *
     */
    public static function js($url, $libName = null, array $htmlAttributes = null, $inHead = true)
    {
        self::$listJs[$url] = [$htmlAttributes, $libName, $inHead];
    }

    public static function displayHeadAssets()
    {

        //--------------------------------------------
        // CSS
        //--------------------------------------------
        $cssLibs = [];
        foreach (self::$listCss as $url => $item) {
            if (null === $item[0]) {
                $item[0] = ["rel" => "stylesheet"];
            }
            $s = self::htmlAttributes($item[0]);
            $lib = $item[1];

            if (null !== $lib) {
                if (false === array_key_exists($lib, $cssLibs)) {
                    $cssLibs[$lib] = true;
                } else {
                    continue;
                }
            }

            echo "\t" . '<link href="' . htmlspecialchars($url) . '"' . $s . '>' . PHP_EOL;

        }


        //--------------------------------------------
        // JS
        //--------------------------------------------
        foreach (self::$listJs as $url => $item) {

            $s = (null === $item[0]) ? '' : self::htmlAttributes($item[0]);
            $lib = $item[1];
            $inHead = $item[2];
            if (true !== $inHead) {
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

    public static function displayBodyEndSection($displayBodyEnd = true)
    {

        self::displayBodyEndAssets();
        self::displayBodyEndSnippets();

        if (true === $displayBodyEnd) {
            echo '</body>' . PHP_EOL;
        }
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    private static function displayBodyEndSnippets()
    {
        foreach (self::$bodyEndSnippets as $snippet) {
            echo $snippet . PHP_EOL;
        }
    }

    private static function displayBodyEndAssets()
    {
        echo PHP_EOL;
        $after = [];
        foreach (self::$listJs as $url => $item) {

            $s = (null === $item[0]) ? '' : self::htmlAttributes($item[0]);
            $lib = $item[1];
            if (null !== $lib) {
                if (false === array_key_exists($lib, self::$loadedJsLibs)) {
                    self::$loadedJsLibs[$lib] = true;
                } else {
                    continue;
                }
            }
            $inHead = $item[2];
            if (true === $inHead) {
                continue;
            } elseif ('after' === $inHead) {
                $after[] = [$url, $s];
                continue;
            }

            echo "\t" . '<script src="' . htmlspecialchars($url) . '"' . $s . '></script>' . PHP_EOL;
        }

        //
        foreach ($after as $item) {
            list($url, $s) = $item;
            echo "\t" . '<script src="' . htmlspecialchars($url) . '"' . $s . '></script>' . PHP_EOL;
        }
    }


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


