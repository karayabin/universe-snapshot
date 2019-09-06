<?php


namespace Ling\Light\Controller;


/**
 * The RouteAwareControllerInterface interface.
 */
interface RouteAwareControllerInterface
{


    /**
     * Sets the matching route to this controller instance.
     *
     * @param array $route
     * @return void
     */
    public function setRoute(array $route);
}