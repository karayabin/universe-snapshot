[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\UserApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface.md)


UserApiInterface::delete
================



UserApiInterface::delete — Deletes the user rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [UserApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




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
See the source code for method [UserApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/UserApiInterface.php#L234-L234)


See Also
================

The [UserApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface.md) class.

Previous method: [updateUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/updateUser.md)<br>Next method: [deleteUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/deleteUserById.md)<br>

