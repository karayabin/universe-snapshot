<?php

namespace Uri2PageRouter\Module;

/*
 * LingTalfi 2015-12-03
 * 
 * 
 * The conception behind this class is the following.
 * An uri always start with a slash.
 * 
 * An uri is composed of two elements:
 * 
 * - baseUri
 * - queryString (preceded by the question mark symbol)
 * 
 * There are two types of baseUri:
 * 
 * - static
 * - dynamic
 * 
 * Static baseUris are addressed with a simple map which keys and values are the 
 * baseUris and the corresponding page respectively.
 * Note that there might be more than one uri pointing to the same page.
 * 
 * A dynamic uri is an uri that maps to a dynamic page.
 * A dynamic page is a page which contents will change depending on an identifier.
 * The dynamic uri structure is the following:
 * 
 * - dynamic uri: <slash> <urlSpace> <slash> <identifier>
 * 
 * For instance if you create a website where each user has her own account,
 * you might want to use a dynamic uri that could look like this:
 * 
 *      /user/lingtalfi
 * 
 * Where:
 *      user is the urlSpace, 
 *      lingtalfi is the identifier
 * 
 * Dynamic uri is recognized as such only if the first component of the uri is a well known
 * urlSpace. If this is the case, the identifier is passed via the request parameters,
 * using the uriIdentifier key. 
 * 
 * 
 * 
 * 
 * 
 */

use Uri2PageRouter\Uri2PageRouterInterface;

class SimpleMapRouterModule implements RouterModuleInterface, LinkGeneratorInterface
{

    private $uri2Pages;
    private $pages2Uri;

    public function __construct()
    {
        $this->uri2Pages = [];
    }

    public static function create()
    {
        return new static();
    }


    public function parseUri($baseUri, Uri2PageRouterInterface $router)
    {
        $ret = false;
        if (array_key_exists($baseUri, $this->uri2Pages)) {
            return $this->uri2Pages[$baseUri];
        }
        return $ret;
    }


    public function generate($string, array $params)
    {
        if (array_key_exists($string, $this->getPages2Uri())) {
            return $this->pages2Uri[$string];
        }
        return false;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setUri2Pages(array $uri2Pages)
    {
        $this->uri2Pages = $uri2Pages;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getPages2Uri()
    {
        if (null === $this->pages2Uri) {
            $this->pages2Uri = array_flip(array_unique($this->uri2Pages));
        }
        return $this->pages2Uri;
    }
}
