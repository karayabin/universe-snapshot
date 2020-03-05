[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Interfaces\UserGroupApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface.md)


UserGroupApiInterface::getUserGroupByName
================



UserGroupApiInterface::getUserGroupByName — Returns the userGroup row identified by the given name.




Description
================


abstract public [UserGroupApiInterface::getUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroupByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the userGroup row identified by the given name.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- name

    

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
See the source code for method [UserGroupApiInterface::getUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Interfaces/UserGroupApiInterface.php#L66-L66)


See Also
================

The [UserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface.md) class.

Previous method: [getUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroupById.md)<br>Next method: [getUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroup.md)<br>

