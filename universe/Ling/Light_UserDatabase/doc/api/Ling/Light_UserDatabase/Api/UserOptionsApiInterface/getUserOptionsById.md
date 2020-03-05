[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\UserOptionsApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface.md)


UserOptionsApiInterface::getUserOptionsById
================



UserOptionsApiInterface::getUserOptionsById — Returns the userOptions row identified by the given id.




Description
================


abstract public [UserOptionsApiInterface::getUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface/getUserOptionsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the userOptions row identified by the given id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- id

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [UserOptionsApiInterface::getUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/UserOptionsApiInterface.php#L50-L50)


See Also
================

The [UserOptionsApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface.md) class.

Previous method: [insertUserOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface/insertUserOptions.md)<br>Next method: [updateUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface/updateUserOptionsById.md)<br>

