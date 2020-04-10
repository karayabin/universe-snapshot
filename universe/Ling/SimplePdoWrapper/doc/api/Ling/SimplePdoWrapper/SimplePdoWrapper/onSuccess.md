[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\SimplePdoWrapper class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md)


SimplePdoWrapper::onSuccess
================



SimplePdoWrapper::onSuccess — A hook for other classes to use.




Description
================


protected [SimplePdoWrapper::onSuccess](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/onSuccess.md)(string $type, string $table, string $query, array $arguments, ?$return = true) : void




A hook for other classes to use.
This hook is triggered every time one of the following operation is triggered (basically an operation that
changes the state of the database):

- insert
- replace
- update
- delete


Beware that if you use the executeStatement method to perform an insert for instance, this will not trigger
this onSuccess method (i.e. you need to call the insert method directly).

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================


- type

    

- table

    

- query

    

- arguments

    

- return

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [SimplePdoWrapper::onSuccess](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapper.php#L461-L464)


See Also
================

The [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md) class.

Previous method: [storeQueryObject](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/storeQueryObject.md)<br>Next method: [addAssignmentListSubStmt](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/addAssignmentListSubStmt.md)<br>

