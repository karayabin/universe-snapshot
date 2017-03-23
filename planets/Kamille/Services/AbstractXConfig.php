<?php


namespace Kamille\Services;


use Kamille\Services\Exception\XException;


/**
 * Before the application instance is created,
 * the application environment has to be created.
 *
 * The application environment is composed of the ApplicationParameters
 * and the X container.
 *
 * The XConfig object (which this class is the proposed parent of)
 * is the third (nowadays) unofficial element of this application environment.
 *
 * It hosts module parameters in a static way.
 *
 * In this specific implementation, I make one method by parameter,
 * since that was one of the reasons why the idea of a parameter container was born
 * in the first place.
 *
 *
 */
class AbstractXConfig
{


    /**
     *
     *
     * parameter: moduleName.paramKey
     *
     *      Example: MyModule.favoriteColor
     *
     *
     * It will look for the following method:
     * - MyModule_favoriteColor, which shall return the appropriate value.
     *
     *
     * Note: with this technique, we can only have one level of parameters (no nested
     * key), however, I thought about it and I believe we don't need more than one level.
     *
     */
    public static function get($parameter, $default = null, $throwEx = true)
    {

        $method = str_replace('.', '_', $parameter);
        if (method_exists(get_called_class(), $method)) {

            /**
             * Note:
             * the static::class technique does not work in 5.4:  syntax error, unexpected 'class'  (tested in mamp 5.4.45)
             * It worked on 5.5.38 (mamp).
             */
            return call_user_func([static::class, $method]);
        }
        if (true === $throwEx) {
            throw new XException("parameter not found: $parameter");
        }
        return $default;
    }
}