<?php


namespace Kamille\Architecture\Request;


/**
 * You can use the following variables if you want:
 *
 *
 * - urlParams: array, the parameters extracted from the uri. Ex: if the uri is /blog/post/5-christmas-tips,
 *                  the uri params could be this array:
 *                  - slug: 5-christmas-tips
 * - controller: string|mixed, a string representing the controller to execute. Ex: MyPath\MyController:myMethod,
 *              or you could pass a controller instance if you want.
 * - siteType: string, identifies whether you use a front or a back
 *              - single
 *              - dual.front
 *              - dual.back
 *
 *              single means that the app only uses one front anyway.
 *              dual means that the app could use either a front or a back.
 *
 *
 *
 *
 */
interface RequestInterface
{
    //--------------------------------------------
    // PARAMS
    //--------------------------------------------
    public function set($key, $value);

    public function get($key, $defaultValue = null);
}