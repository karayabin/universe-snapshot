[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\SimplePdoWrapper class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md)


SimplePdoWrapper::fetchAll
================



SimplePdoWrapper::fetchAll — Executes the prepared statement and return an array containing all of the result set rows.




Description
================


public [SimplePdoWrapper::fetchAll](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/fetchAll.md)($query, ?array $markers = [], ?$fetchStyle = null, ?$fetchArg = null, ?array $ctorArgs = []) : false | array




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

- [NoPdoConnectionException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/NoPdoConnectionException.md).&nbsp;







Source Code
===========
See the source code for method [SimplePdoWrapper::fetchAll](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapper.php#L358-L393)


See Also
================

The [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md) class.

Previous method: [fetch](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/fetch.md)<br>Next method: [executeStatement](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/executeStatement.md)<br>

