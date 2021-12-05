[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Classes\UserHasItemApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi.md)


UserHasItemApi::delete
================



UserHasItemApi::delete — Deletes the userHasItem rows matching the given where conditions, and returns the number of deleted rows.




Description
================


public [UserHasItemApi::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the userHasItem rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [UserHasItemApi::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/UserHasItemApi.php#L275-L279)


See Also
================

The [UserHasItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi.md) class.

Previous method: [updateUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/updateUserHasItem.md)<br>Next method: [deleteUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/deleteUserHasItemByUserIdAndItemId.md)<br>

