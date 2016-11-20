<?php

namespace Uri2PageRouter\Module;

/*
 * LingTalfi 2015-12-04
 */



use Uri2PageRouter\Uri2PageRouterInterface;

class DynamicUriRouterModule implements RouterModuleInterface, LinkGeneratorInterface
{

    private $uriSpace2Pages;

    public function __construct()
    {
        $this->uriSpace2Pages = [];
    }

    public static function create()
    {
        return new static();
    }


    public function parseUri($baseUri, Uri2PageRouterInterface $router)
    {
        $ret = false;

        foreach ($this->uriSpace2Pages as $uriSpace => $page) {
            if (0 === strpos($baseUri, '/' . $uriSpace . '/')) {
                $id = substr($baseUri, strlen('/' . $uriSpace . '/'));
                $router->setParameter('dynamicIdentifier', $id);
                return $page;
            }
        }
        return $ret;
    }


    public function generate($string, array $params)
    {
        if (array_key_exists('uriSpace', $params)) {
            $uriSpace = $params['uriSpace'];
            if (array_key_exists($uriSpace, $this->uriSpace2Pages)) {
                return '/' . $uriSpace . '/' . $string;
            }
        }
        return false;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setUriSpace2Pages(array $uriSpace2Pages)
    {
        $this->uriSpace2Pages = $uriSpace2Pages;
        return $this;
    }
}
