<?php


namespace Kamille\Services;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Services\Exception\HooksException;
use Kamille\Services\Exception\XException;
use Kamille\Utils\ModuleInstallationRegister\ModuleInstallationRegister;

class AbstractHooks
{

    public static $throwEx = true;

    /**
     * This method is originally created to access a module's hook.
     * It is meant to be used like this:
     *
     *          a(Hooks::call("Connexion_someHook"));
     *
     * And then, create an Hooks container which extends this AbstractX class,
     * and has a protected static Connexion_someHook method.
     *
     * If param is an array, it will be passed by reference.
     *      You still need to prefix your variable name with the ampersand symbol to benefit the reference mechanism.
     *      If you don't prefix the variable name with the ampersand, it will have the same result as if it was passed by copy.
     * It is assumed that it's an object otherwise, or a scalar value.
     *
     * If you need more params, just add them after the $param when you call this method:
     *
     * - Hooks::call( "MyHook", &$param, $param2, ... )
     *
     * Note that only the first param is passed by reference.
     *
     *
     */
    public static function call($hook, &$param = null)
    {

        /**
         * Ensuring that throwEx is true by default for the next call
         */
        $throwEx = self::$throwEx;
        self::$throwEx = true;


        if (true === ApplicationParameters::get("debug")) {
            XLog::log("[Kamille.Hook] - $hook was called", "hooks");
        }
        $p = explode('_', $hook, 2);
        $error = null;
        if (2 === count($p)) {

            $module = $p[0];
            if (ModuleInstallationRegister::isInstalled($module)) {
                $method = $hook;
                if (method_exists(get_called_class(), $method)) {


                    $allParams = func_get_args();
                    array_shift($allParams); // dropping the $hook


                    /**
                     * Note:
                     * the static::class technique does not work in 5.4:  syntax error, unexpected 'class'  (tested in mamp 5.4.45)
                     * It worked on 5.5.38 (mamp).
                     */
                    if (!is_object($param)) {
                        array_shift($allParams); // dropping the $param
                        $n = count($allParams);
                        switch ($n) {
                            case "0":
                                return call_user_func_array([static::class, $method], [&$param]);
                                break;
                            case "1":
                                return call_user_func_array([static::class, $method], [&$param, $allParams[0]]);
                                break;
                            case "2":
                                return call_user_func_array([static::class, $method], [&$param, $allParams[0], $allParams[1]]);
                                break;
                            case "3":
                                return call_user_func_array([static::class, $method], [&$param, $allParams[0], $allParams[1], $allParams[2]]);
                                break;
                            default:
                                throw new HooksException("This case with $n arguments is not handled yet");
                                break;
                        }
                    }
                    return call_user_func_array([static::class, $method], $allParams);
                } else {
                    $error = "hook not found: $hook";
                }
            } else {
                $error = "Module $module is not installed";
            }
        } else {
            $error = "invalid hook format";
        }
        if (true === $throwEx) {
            throw new HooksException($error);
        }
        return null;
    }
}