[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Helper\LightHelper class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper.md)


LightHelper::executeMethod
================



LightHelper::executeMethod — Executes a php method based on the notation described below, and returns the result.




Description
================


public static [LightHelper::executeMethod](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper/executeMethod.md)(string $expr, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : mixed




Executes a php method based on the notation described below, and returns the result.


This technique originally comes from the [ClassTool::executePhpMethod](https://github.com/lingtalfi/Bat/blob/master/ClassTool.md#executephpmethod-aka-smart-php-method-call).

We've just added the possibility to call services by prefixing the service name with the @ symbol.


The given $method must have one of the following format (or else an exception will be thrown):

- $class::$method
- $class::$method ( $args )

- $class->$method
- $class->$method ( $args )

- @$service->$method
- @$service->$method ( $args )


Note that the first two forms refer to a static method call, the next two forms refer to a method call on
an instance (instantiation is done by this method), and the last ones call a service's method.


With:

- $class: the full class name (example: Ling\Bat)
- $method: the name of the method to execute
- $args: a list of arguments written with smartCode notation (see SmartCodeTool class for more details).
             Note: we can use regular php notation as it's a subset of the smartCode notation.
- $service: the name of the service to call


See the [examples here](https://github.com/lingtalfi/Bat/blob/master/ClassTool.md#executephpmethod-aka-smart-php-method-call)




Parameters
================


- expr

    

- container

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightHelper::executeMethod](https://github.com/lingtalfi/Light/blob/master/Helper/LightHelper.php#L88-L131)


See Also
================

The [LightHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper.md) class.

Previous method: [createDummyRoutes](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper/createDummyRoutes.md)<br>

