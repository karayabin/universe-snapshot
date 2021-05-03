[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)<br>
[Back to the Ling\Light_Kit\ConfigurationTransformer\LazyReferenceResolver\RouteResolver class](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/RouteResolver.md)


RouteResolver::resolve
================



RouteResolver::resolve — Resolves the given $routeExpr and returns the corresponding url.




Description
================


public [RouteResolver::resolve](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/RouteResolver/resolve.md)(string $routeExpr, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : string




Resolves the given $routeExpr and returns the corresponding url.

The $routeExpr has the following format:

- $route (  ::$routeParams  )?

The $routeParams use the smartCode notation.


Example:

- my_route
- my_route::{param1: value1, param2: value2}


More details about [SmartCodeNotation](https://github.com/lingtalfi/Bat/blob/master/SmartCodeTool.md).




Parameters
================


- routeExpr

    

- container

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [RouteResolver::resolve](https://github.com/lingtalfi/Light_Kit/blob/master/ConfigurationTransformer/LazyReferenceResolver/RouteResolver.php#L41-L50)


See Also
================

The [RouteResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/RouteResolver.md) class.



