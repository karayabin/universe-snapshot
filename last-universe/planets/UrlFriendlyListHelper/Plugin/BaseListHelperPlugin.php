<?php

namespace UrlFriendlyListHelper\Plugin;

/*
 * LingTalfi 2015-11-01
 */
use UrlFriendlyListHelper\ItemGenerator\ItemGeneratorInterface;
use UrlFriendlyListHelper\ItemGeneratorHelper\ItemGeneratorHelperInterface;
use UrlFriendlyListHelper\ListHelper\ListHelperInterface;
use UrlFriendlyListHelper\Tool\UrlFriendlyListHelperTool;


abstract class BaseListHelperPlugin implements ListHelperPluginInterface
{

    /**
     * @var ListHelperInterface
     */
    protected $listHelper;
    protected $widgetParams;
    protected $pluginParams;

    /**
     * @var ItemGeneratorHelperInterface
     */
    protected $generatorHelper;

    public function __construct()
    {
        $this->pluginParams = [];
    }


    public function setListHelper(ListHelperInterface $h)
    {
        $this->listHelper = $h;
        return $this;
    }


    public function setWidgetParameter($key, $value)
    {
        $this->widgetParams[$key] = $value;
    }


    public function prepare(array $pluginParams)
    {

    }

    public function meetGenerator(ItemGeneratorInterface $g)
    {

    }

    public function prepareGeneratorParameter($name, $value, &$allParams)
    {
        $allParams[$name] = $value;
    }

    public function setGeneratorHelper(ItemGeneratorHelperInterface $generatorHelper)
    {
        $this->generatorHelper = $generatorHelper;
        $generatorHelper->setPlugin($this);
        return $this;
    }

    /**
     * @return ItemGeneratorHelperInterface
     */
    public function getGeneratorHelper()
    {
        return $this->generatorHelper;
    }

    public function getPluginParam($key, $default = null)
    {
        if (array_key_exists($key, $this->pluginParams)) {
            return $this->pluginParams[$key];
        }
        trigger_error("plugin param not found: $key", E_USER_WARNING);
        return $default;
    }

    public function getWidgetParamOrDefault($key, $default = null)
    {
        if (array_key_exists($key, $this->widgetParams)) {
            return $this->widgetParams[$key];
        }
        return $default;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function error($m)
    {
        throw new \Exception($m);
    }

    protected function getConcreteName($name)
    {
        return UrlFriendlyListHelperTool::getConcreteName($name, $this->listHelper->getSuffix());
    }
}
