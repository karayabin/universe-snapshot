<?php


namespace Kamille\Architecture\Router\Web;


use Kamille\Architecture\Request\Web\HttpRequestInterface;
use Kamille\Architecture\Router\Helper\RouterHelper;
use Kamille\Architecture\Router\Web\WebRouterInterface;



/**
 * This router will instantiate a Controller from a controllerString
 * returned from the uri2Controller array.
 *
 * The controllerString has the following format:
 *
 * - <controllerFullPath> <:> <method>
 *
 */
class StaticObjectRouter implements WebRouterInterface
{

    protected $uri2Controller;
    protected $defaultController;

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

    public function setDefaultController($defaultController)
    {
        $this->defaultController = $defaultController;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    public function match(HttpRequestInterface $request)
    {
        $uri = $request->uri(false);
        $uri2Controller = $this->uri2Controller;
        $controllerString = null;
        if (array_key_exists($uri, $uri2Controller)) {
            $controllerString = $uri2Controller[$uri];
        } elseif (null !== $this->defaultController) {
            $controllerString = $this->defaultController;
        }
        if (null !== $controllerString) {
            return RouterHelper::routerControllerToCallable($controllerString);
        }
    }
}