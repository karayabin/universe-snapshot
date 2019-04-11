[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Core\Light class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)


Light::getControllerArgs
================



Light::getControllerArgs — Returns the controller arguments to use when invoking the controller.




Description
================


private [Light::getControllerArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getControllerArgs.md)(?$controller, array $route, [Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) $httpRequest) : array




Returns the controller arguments to use when invoking the controller.

Basically, the arguments are the variables defined in the route.vars,
or if not found, the default value of the argument if any.

The special hint types for the Light instance and the HttpRequestInterface can be used
as an alternative to inject the light instance and the http request instance respectively.




Parameters
================


- controller

    

- route

    

- httpRequest

    


Return values
================

Returns array.


Exceptions thrown
================

- [LightException](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException.md).&nbsp;

- [ReflectionException](http://php.net/manual/en/class.reflectionexception.php).&nbsp;







See Also
================

The [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) class.

Previous method: [renderInternalServerErrorPage](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/renderInternalServerErrorPage.md)<br>

