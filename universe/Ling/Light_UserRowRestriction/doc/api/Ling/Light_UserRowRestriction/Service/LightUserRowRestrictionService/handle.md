[Back to the Ling/Light_UserRowRestriction api](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction.md)<br>
[Back to the Ling\Light_UserRowRestriction\Service\LightUserRowRestrictionService class](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService.md)


LightUserRowRestrictionService::handle
================



LightUserRowRestrictionService::handle — Reacts to the given event, which name and args are given.




Description
================


public [LightUserRowRestrictionService::handle](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/handle.md)(string $eventName, bool $isSystemCall, ?...$args) : void




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
See the source code for method [LightUserRowRestrictionService::handle](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/Service/LightUserRowRestrictionService.php#L104-L165)


See Also
================

The [LightUserRowRestrictionService](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/setContainer.md)<br>

