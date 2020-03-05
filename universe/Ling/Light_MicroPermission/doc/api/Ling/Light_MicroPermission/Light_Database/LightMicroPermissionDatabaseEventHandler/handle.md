[Back to the Ling/Light_MicroPermission api](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission.md)<br>
[Back to the Ling\Light_MicroPermission\Light_Database\LightMicroPermissionDatabaseEventHandler class](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Light_Database/LightMicroPermissionDatabaseEventHandler.md)


LightMicroPermissionDatabaseEventHandler::handle
================



LightMicroPermissionDatabaseEventHandler::handle — Reacts to the given event, which name and args are given.




Description
================


public [LightMicroPermissionDatabaseEventHandler::handle](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Light_Database/LightMicroPermissionDatabaseEventHandler/handle.md)(string $eventName, ?...$args) : void




Reacts to the given event, which name and args are given.

The eventName is one of:

- insert
- replace
- update
- delete
- fetch
- fetchAll

See the [LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) methods for more details about the args.




Parameters
================


- eventName

    

- args

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightMicroPermissionDatabaseEventHandler::handle](https://github.com/lingtalfi/Light_MicroPermission/blob/master/Light_Database/LightMicroPermissionDatabaseEventHandler.php#L54-L101)


See Also
================

The [LightMicroPermissionDatabaseEventHandler](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Light_Database/LightMicroPermissionDatabaseEventHandler.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Light_Database/LightMicroPermissionDatabaseEventHandler/setContainer.md)<br>

