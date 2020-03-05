[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Light_UserRowRestriction\LightUserDataRowRestrictionHandler class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler.md)


LightUserDataRowRestrictionHandler::checkRestriction
================



LightUserDataRowRestrictionHandler::checkRestriction — table, crudType, eventName and args parameters.




Description
================


public [LightUserDataRowRestrictionHandler::checkRestriction](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler/checkRestriction.md)([Ling\Light_User\LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) $user, string $table, string $crudType, ?...$args) : void




Checks that the current user is allowed to execute the action she/he wants, which is described by the
table, crudType, eventName and args parameters.

An exception is thrown if that's not the case.

The crudType is one of:
- create
- read
- update (includes replace for now)
- delete




Parameters
================


- user

    

- table

    

- crudType

    

- args

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataRowRestrictionHandler::checkRestriction](https://github.com/lingtalfi/Light_UserData/blob/master/Light_UserRowRestriction/LightUserDataRowRestrictionHandler.php#L58-L149)


See Also
================

The [LightUserDataRowRestrictionHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler/setContainer.md)<br>Next method: [checkValidWebsiteUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_UserRowRestriction/LightUserDataRowRestrictionHandler/checkValidWebsiteUser.md)<br>

