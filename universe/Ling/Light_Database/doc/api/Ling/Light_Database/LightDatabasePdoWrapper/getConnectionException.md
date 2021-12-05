[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)


LightDatabasePdoWrapper::getConnectionException
================



LightDatabasePdoWrapper::getConnectionException — init method.




Description
================


public [LightDatabasePdoWrapper::getConnectionException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/getConnectionException.md)() : [PDOException](https://www.php.net/manual/en/class.pdoexception.php) | null




Returns the error message of the original exception thrown if the pdo connection failed during call to the
init method.
Or an empty string by default, or if the connexion went ok.




Parameters
================

This method has no parameters.


Return values
================

Returns [PDOException](https://www.php.net/manual/en/class.pdoexception.php) | null.








Source Code
===========
See the source code for method [LightDatabasePdoWrapper::getConnectionException](https://github.com/lingtalfi/Light_Database/blob/master/LightDatabasePdoWrapper.php#L149-L152)


See Also
================

The [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) class.

Previous method: [init](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/init.md)<br>Next method: [setContainer](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/setContainer.md)<br>

