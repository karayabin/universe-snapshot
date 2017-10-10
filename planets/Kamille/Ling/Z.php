<?php


namespace Kamille\Ling;


use Bat\UriTool;
use Kamille\Architecture\Application\Web\WebApplication;
use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Architecture\Request\Web\HttpRequestInterface;
use Kamille\Ling\Exception\LingException;
use Kamille\Utils\Routsy\LinkGenerator\ApplicationLinkGenerator;

/**
 * Trying to reduce the developer typing.
 *
 * This class was created in an environment with three RequestListeners (Router, Controller, Response),
 * as described in the kam framework.
 *
 */
class Z
{

    public static function appDir()
    {
        return WebApplication::inst()->get('app_dir');
    }


    public static function themeDir()
    {
        return WebApplication::inst()->get('app_dir') . "/theme/" . ApplicationParameters::get('theme');
    }

    public static function getUrlParam($key, $defaultValue = null, $throwEx = false)
    {
        $request = self::request(null, true);
        $u = $request->get('urlParams', []);
        if (array_key_exists($key, $u)) {

            return urldecode($u[$key]);
        }
        if (true === $throwEx) {
            throw new LingException("urlParam not set: $key");
        }
        return $defaultValue;
    }


    /**
     * @return HttpRequestInterface
     */
    public static function request($defaultValue = null, $throwEx = false)
    {
        $request = WebApplication::inst()->get('request');
        if (null !== $request) {
            return $request;
        }
        if (true === $throwEx) {
            throw new LingException("request is not set yet (called to soon?)");
        }
        return $defaultValue;
    }


    /**
     * @return mixed
     */
    public static function requestParam($key, $defaultValue = null)
    {
        $request = WebApplication::inst()->get('request');
        if ($request instanceof HttpRequestInterface) {
            return $request->get($key, $defaultValue);
        }
        return $defaultValue;
    }


    public static function uri($uri = null, array $params = [], $replace = true, $absolute = false)
    {
        // assuming we are not using a cli environment
        if (null === $uri) {
            $uri = $_SERVER['REQUEST_URI'];
            $p = explode("?", $uri, 2);
            $uri = $p[0];
        }

        if (false === $replace) {
            $params = array_merge($_GET, $params);
        }

        $prefix = "";
        if (true === $absolute) {
            $prefix = UriTool::getWebsiteAbsoluteUrl();
        }
        return $prefix . UriTool::appendQueryString($uri, $params);

    }
}