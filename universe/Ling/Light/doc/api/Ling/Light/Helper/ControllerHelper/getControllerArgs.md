[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Helper\ControllerHelper class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper.md)


ControllerHelper::getControllerArgs
================



ControllerHelper::getControllerArgs — Returns the controller arguments for the given controller and light instance.




Description
================


public static [ControllerHelper::getControllerArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper/getControllerArgs.md)(callable $controller, [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : array




Returns the controller arguments for the given controller and light instance.

Note: at this point it's assumed that a route has matched already.


Basically, the arguments are the variables defined in the route.vars,
or if not found, the default value of the argument if any.

The special hint types for the Light instance and the HttpRequestInterface can be used
as an alternative to inject the light instance and the http request instance respectively.



Note: this is the method used by the Core/Light instance to prepare arguments for a given controller.
It has been externalized so that other plugins can call their controllers the same way the Core/Light instance
does (for app consistency sake).




Parameters
================


- controller

    

- light

    


Return values
================

Returns array.


Exceptions thrown
================

- [LightException](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException.md).&nbsp;

- [ReflectionException](http://php.net/manual/en/class.reflectionexception.php).&nbsp;







Source Code
===========
See the source code for method [ControllerHelper::getControllerArgs](https://github.com/lingtalfi/Light/blob/master/Helper/ControllerHelper.php#L165-L225)


See Also
================

The [ControllerHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper.md) class.

Previous method: [resolveController](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper/resolveController.md)<br>Next method: [getControllerArgsInfo](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper/getControllerArgsInfo.md)<br>

