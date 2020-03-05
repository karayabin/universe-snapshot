[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)


LightDatabasePdoWrapper::checkMicroPermission
================



LightDatabasePdoWrapper::checkMicroPermission — Checks whether the current user has the micro permission corresponding to the given table(s) and type.




Description
================


protected [LightDatabasePdoWrapper::checkMicroPermission](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/checkMicroPermission.md)($table, string $type) : void




Checks whether the current user has the micro permission corresponding to the given table(s) and type.
If not, an exception is thrown

We use the [recommended micro-permission notation for database interaction](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md).




Parameters
================


- table

    

- type

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightDatabasePdoWrapper::checkMicroPermission](https://github.com/lingtalfi/Light_Database/blob/master/LightDatabasePdoWrapper.php#L316-L332)


See Also
================

The [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) class.

Previous method: [onSuccess](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/onSuccess.md)<br>

