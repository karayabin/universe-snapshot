[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Core\Light class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)


Light::getMatchingRoute
================



Light::getMatchingRoute — Returns the matching route array, or false if no route matched.




Description
================


public [Light::getMatchingRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getMatchingRoute.md)() : array | false




Returns the matching route array, or false if no route matched.
This method can only be called after the route matching test has been executed.

If this method is called before the route matching test, an exception will be thrown.




Parameters
================

This method has no parameters.


Return values
================

Returns array | false.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [Light::getMatchingRoute](https://github.com/lingtalfi/Light/blob/master/Core/Light.php#L249-L255)


See Also
================

The [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) class.

Previous method: [setHttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/setHttpRequest.md)<br>Next method: [registerRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/registerRoute.md)<br>

