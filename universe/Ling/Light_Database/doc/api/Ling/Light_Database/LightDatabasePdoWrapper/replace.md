[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)


LightDatabasePdoWrapper::replace
================



LightDatabasePdoWrapper::replace — Executes the replace statement and returns the lastInsertId.




Description
================


public [LightDatabasePdoWrapper::replace](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/replace.md)($table, ?array $fields = [], ?array $options = []) : false | string




Executes the replace statement and returns the lastInsertId.

Note that **replace** is a mysql extension of the sql standard.

Note: at least in mysql a replace statement always create a new record,
and potentially delete the old record (based on primary key or unique index detection)
if it gets in the way.




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
See the source code for method [LightDatabasePdoWrapper::replace](https://github.com/lingtalfi/Light_Database/blob/master/LightDatabasePdoWrapper.php#L185-L190)


See Also
================

The [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) class.

Previous method: [insert](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/insert.md)<br>Next method: [update](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/update.md)<br>

