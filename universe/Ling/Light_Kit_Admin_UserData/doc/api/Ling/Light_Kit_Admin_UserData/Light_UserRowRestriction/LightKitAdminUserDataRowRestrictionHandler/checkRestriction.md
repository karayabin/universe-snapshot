[Back to the Ling/Light_Kit_Admin_UserData api](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData.md)<br>
[Back to the Ling\Light_Kit_Admin_UserData\Light_UserRowRestriction\LightKitAdminUserDataRowRestrictionHandler class](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler.md)


LightKitAdminUserDataRowRestrictionHandler::checkRestriction
================



LightKitAdminUserDataRowRestrictionHandler::checkRestriction — table and parameters.




Description
================


public [LightKitAdminUserDataRowRestrictionHandler::checkRestriction](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler/checkRestriction.md)(Ling\Light_User\LightUserInterface $user, string $table, ?...$args) : void




Checks that the current user is allowed to execute the action she/he wants, which is described by the
table and parameters.

An exception is thrown if that's not the case.




Parameters
================


- user

    

- table

    

- args

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightKitAdminUserDataRowRestrictionHandler::checkRestriction](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler.php#L55-L77)


See Also
================

The [LightKitAdminUserDataRowRestrictionHandler](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler/setContainer.md)<br>Next method: [checkValidWebsiteUser](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler/checkValidWebsiteUser.md)<br>

