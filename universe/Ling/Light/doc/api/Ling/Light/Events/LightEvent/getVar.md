[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Events\LightEvent class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md)


LightEvent::getVar
================



LightEvent::getVar — Returns the variable value associated with the given variable key.




Description
================


public [LightEvent::getVar](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/getVar.md)(string $key, ?$default = null, ?bool $throwEx = false) : mixed




Returns the variable value associated with the given variable key.
If the variable is not found, it returns the given default value by default,
or throws an exception if the throwEx flag is set to true.




Parameters
================


- key

    

- default

    

- throwEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightEvent::getVar](https://github.com/lingtalfi/Light/blob/master/Events/LightEvent.php#L94-L103)


See Also
================

The [LightEvent](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md) class.

Previous method: [setVar](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/setVar.md)<br>Next method: [getLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent/getLight.md)<br>

