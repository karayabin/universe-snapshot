[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\SimplePdoWrapperInterface class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md)


SimplePdoWrapperInterface::fetch
================



SimplePdoWrapperInterface::fetch — Executes the prepared statement and returns the fetched row, or false in case of failure.




Description
================


abstract public [SimplePdoWrapperInterface::fetch](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/fetch.md)($query, ?array $markers = [], ?$fetchStyle = null) : array | string | false




Executes the prepared statement and returns the fetched row, or false in case of failure.

Note: strings can be returned if you use fetch styles such as \PDO::FETCH_COLUMN.




Parameters
================


- query

    

- markers

    

- fetchStyle

    


Return values
================

Returns array | string | false.








Source Code
===========
See the source code for method [SimplePdoWrapperInterface::fetch](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapperInterface.php#L158-L158)


See Also
================

The [SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) class.

Previous method: [delete](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/delete.md)<br>Next method: [fetchAll](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/fetchAll.md)<br>

