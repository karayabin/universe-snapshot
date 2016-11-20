<?php

namespace UrlFriendlyListHelper\Router;

/*
 * LingTalfi 2015-11-01
 */
interface ListRouterInterface
{

    public function getUrl(array $listParams = null);

    public function getWidgetParameters();

    public function getWidgetParameter($k, $default = null);
}
