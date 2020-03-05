[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\SimplePdoWrapper class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md)


SimplePdoWrapper::addAssignmentListSubStmt
================



SimplePdoWrapper::addAssignmentListSubStmt — for INSERT or UPDATE like statements.




Description
================


protected static [SimplePdoWrapper::addAssignmentListSubStmt](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/addAssignmentListSubStmt.md)(&$stmt, array &$markers, array $fields, ?$firstForm = false) : void




Adds a helper string to the given $stmt,
for INSERT or UPDATE like statements.

The string depends on the given $firstForm.


- With firstForm = true, the string looks like this:

         (a, b, c) VALUES (:a, :b, :c)


- With firstForm = false, the string looks like this:

         a=:a, b=:b, c=:c




Parameters
================


- stmt

    

- markers

    

- fields

    

- firstForm

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [SimplePdoWrapper::addAssignmentListSubStmt](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapper.php#L498-L530)


See Also
================

The [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md) class.

Previous method: [onSuccess](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/onSuccess.md)<br>

