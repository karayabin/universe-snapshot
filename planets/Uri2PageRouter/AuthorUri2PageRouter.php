<?php

namespace Uri2PageRouter;

/*
 * LingTalfi 2015-12-04
 * 
 * In this conception:
 * 
 * - the first question mark found in the uri always start the query string.
 * - we work with the utf-8 encoding (mb_internal_encoding).
 * - an uri always start with a slash
 * - if the uri is not just slash (/) and the last char is a slash, then the trailing slash is removed
 *                  so that /my/uri and /my/uri/ point to the same page automatically. 
 * 
 */
use Bat\UriTool;
use Uri2PageRouter\Module\LinkGeneratorInterface;
use Uri2PageRouter\Module\RouterModuleInterface;
use Uri2PageRouter\UriInfo\UriInfo;

class AuthorUri2PageRouter implements Uri2PageRouterInterface
{


    /**
     * @var RouterModuleInterface[]
     */
    private $modules;
    private $uri;
    private $params;

    public function __construct()
    {
        $this->modules = [];
        $this->params = [];
    }

    public static function create()
    {
        return new static();
    }

    /**
     * Analyzes the uri from the incoming http request and returns
     * the corresponding page, or false if no correspondence was found.
     *
     * It also updates the UriInfo object, from which one can access the baseUri
     * and the uri parameters.
     *
     *
     *
     * @return false|string
     */
    public function listen()
    {
        $page = false;
        if (null === $this->uri) {
            $this->uri = urldecode($_SERVER['REQUEST_URI']);
        }


        // last slash removal
        if ('/' !== $this->uri && '/' === substr($this->uri, -1)) {
            $this->uri = substr($this->uri, 0, -1);
        }


        // query string removal
        if (false !== ($pos = strpos($this->uri, '?'))) {
            $this->uri = substr($this->uri, 0, $pos);
        }


        $this->params = $_GET;
        foreach ($this->modules as $module) {
            if (false !== $page = $module->parseUri($this->uri, $this)) {
                break;
            }
        }
        return $page;
    }

    public function getParameter($key, $default = false)
    {
        if (array_key_exists($key, $this->params)) {
            return $this->params[$key];
        }
        return $default;
    }

    public function getParameters()
    {
        return $this->params;
    }

    public function setParameter($key, $value)
    {
        $this->params[$key] = $value;
        return $this;
    }


    public function getLink($string, array $params = [], array $requestParameters = [])
    {
        foreach ($this->modules as $m) {
            if ($m instanceof LinkGeneratorInterface) {
                if (false !== $uri = $m->generate($string, $params)) {
                    return UriTool::appendQueryString($uri, $requestParameters);
                }
            }
        }
        return false;
    }


    public function addModule(RouterModuleInterface $module)
    {
        $this->modules[] = $module;
        return $this;
    }


    /**
     * @param $uri , an urldecoded uri
     * @return $this
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }
}
