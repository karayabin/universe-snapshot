<?php


namespace Kamille\Architecture\Router\Helper;


use Kamille\Architecture\Router\Exception\RouterException;

class RouterHelper
{

    /**
     *
     * This method takes the output of a matching Route/Router, and
     * converts it to an actual callable (which is currently required by the controller request listener
     * of this current kamille implementation).
     *
     * Note: implementation details might change in the future.
     */
//    public static function routerControllerToCallable($controller, array $urlParams=[])
//    {
//
//        if (is_string($controller)) {
//
//            $p = explode(':', $controller, 2);
//            if (2 === count($p)) {
//                $o = new $p[0];
//                return [
//                    [$o, $p[1]],
//                    $urlParams,
//                ];
//            }
//        }
//        /**
//         * As for now, we don't know how to handle a controller in an other format that string
//         */
//        $msg = "invalid controller string format: expected format is controllerFullPath:method";
//        if (is_string($controller)) {
//            $msg = "invalid controller string format ($controller): expected format is controllerFullPath:method";
//        }
//        throw new RouterException($msg);
//    }
}