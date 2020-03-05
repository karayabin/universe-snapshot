[Back to the Ling/Light_UserRowRestriction api](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction.md)<br>
[Back to the Ling\Light_UserRowRestriction\RowRestrictionHandler\RowRestrictionHandlerInterface class](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface.md)


RowRestrictionHandlerInterface::checkRestriction
================



RowRestrictionHandlerInterface::checkRestriction — table, crudType, eventName and args parameters.




Description
================


abstract public [RowRestrictionHandlerInterface::checkRestriction](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface/checkRestriction.md)(Ling\Light_User\LightUserInterface $user, string $table, string $crudType, ?...$args) : void




Checks that the current user is allowed to execute the action she/he wants, which is described by the
table, crudType, eventName and args parameters.

An exception is thrown if that's not the case.

The crudType is one of:
- create
- read
- update (includes replace for now)
- delete




Parameters
================


- user

    

- table

    

- crudType

    

- args

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [RowRestrictionHandlerInterface::checkRestriction](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/RowRestrictionHandler/RowRestrictionHandlerInterface.php#L38-L38)


See Also
================

The [RowRestrictionHandlerInterface](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface.md) class.



