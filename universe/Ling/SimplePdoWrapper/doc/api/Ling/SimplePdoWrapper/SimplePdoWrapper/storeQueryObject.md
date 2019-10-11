[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\SimplePdoWrapper class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md)


SimplePdoWrapper::storeQueryObject
================



SimplePdoWrapper::storeQueryObject — Stores the query object so that we can get the errors out of it.




Description
================


protected [SimplePdoWrapper::storeQueryObject](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/storeQueryObject.md)(?$queryObject) : void




Stores the query object so that we can get the errors out of it.
The query object is one of:

- \PDO
- \PDOStatement


This query object will be used to return the current error for any query method.




Parameters
================


- queryObject

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [SimplePdoWrapper::storeQueryObject](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapper.php#L414-L417)


See Also
================

The [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md) class.

Previous method: [boot](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/boot.md)<br>Next method: [addAssignmentListSubStmt](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/addAssignmentListSubStmt.md)<br>

