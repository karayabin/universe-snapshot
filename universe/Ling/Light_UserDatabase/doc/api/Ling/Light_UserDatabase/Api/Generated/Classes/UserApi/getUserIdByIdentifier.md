[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Classes\UserApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi.md)


UserApi::getUserIdByIdentifier
================



UserApi::getUserIdByIdentifier — Returns the id of the lud_user table.




Description
================


public [UserApi::getUserIdByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserIdByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




Returns the id of the lud_user table.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- identifier

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns string | mixed.








Source Code
===========
See the source code for method [UserApi::getUserIdByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/UserApi.php#L224-L239)


See Also
================

The [UserApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi.md) class.

Previous method: [getUsersKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUsersKey2Value.md)<br>Next method: [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getAllIds.md)<br>

