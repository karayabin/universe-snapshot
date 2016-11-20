<?php

namespace UrlFriendlyListHelper\Plugin\Search;

/*
 * LingTalfi 2015-11-04
 */


use Bat\StringTool;
use UrlFriendlyListHelper\Plugin\BaseListHelperPlugin;

class MySearchPlugin extends BaseListHelperPlugin
{
    private static $cpt = 1;
    private $suffix;
    private $inputAttr;

    public function __construct()
    {
        $this->inputAttr = [];
    }

    public function getDefaultWidgetParameters()
    {
        return [
            'search' => '',
        ];
    }


    public static function create()
    {
        return new static();
    }

    public function renderHtml()
    {
        $s = '';

        $keyName = $this->getConcreteName('search');
        $urlModel = $this->listHelper->getRouter()->getUrl([
            $keyName => '__searchValue__',
        ]);


        $curValue = $this->listHelper->getRouter()->getWidgetParameter($keyName);


        // get unique id
        $formId = 'my_search_plugin_';
        $suffix = $this->suffix;
        if (null === $suffix) {
            $suffix = self::$cpt++;
        }
        $formId .= $suffix;


        $s .= '<form id="' . htmlspecialchars($formId) . '" method="get" action="none">' . PHP_EOL;
        $s .= '<input data-id="the_input" name="' . $keyName . '" value="' . htmlspecialchars($curValue) . '"' . StringTool::htmlAttributes($this->inputAttr) . '>' . PHP_EOL;
        $s .= '<input data-id="the_button" type="submit" value="ok" />';
        $s .= '</form>';


        $s .= '<script>';
        $code = file_get_contents(__DIR__ . '/MySearchPlugin.js');
        if (false !== $code) {
            $s .= str_replace([
                    '_php_variable_id',
                    '_php_variable_urlString',
                ], [
                    $formId,
                    $urlModel,
                ],
                $code
            );
        }
        $s .= '</script>';

        return $s;
    }


    public function setInputAttr(array $attr)
    {
        $this->inputAttr = $attr;
        return $this;
    }

    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
        return $this;
    }

}
