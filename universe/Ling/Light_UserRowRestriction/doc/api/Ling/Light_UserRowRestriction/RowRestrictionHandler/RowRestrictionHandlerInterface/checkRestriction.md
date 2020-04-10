[Back to the Ling/Light_UserRowRestriction api](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction.md)<br>
[Back to the Ling\Light_UserRowRestriction\RowRestrictionHandler\RowRestrictionHandlerInterface class](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface.md)


RowRestrictionHandlerInterface::checkRestriction
================



RowRestrictionHandlerInterface::checkRestriction — table and parameters.




Description
================


abstract public [RowRestrictionHandlerInterface::checkRestriction](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface/checkRestriction.md)(Ling\Light_User\LightUserInterface $user, string $table, ?...$args) : void




Checks that the current user is allowed to execute the action she/he wants, which is described by the
table and parameters.

An exception is thrown if that's not the case.




Parameters
================


- user

    

- table

    

- args

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [RowRestrictionHandlerInterface::checkRestriction](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/RowRestrictionHandler/RowRestrictionHandlerInterface.php#L33-L33)


See Also
================

The [RowRestrictionHandlerInterface](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/RowRestrictionHandler/RowRestrictionHandlerInterface.md) class.



