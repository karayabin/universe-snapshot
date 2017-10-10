<?php


namespace Kamille\Architecture\RequestListener\Web;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Architecture\Request\Web\HttpRequestInterface;
use Kamille\Architecture\Router\Web\WebRouterInterface;
use Kamille\Services\XLog;


/**
 * This is a router for a web application.
 *
 * It sets the controller parameter in the request (if a route matches),
 * or do nothing special otherwise.
 *
 * The controller is a callable.
 *
 * Also, it can attach an urlParam to the request.
 *
 * urlParams are parameters that are found in the url, but are different from $_GET.
 * They often serve the purpose of allowing "pretty" url.
 *
 * For instance:
 * - http://mysite.com/post-about-how-i-killed-my-cat
 *
 * instead of:
 * - http://mysite.com?page=6
 *
 *
 * Note that there could be many router request listeners,
 * so we MERGE the urlParams instead of REPLACING them.
 *
 *
 *
 *
 */
class RouterRequestListener implements HttpRequestListenerInterface
{

    /**
     * @var WebRouterInterface[]
     */
    private $routers;

    public function __construct()
    {
        $this->routers = [];
    }

    public static function create()
    {
        return new static();
    }

    public function listen(HttpRequestInterface $request)
    {
        $controller = null;
        $urlParams = [];
        foreach ($this->routers as $router) {
            if (null !== ($res = $router->match($request))) {


                if (is_callable($res)) {
                    $controller = $res;
                    break;
                }
                if (is_array($res)) {
                    $controller = $res[0];
                    $urlParams = $res[1];
                    break;

                } elseif (is_string($res)) {
                    $controller = $res;
                    break;
                }
            }
        }

        if (null !== $controller) {


            if (true === ApplicationParameters::get('debug')) {
                $s = "unknown controller type";

                if (is_callable($controller)) {
                    $this->callableRepresentation($controller, $s);
                } elseif (is_string($controller)) {
                    $s = $controller;
                } elseif (is_array($controller)) {
                    $cont = $controller[0];
                    if (is_callable($cont)) {
                        $this->callableRepresentation($cont, $s);
                    } elseif (is_string($cont)) {
                        $s = $cont;
                    }
                }
                XLog::debug("[Kamille.RouterRequestListener] - Router matched: " . get_class($router) . ", controller: $s");
            }

            $urlParams = array_merge($request->get('urlParams', []), $urlParams);
            $request->set("urlParams", $urlParams);
            $request->set("controller", $controller);
        }
    }

    public function addRouter(WebRouterInterface $router)
    {
        $this->routers[] = $router;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function callableRepresentation($controller, &$s)
    {
        if (is_string($controller)) {
            $s = $controller;
        } elseif (is_object($controller)) {
            $s = get_class($controller);
        } elseif (is_array($controller) && array_key_exists(0, $controller)) {
            if (is_string($controller[0])) {
                $s = $controller[0];
            } elseif (is_object($controller[0])) {
                $s = get_class($controller[0]);
            }
        }
    }
}