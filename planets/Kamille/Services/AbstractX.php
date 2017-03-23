<?php


namespace Kamille\Services;


use Kamille\Services\Exception\XException;

class AbstractX
{

    /**
     * This method is originally created to get a module's service.
     * It is meant to be used like this:
     *
     *          a(X::get("Connexion.getSomeService"));
     *
     * And then, create an X container which extends this AbstractX class,
     * and has a (public) static Connexion_getSomeService method.
     *
     *
     *
     */
    public static function get($service, $default = null, $throwEx = true)
    {
        $method = str_replace('.', '_', $service);
        if (method_exists(get_called_class(), $method)) {

            /**
             * Note:
             * the static::class technique does not work in 5.4:  syntax error, unexpected 'class'  (tested in mamp 5.4.45)
             * It worked on 5.5.38 (mamp).
             */
            return call_user_func([static::class, $method]);
        }
        if (true === $throwEx) {
            throw new XException("service not found: $service");
        }
        return $default;
    }
}