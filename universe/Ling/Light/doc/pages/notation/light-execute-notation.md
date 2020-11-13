Light execute notation
=============
2020-08-14 -> 2020-10-05




The **light execute notation** allows for plugin authors to use a powerful syntax to call php methods.


The notation must have one of the following format:


- $class::$method
- $class::$method ( $args )

- $class->$method
- $class->$method ( $args )

- @$service->$method
- @$service->$method ( $args )


With:

- $class: the full class name (example: Ling\Bat)
- $method: the name of the method to execute
- $args: a list of arguments written with [smartCode notation](https://github.com/lingtalfi/NotationFan/blob/master/smart-code.md).
             Note: we can use regular php notation as it's a subset of the smartCode notation.
- $service: the name of the service to call. The special name "container" is reserved to access the container itself (i.e. useful if you
    need to access the "has" method of the container for instance).


Note: if the class (i.e. not a service) needs to be instantiated, we just call the class constructor without arguments.





Related tools
---------
2020-08-14


- [The LightHelper::executeMethod](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper/executeMethod.md)
