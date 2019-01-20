<?php

namespace UrlFriendlyListHelper\Plugin;

/*
 * LingTalfi 2015-11-01
 */

use UrlFriendlyListHelper\ItemGenerator\ItemGeneratorInterface;
use UrlFriendlyListHelper\ItemGeneratorHelper\ItemGeneratorHelperInterface;
use UrlFriendlyListHelper\ListHelper\ListHelperInterface;

interface ListHelperPluginInterface
{

    public function setListHelper(ListHelperInterface $h);

    /**
     * @return array of k => v,
     *
     *      where k is the abstract parameter name,
     *      and v the default value.
     */
    public function getDefaultWidgetParameters();

    public function setWidgetParameter($key, $value);


    public function meetGenerator(ItemGeneratorInterface $g);

    public function renderHtml();


    public function prepareGeneratorParameter($name, $value, &$allParams);

    public function setGeneratorHelper(ItemGeneratorHelperInterface $h);

    /**
     * @return ItemGeneratorHelperInterface
     */
    public function getGeneratorHelper();


    public function getPluginParam($key, $fallback = null);

    public function getWidgetParamOrDefault($key, $default = null);
}
