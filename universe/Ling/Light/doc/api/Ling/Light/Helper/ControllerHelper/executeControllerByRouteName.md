[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Helper\ControllerHelper class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper.md)


ControllerHelper::executeControllerByRouteName
================



ControllerHelper::executeControllerByRouteName — Executes the controller corresponding to the given route, if found, and returns the returned response.




Description
================


public static [ControllerHelper::executeControllerByRouteName](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper/executeControllerByRouteName.md)(string $routeName, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Executes the controller corresponding to the given route, if found, and returns the returned response.
Throws an exception if the route is not found.

Note that this method doesn't trigger the events that the light core does when it renders a route,
therefore you should only use this method if you know what you're doing.




Parameters
================


- routeName

    

- container

    


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ControllerHelper::executeControllerByRouteName](https://github.com/lingtalfi/Light/blob/master/Helper/ControllerHelper.php#L87-L101)


See Also
================

The [ControllerHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper.md) class.

Previous method: [executeController](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper/executeController.md)<br>Next method: [resolveController](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper/resolveController.md)<br>

