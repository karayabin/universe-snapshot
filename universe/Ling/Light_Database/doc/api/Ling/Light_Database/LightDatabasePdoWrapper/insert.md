[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)


LightDatabasePdoWrapper::insert
================



LightDatabasePdoWrapper::insert — Executes the insert statement and returns the lastInsertId.




Description
================


public [LightDatabasePdoWrapper::insert](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/insert.md)($table, ?array $fields = [], ?array $options = []) : false | string




Executes the insert statement and returns the lastInsertId.
See more info in the class description.

Options: not used at the moment.




Parameters
================


- table

    

- fields

    

- options

    


Return values
================

Returns false | string.


Exceptions thrown
================

- [PDOException](https://www.php.net/manual/en/class.pdoexception.php).&nbsp;

- [NoPdoConnectionException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Exception/NoPdoConnectionException.php).&nbsp;







Source Code
===========
See the source code for method [LightDatabasePdoWrapper::insert](https://github.com/lingtalfi/Light_Database/blob/master/LightDatabasePdoWrapper.php#L173-L178)


See Also
================

The [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) class.

Previous method: [getConnectionException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/getConnectionException.md)<br>Next method: [replace](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/replace.md)<br>

