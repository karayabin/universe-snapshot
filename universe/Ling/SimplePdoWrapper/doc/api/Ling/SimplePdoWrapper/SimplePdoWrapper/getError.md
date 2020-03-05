[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\SimplePdoWrapper class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md)


SimplePdoWrapper::getError
================



SimplePdoWrapper::getError — Returns the error info of the last statement executed, or null if there was no error.




Description
================


public [SimplePdoWrapper::getError](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/getError.md)() : null | array




Returns the error info of the last statement executed, or null if there was no error.
Note: the value is reinitialized to null on every method that queries a statement.




Parameters
================

This method has no parameters.


Return values
================

Returns null | array.
The pdo error info objects (http://php.net/manual/en/pdo.errorinfo.php)     - 0: SQLSTATE error code (5 chars alphanumeric)
     - 1: Driver specific error code
     - 2: Driver specific error message







Source Code
===========
See the source code for method [SimplePdoWrapper::getError](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapper.php#L105-L115)


See Also
================

The [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md) class.

Previous method: [setErrorMode](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/setErrorMode.md)<br>Next method: [transaction](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/transaction.md)<br>

