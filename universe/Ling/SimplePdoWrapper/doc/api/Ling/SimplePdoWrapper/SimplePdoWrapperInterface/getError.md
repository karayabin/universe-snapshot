[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\SimplePdoWrapperInterface class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md)


SimplePdoWrapperInterface::getError
================



SimplePdoWrapperInterface::getError — Returns the error info of the last statement executed, or null if there was no error.




Description
================


abstract public [SimplePdoWrapperInterface::getError](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/getError.md)() : null | array




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
See the source code for method [SimplePdoWrapperInterface::getError](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapperInterface.php#L249-L249)


See Also
================

The [SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) class.

Previous method: [setErrorMode](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/setErrorMode.md)<br>

