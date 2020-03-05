[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\EventHandler\LightDatabaseEventHandlerInterface class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/EventHandler/LightDatabaseEventHandlerInterface.md)


LightDatabaseEventHandlerInterface::handle
================



LightDatabaseEventHandlerInterface::handle — Reacts to the given event, which name and args are given.




Description
================


abstract public [LightDatabaseEventHandlerInterface::handle](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/EventHandler/LightDatabaseEventHandlerInterface/handle.md)(string $eventName, bool $isSystemCall, ?...$args) : void




Reacts to the given event, which name and args are given.

The eventName is one of:

- insert
- replace
- update
- delete
- fetch
- fetchAll

See the [SimplePdoWrapper conception notes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/conception-notes.md) for more details about the isSystemCall boolean argument.

See the [LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) methods for more details about the args.




Parameters
================


- eventName

    

- isSystemCall

    

- args

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightDatabaseEventHandlerInterface::handle](https://github.com/lingtalfi/Light_Database/blob/master/EventHandler/LightDatabaseEventHandlerInterface.php#L36-L36)


See Also
================

The [LightDatabaseEventHandlerInterface](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/EventHandler/LightDatabaseEventHandlerInterface.md) class.



