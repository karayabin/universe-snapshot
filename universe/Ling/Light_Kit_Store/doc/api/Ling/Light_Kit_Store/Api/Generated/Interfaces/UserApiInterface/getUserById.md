[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\UserApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface.md)


UserApiInterface::getUserById
================



UserApiInterface::getUserById — Returns the user row identified by the given id.




Description
================


abstract public [UserApiInterface::getUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getUserById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the user row identified by the given id.

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
See the source code for method [UserApiInterface::getUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/UserApiInterface.php#L95-L95)


See Also
================

The [UserApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/fetch.md)<br>Next method: [getUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getUser.md)<br>

