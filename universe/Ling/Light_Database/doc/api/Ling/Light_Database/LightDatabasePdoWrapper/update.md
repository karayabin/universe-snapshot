[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)


LightDatabasePdoWrapper::update
================



LightDatabasePdoWrapper::update — Executes the update statement and returns whether the statement was executed successfully.




Description
================


public [LightDatabasePdoWrapper::update](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/update.md)($table, array $fields, ?$whereConds = null, ?array $markers = []) : bool




Executes the update statement and returns whether the statement was executed successfully.




Parameters
================


- table

    

- fields

    

- whereConds

    

- markers

    


Return values
================

Returns bool.


Exceptions thrown
================

- [PDOException](https://www.php.net/manual/en/class.pdoexception.php).&nbsp;

- [NoPdoConnectionException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Exception/NoPdoConnectionException.php).&nbsp;







Source Code
===========
See the source code for method [LightDatabasePdoWrapper::update](https://github.com/lingtalfi/Light_Database/blob/master/LightDatabasePdoWrapper.php#L195-L200)


See Also
================

The [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) class.

Previous method: [replace](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/replace.md)<br>Next method: [delete](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/delete.md)<br>

