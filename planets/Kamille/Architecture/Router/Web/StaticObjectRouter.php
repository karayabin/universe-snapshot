<?php


namespace Kamille\Architecture\Router\Web;


use Kamille\Architecture\Request\Web\HttpRequestInterface;
use Kamille\Architecture\Router\RouterInterface;
use Router\Exception\RouterException;


/**
 * This router will instantiate a Controller from a controllerString
 * returned from the uri2Controller array.
 *
 * The controllerString has the following format:
 *
 * - <controllerFullPath> <:> <method>
 *
 */
class StaticObjectRouter implements RouterInterface
{

    protected $uri2Controller;

    public function __construct()
    {
        $this->uri2Controller = [];
    }

    public static function create()
    {
        return new static();
    }

    public function setUri2Controller(array $uri2Controller)
    {
        $this->uri2Controller = $uri2Controller;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function match(HttpRequestInterface $request)
    {
        $uri = $request->uri(false);
        $uri2Controller = $this->uri2Controller;
        if (array_key_exists($uri, $uri2Controller)) {
            $controllerString = $uri2Controller[$uri];
            $p = explode(':', $controllerString, 2);
            if (2 === count($p)) {
                $o = new $p[0];
                return [
                    [$o, $p[1]],
                    [],
                ];
            }
            throw new RouterException("invalid controller string format: expected format is controllerFullPath:method");
        }
    }
}