<?php


namespace Ling\Light\Controller;

/**
 * The LightControllerInterface interface.
 *
 * A controller should not have any particular method, but I create this interface just in case
 * one day it does.
 *
 *
 *
 * WARNING
 * ----------
 * A light controller should not do anything special in its constructor (apart from setting default values
 * for the properties), that's because you should expect that anybody (i.e. malicious user) will be able
 * to call the LightControllerInterface instance's constructor method (because of tools such as
 * Ling.Light_ControllerHub for instance, which allow dynamic calls to light controllers).
 *
 * Also, because of the same techniques, you should expect that any of your light controller's methods
 * will be called by any users.
 * Therefore if you are doing something sensitive in it, you are supposed to protect your methods with
 * a logical layer (such as application permissions for instance).
 *
 *
 *
 */
interface LightControllerInterface
{

}