[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\SimplePdoWrapperInterface class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md)


SimplePdoWrapperInterface::fetchAll
================



SimplePdoWrapperInterface::fetchAll — Executes the prepared statement and return an array containing all of the result set rows.




Description
================


abstract public [SimplePdoWrapperInterface::fetchAll](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/fetchAll.md)($query, ?array $markers = [], ?$fetchStyle = null, ?$fetchArg = null, ?array $ctorArgs = []) : array




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

Returns array.


Exceptions thrown
================

- [PDOException](https://www.php.net/manual/en/class.pdoexception.php).&nbsp;

- [NoPdoConnectionException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/NoPdoConnectionException.md).&nbsp;







Source Code
===========
See the source code for method [SimplePdoWrapperInterface::fetchAll](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapperInterface.php#L178-L178)


See Also
================

The [SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) class.

Previous method: [fetch](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/fetch.md)<br>Next method: [executeStatement](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/executeStatement.md)<br>

