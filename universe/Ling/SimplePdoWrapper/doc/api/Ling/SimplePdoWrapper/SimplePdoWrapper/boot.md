[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\SimplePdoWrapper class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md)


SimplePdoWrapper::boot
================



SimplePdoWrapper::boot — You can use this method to initialize a "query method" (see SimplePdoWrapperInterface for more details).




Description
================


protected [SimplePdoWrapper::boot](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/boot.md)() : [PDO](https://www.php.net/manual/en/class.pdo.php) | null




You can use this method to initialize a "query method" (see SimplePdoWrapperInterface for more details).
It basically resets the current error to null, and returns the pdo connection instance.




Parameters
================

This method has no parameters.


Return values
================

Returns [PDO](https://www.php.net/manual/en/class.pdo.php) | null.


Exceptions thrown
================

- [NoPdoConnectionException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/NoPdoConnectionException.md).&nbsp;







Source Code
===========
See the source code for method [SimplePdoWrapper::boot](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapper.php#L484-L488)


See Also
================

The [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md) class.

Previous method: [addWhereSubStmt](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/addWhereSubStmt.md)<br>Next method: [storeQueryObject](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/storeQueryObject.md)<br>

