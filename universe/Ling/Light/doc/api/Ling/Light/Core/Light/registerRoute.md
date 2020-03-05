[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Core\Light class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)


Light::registerRoute
================



Light::registerRoute — Registers a route item, as defined in [the route page](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md).




Description
================


public [Light::registerRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/registerRoute.md)(string $pattern, $controller, ?string $name = null, ?array $route = []) : void




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

- route

    An array containing any other route properties that you want to include.
If not overwritten, the default values are:
- requirements: []
- url_params: []
- host: null
- is_secure_protocol: null
- is_ajax: false

See the @page(route page) for more details.


Return values
================

Returns void.








Source Code
===========
See the source code for method [Light::registerRoute](https://github.com/lingtalfi/Light/blob/master/Core/Light.php#L316-L331)


See Also
================

The [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) class.

Previous method: [getMatchingRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getMatchingRoute.md)<br>Next method: [initialize](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/initialize.md)<br>

