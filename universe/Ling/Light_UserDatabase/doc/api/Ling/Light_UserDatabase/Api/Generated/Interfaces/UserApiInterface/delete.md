[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Interfaces\UserApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface.md)


UserApiInterface::delete
================



UserApiInterface::delete — Deletes the user rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [UserApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the user rows matching the given where conditions, and returns the number of deleted rows.
If where is null, all the rows of the table will be deleted.

False might be returned in case of a problem and if you don't catch db exceptions.




Parameters
================


- where

    

- markers

    


Return values
================

Returns false | int.








Source Code
===========
See the source code for method [UserApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Interfaces/UserApiInterface.php#L258-L258)


See Also
================

The [UserApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface.md) class.

Previous method: [updateUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/updateUserByIdentifier.md)<br>Next method: [deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/deleteUserById.md)<br>

