[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Helper\ControllerHelper class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper.md)


ControllerHelper::executeController
================



ControllerHelper::executeController — Executes the given controller and returns the appropriate response.




Description
================


public static [ControllerHelper::executeController](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper/executeController.md)($controller, [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Executes the given controller and returns the appropriate response.

Note: this method is used by the Core/Light instance, and has been externalized so that plugins
can call controllers by themselves, using the same technique as the Core/Light instance.

Note: at this point it's assumed that the route has matched already.

Note: although external plugins can use this method, the matched route can't be changed.
In other words, the controllers called by the plugin using this method can use the parameters
of the matching route in its arguments.




Parameters
================


- controller

    

- light

    


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ControllerHelper::executeController](https://github.com/lingtalfi/Light/blob/master/Helper/ControllerHelper.php#L42-L71)


See Also
================

The [ControllerHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper.md) class.

Next method: [executeControllerByRouteName](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper/executeControllerByRouteName.md)<br>

