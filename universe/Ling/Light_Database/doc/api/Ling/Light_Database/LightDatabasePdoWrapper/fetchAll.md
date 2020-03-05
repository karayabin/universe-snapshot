[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)


LightDatabasePdoWrapper::fetchAll
================



LightDatabasePdoWrapper::fetchAll — Executes the prepared statement and return an array containing all of the result set rows.




Description
================


public [LightDatabasePdoWrapper::fetchAll](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/fetchAll.md)($query, ?array $markers = [], ?$fetchStyle = null, ?$fetchArg = null, ?array $ctorArgs = []) : false | array




Executes the prepared statement and return an array containing all of the result set rows.

The default fetch style is PDO::FETCH_ASSOC.

The last three arguments of this method are described in greater details in the php documentation:
http://php.net/manual/en/pdostatement.fetchall.php




Parameters
================


- query

    

- markers

    

- fetchStyle

    

- fetchArg

    

- ctorArgs

    


Return values
================

Returns false | array.


Exceptions thrown
================

- [PDOException](https://www.php.net/manual/en/class.pdoexception.php).&nbsp;

- [NoPdoConnectionException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Exception/NoPdoConnectionException.php).&nbsp;







Source Code
===========
See the source code for method [LightDatabasePdoWrapper::fetchAll](https://github.com/lingtalfi/Light_Database/blob/master/LightDatabasePdoWrapper.php#L226-L231)


See Also
================

The [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/fetch.md)<br>Next method: [setContainer](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/setContainer.md)<br>

