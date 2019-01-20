<?php

namespace UrlFriendlyListHelper\Router;

/*
 * LingTalfi 2015-11-01
 */
class AuthorListRouter implements ListRouterInterface
{
    private $widgetParams;
    private $widgetParamsExtractor;
    private $urlGenerator;

    public function __construct()
    {
        $this->widgetParams = [];
    }

    public static function create()
    {
        return new static();
    }


    public function getWidgetParameters()
    {
        return $this->widgetParams;
    }

    public function getWidgetParameter($k, $default = null)
    {
        if (array_key_exists($k, $this->widgetParams)) {
            return $this->widgetParams[$k];
        }
        return $default;
    }

    public function getUrl(array $widgetParams = null)
    {
        if (is_array($widgetParams)) {
            $widgetParams = array_replace($this->widgetParams, $widgetParams);
        }
        else {
            $widgetParams = $this->widgetParams;
        }
        return call_user_func($this->urlGenerator, $widgetParams);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function start()
    {
        $this->widgetParams = call_user_func($this->widgetParamsExtractor);
        return $this;
    }


    public function setUrlGenerator(callable $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
        return $this;
    }

    public function setListParametersExtractor(callable $widgetParamsExtractor)
    {
        $this->widgetParamsExtractor = $widgetParamsExtractor;
        return $this;
    }


}
