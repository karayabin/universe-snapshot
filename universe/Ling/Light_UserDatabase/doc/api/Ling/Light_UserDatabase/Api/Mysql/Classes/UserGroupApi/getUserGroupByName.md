[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Classes\UserGroupApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi.md)


UserGroupApi::getUserGroupByName
================



UserGroupApi::getUserGroupByName — Returns the userGroup row identified by the given name.




Description
================


public [UserGroupApi::getUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroupByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




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
See the source code for method [UserGroupApi::getUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Classes/UserGroupApi.php#L96-L110)


See Also
================

The [UserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi.md) class.

Previous method: [getUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroupById.md)<br>Next method: [getUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroup.md)<br>

