<?php


namespace Kamille\Services;


use Kamille\Services\Exception\XException;
use Kamille\Utils\ModuleInstallationRegister\ModuleInstallationRegister;

class AbstractX
{
    /**
     * @var array of serviceName => object instance
     * Modules can use this property inside their code to store a service for re-usability purposes.
     * (re-using the SAME instance on every method call)
     */
    protected static $cache = [];


    /**
     * This method is originally created to get a module's service.
     * It is meant to be used like this:
     *
     *          a(X::get("Connexion.getSomeService"));
     *
     * And then, create an X container which extends this AbstractX class,
     * and has a protected static Connexion_getSomeService method.
     *
     *
     *
     */
    public static function get($service, $default = null, $throwEx = true, $reuse = true)
    {
        if (true === $reuse && array_key_exists($service, self::$cache)) {
            return self::$cache[$service];
        }
        $p = explode('_', $service, 2);
        $error = null;
        if (2 === count($p)) {

            $module = $p[0];
            if (ModuleInstallationRegister::isInstalled($module)) {
                $method = $service;

                if (method_exists(get_called_class(), $method)) {
                    /**
                     * Note:
                     * the static::class technique does not work in 5.4:  syntax error, unexpected 'class'  (tested in mamp 5.4.45)
                     * It worked on 5.5.38 (mamp).
                     */
                    $args = array_slice(func_get_args(),4);
                    $ret = call_user_func_array([static::class, $method], $args);
                    if (true === $reuse) {
                        self::$cache[$service] = $ret;
                    }
                    return $ret;
                } else {
                    $error = "service not found: $service";
                }
            } else {
                $error = "Module $module is not installed";
            }
        } else {
            $error = "invalid service format";
        }
        if (true === $throwEx) {
            throw new XException($error);
        }
        return $default;
    }
}