[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\SimplePdoWrapper class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md)


SimplePdoWrapper::delete
================



SimplePdoWrapper::delete — Executes the delete statement and returns the number of deleted rows.




Description
================


public [SimplePdoWrapper::delete](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/delete.md)(?$table, $whereConds = null, $markers = []) : mixed




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

- [NoPdoConnectionException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/NoPdoConnectionException.md).&nbsp;







Source Code
===========
See the source code for method [SimplePdoWrapper::delete](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapper.php#L241-L259)


See Also
================

The [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md) class.

Previous method: [update](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/update.md)<br>Next method: [fetch](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/fetch.md)<br>

