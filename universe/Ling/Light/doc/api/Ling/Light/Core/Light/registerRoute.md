[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Core\Light class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)


Light::registerRoute
================



Light::registerRoute — Registers a route item, as defined in [the route page](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md).




Description
================


public [Light::registerRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/registerRoute.md)(string $pattern, ?$controller, string $name = null, array $requirements = [], array $urlParams = [], string $host = null, bool $isSecure = null) : void




Registers a route item, as defined in [the route page](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md).




Parameters
================


- pattern

    A string to match against the uri.
By default, it has to match the uri exactly in order for the route to match.
However, third-party plugins can add their own features to the syntax (for instance, a plugin could allow the
pattern to use dynamic routes which would create variables).

- controller

    The controller is a php callback by default.
However, plugins can use the controller argument as they want (for instance it could be a string representing
a Controller object to invoke).

Note: in the end though (after being interpreted by third party plugins), the controller will resolve into a callback form.

- name

    If the route name is not defined, it will default to the given pattern.
Note: route names should be unique.

- requirements

    An array of requirements to test against the http request.
While the pattern argument is tested against the http request's uri path,
the requirements argument is used to test the other properties of the http request.

If one requirement fails, the route will not match.
Third party plugins can be creative and enhance the requirements syntax/feature as they want.

- urlParams

    An array of key/value pairs representing the potential variables to inject into the controller callback.

- host

    The host associated to this route.

- isSecure

    Whether the https protocol or the http protocol is the preferred way to call this route.


Return values
================

Returns void.








Source Code
===========
See the source code for method [Light::registerRoute](https://github.com/lingtalfi/Light/blob/master/Core/Light.php#L232-L246)


See Also
================

The [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) class.

Previous method: [getContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getContainer.md)<br>Next method: [getRoutes](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getRoutes.md)<br>

