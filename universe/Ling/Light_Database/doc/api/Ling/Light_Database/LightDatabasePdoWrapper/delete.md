[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)


LightDatabasePdoWrapper::delete
================



LightDatabasePdoWrapper::delete — Executes the delete statement and returns the number of deleted rows.




Description
================


public [LightDatabasePdoWrapper::delete](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/delete.md)($table, ?$whereConds = null, ?$markers = []) : mixed




Executes the delete statement and returns the number of deleted rows.

Note: by default whereConds is null, and this will erase all the records of the given $table.




Parameters
================


- table

    

- whereConds

    

- markers

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [PDOException](https://www.php.net/manual/en/class.pdoexception.php).&nbsp;

- [NoPdoConnectionException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Exception/NoPdoConnectionException.php).&nbsp;







Source Code
===========
See the source code for method [LightDatabasePdoWrapper::delete](https://github.com/lingtalfi/Light_Database/blob/master/LightDatabasePdoWrapper.php#L205-L210)


See Also
================

The [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) class.

Previous method: [update](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/update.md)<br>Next method: [fetch](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/fetch.md)<br>

