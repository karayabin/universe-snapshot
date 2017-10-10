<?php


namespace Kamille\Utils\ShortCodeProvider;

/**
 * A shortcode is a string that can be processed and transformed into any value type (including arrays, objects, ...).
 *
 * Why do we need shortcodes?
 * -> to delegate more power to tools that only can use strings, but want to benefit a full api's power
 *
 *
 * The shortcode provider is a bridge between an api and a shortcode notation specific to this api.
 * So for instance if you have an EkomApi, with the following public methods:
 *
 * - doActionAAA
 * - doActionBBB
 * - doActionCCC
 *
 * Then you could create a shortcode provider that would provide the following shortcodes (for instance):
 *
 * - doActionAAA
 * - doActionBBB
 * - doActionCCC
 *
 *
 * Shortcode syntax
 * ======================
 * Another benefit of using shortcodes is that the syntax is already defined for you.
 * The shortcode notation is the following:
 *
 * - shortcode notation: <shortCodeProviderName> <:> <shortCodeFunction>
 *
 * With:
 * - shortCodeProviderName: the name of the short code provider, in lowercase; for instance: ekom
 * - shortCodeFunction: <providerMethod> (<:> <providerArgs>)?
 * - providerMethod: the name of the method of the provider we want to call, for instance doActionAAA
 * - providerArgs: arguments of the function, using the shortcode notation.
 *
 * The Shortcode notation is described in the source comments of the ShortCodeTool from the Bee planet.
 * (https://github.com/lingtalfi/BeeFramework/blob/master/Notation/String/ShortCode/Tool/ShortCodeTool.php).
 * Basically, the shortcode notation allows you to do things like this:
 *
 * az(ShortCodeTool::parse("hello=6, pou=[a, [b, c]], e='po=po', f='[pou]', g=[po => 4, go => [1,2,3], mo]"));
 *
 * So, key=value, key2=value2, value3, value4, myArray= [1,2,3], ...
 * (and even nested arrays are possible...)
 *
 *
 *
 *
 *
 *
 *
 *
 */
interface ShortCodeProviderInterface
{

    public function getName();


    /**
     * @param $shortCodeFunction
     * @param bool $wasProcessed, this flag is raised to true if the providerMethod (see comments above)
     *                  was actually found, and if the method could be executed successfully.
     *
     * @return mixed, the transformed value corresponding to the given shortCodeFunction
     *
     * In case of error, the shortcode provider should not throw an exception but rather log the error and return an
     * empty string.
     */
    public function process($shortCodeFunction, &$wasProcessed = false);

}