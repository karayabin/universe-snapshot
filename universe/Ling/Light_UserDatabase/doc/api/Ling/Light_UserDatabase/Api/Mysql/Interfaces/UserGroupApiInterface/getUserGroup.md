[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Interfaces\UserGroupApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface.md)


UserGroupApiInterface::getUserGroup
================



UserGroupApiInterface::getUserGroup — Returns the userGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [UserGroupApiInterface::getUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroup.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the userGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- where

    

- markers

    

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
See the source code for method [UserGroupApiInterface::getUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Interfaces/UserGroupApiInterface.php#L85-L85)


See Also
================

The [UserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface.md) class.

Previous method: [getUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroupByName.md)<br>Next method: [getUserGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroups.md)<br>

