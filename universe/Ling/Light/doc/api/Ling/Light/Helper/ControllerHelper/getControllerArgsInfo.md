[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Helper\ControllerHelper class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper.md)


ControllerHelper::getControllerArgsInfo
================



ControllerHelper::getControllerArgsInfo — Returns an array of controller args corresponding to the given controller.




Description
================


public static [ControllerHelper::getControllerArgsInfo](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper/getControllerArgsInfo.md)(callable $controller) : array




Returns an array of controller args corresponding to the given controller.

The controller args is an array of parameterName => item,
each item having the following structure:
     - 0: hasDefaultValue, bool. Whether the argument has a default value (i.e. if there is an equal symbol in the parameter definition).
     - 1: defaultValue, mixed=null. If hasDefaultValue is true, the actual default value for this parameter.
     - 2: hint: mixed=null. The hint type if any (bool, string, int, an object, ...)




Parameters
================


- controller

    


Return values
================

Returns array.


Exceptions thrown
================

- [ReflectionException](http://php.net/manual/en/class.reflectionexception.php).&nbsp;







Source Code
===========
See the source code for method [ControllerHelper::getControllerArgsInfo](https://github.com/lingtalfi/Light/blob/master/Helper/ControllerHelper.php#L236-L271)


See Also
================

The [ControllerHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper.md) class.

Previous method: [getControllerArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper/getControllerArgs.md)<br>

