[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Helper\ControllerHelper class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper.md)


ControllerHelper::resolveController
================



ControllerHelper::resolveController — controller can be extracted out of the given value.




Description
================


public static [ControllerHelper::resolveController](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper/resolveController.md)($controller, [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : callable | null




Returns a callable controller from the given controller, or null if no callable
controller can be extracted out of the given value.

Note: at this point it's assumed that a route has matched already.

Note: This is the method used by the Core/Light instance to create its controllers,
and so it contains all the string transformation logic used by the Core/Light.
This method has been externalized so that other plugins can execute controllers
the same way the Core/Light instance does.




Parameters
================


- controller

    

- light

    The matching route.


Return values
================

Returns callable | null.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ControllerHelper::resolveController](https://github.com/lingtalfi/Light/blob/master/Helper/ControllerHelper.php#L92-L136)


See Also
================

The [ControllerHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper.md) class.

Previous method: [executeController](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper/executeController.md)<br>Next method: [getControllerArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper/getControllerArgs.md)<br>

