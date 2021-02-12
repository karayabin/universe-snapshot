[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightHelper class
================
2019-04-09 --> 2021-02-11






Introduction
============

The LightHelper class.



Class synopsis
==============


class <span class="pl-k">LightHelper</span>  {

- Methods
    - public static [createDummyRoutes](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper/createDummyRoutes.md)(array $routePatterns, [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light, ?$controller = null) : void
    - public static [executeMethod](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper/executeMethod.md)(string $expr, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, ?array $options = []) : mixed
    - public static [executeParenthesisWrappersByArray](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper/executeParenthesisWrappersByArray.md)(array $arr, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, ?array $identifiers = null) : array

}






Methods
==============

- [LightHelper::createDummyRoutes](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper/createDummyRoutes.md) &ndash; Register all the routes which patterns are given.
- [LightHelper::executeMethod](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper/executeMethod.md) &ndash; Executes a php method based on the notation described below, and returns the result.
- [LightHelper::executeParenthesisWrappersByArray](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper/executeParenthesisWrappersByArray.md) &ndash; Parses the given array recursively, executes the "executeMethod" method on every parenthesis wrapper, and returns the result.





Location
=============
Ling\Light\Helper\LightHelper<br>
See the source code of [Ling\Light\Helper\LightHelper](https://github.com/lingtalfi/Light/blob/master/Helper/LightHelper.php)



SeeAlso
==============
Previous class: [LightClassHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightClassHelper.md)<br>Next class: [LightNamesAndPathHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightNamesAndPathHelper.md)<br>
