[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\SimplePdoWrapper class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md)


SimplePdoWrapper::addWhereSubStmt
================



SimplePdoWrapper::addWhereSubStmt — defined in the comments of the SimplePdoWrapperInterface->update method.




Description
================


public static [SimplePdoWrapper::addWhereSubStmt](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/addWhereSubStmt.md)(&$stmt, array &$markers, $whereConds, ?array $options = []) : void




Adds the $whereConds to the given statement ($stmt), using the notation
defined in the comments of the SimplePdoWrapperInterface->update method.

Available options are:
- whereKeyword: string=WHERE. Which keyword to use as where.
        If your query already contains the "where" keyword, you might set this to "AND" for instance (or "OR").




Parameters
================


- stmt

    

- markers

    

- whereConds

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [SimplePdoWrapper::addWhereSubStmt](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapper.php#L437-L479)


See Also
================

The [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md) class.

Previous method: [executeStatement](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/executeStatement.md)<br>Next method: [boot](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/boot.md)<br>

