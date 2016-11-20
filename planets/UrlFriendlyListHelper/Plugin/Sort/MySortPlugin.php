<?php

namespace UrlFriendlyListHelper\Plugin\Sort;

/*
 * LingTalfi 2015-11-03
 * 
 * Ideas:
 *      - it passes the id in the url rather than the sort and direction parameters
 *      - the technique used to make the html widget compliant with the application router's logic is to 
 *              let the application (php) generate a format string with tags, and javascript would replace only
 *              those tags.
 *              /complicated/application/logic/url/params/currentPage=1/${idKey}=${idValue}/blabla
 * 
 *              This url is called urlModel in this document.
 * 
 * 
 */


use Bat\StringTool;
use UrlFriendlyListHelper\Plugin\BaseListHelperPlugin;

class MySortPlugin extends BaseListHelperPlugin
{

    private static $cpt = 1;

    /**
     * array of id => info
     *      with info:
     *              - sort field
     *              - sort direction (0=asc, 1=desc)
     *              - label
     */
    private $selectEntries;
    private $selectAttr;
    private $defaultSortId;
    private $suffix;

    public function __construct()
    {
        $this->selectEntries = [];
        $this->selectAttr = [];
        $this->defaultSortId = '';
    }

    /**
     * @return array of k => v,
     *
     *      where k is the parameter name,
     *      and v the default value.
     */
    public function getDefaultWidgetParameters()
    {
        return [
            'sortId' => $this->defaultSortId,
        ];
    }


    public static function create()
    {
        return new static();
    }

    public function renderHtml()
    {
        $s = '';

        $keyName = $this->getConcreteName('sortId');
        $urlModel = $this->listHelper->getRouter()->getUrl([
            $keyName => '__sortIdValue__',
        ]);


        $curValue = $this->listHelper->getRouter()->getWidgetParameter($keyName);


        // get unique id
        $formId = 'my_sort_plugin_';
        $suffix = $this->suffix;
        if (null === $suffix) {
            $suffix = self::$cpt++;
        }
        $formId .= $suffix;


        $s .= '<form id="' . htmlspecialchars($formId) . '" method="get" action="none">' . PHP_EOL;
        $s .= '<select data-id="the_select" name="' . $keyName . '"' . StringTool::htmlAttributes($this->selectAttr) . '>' . PHP_EOL;
        foreach ($this->selectEntries as $id => $v) {
            $sSel = ($curValue === $id) ? ' selected="selected"' : '';
            $s .= '<option' . $sSel . ' value="' . $id . '">' . $v[0] . '</option>' . PHP_EOL;
        }
        $s .= '</select>' . PHP_EOL;
        $s .= '<input data-id="the_button" type="submit" value="ok" />';
        $s .= '</form>';


        $s .= '<script>';
        $code = file_get_contents(__DIR__ . '/MySortPlugin.js');
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

    public function setWidgetParameter($key, $value)
    {
        parent::setWidgetParameter($key, $value);
        if (array_key_exists($value, $this->selectEntries)) {
            $info = $this->selectEntries[$value];
            parent::setWidgetParameter('sort', $info[1]);
            parent::setWidgetParameter('sens', $info[2]);
        }
    }


    public function setSelectEntries(array $selectEntries)
    {
        $this->selectEntries = $selectEntries;
        return $this;
    }

    public function setSelectAttr(array $selectAttr)
    {
        $this->selectAttr = $selectAttr;
        return $this;
    }

    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
        return $this;
    }

    public function setDefaultSortId($defaultSortId)
    {
        $this->defaultSortId = $defaultSortId;
        return $this;
    }
    
    

}
