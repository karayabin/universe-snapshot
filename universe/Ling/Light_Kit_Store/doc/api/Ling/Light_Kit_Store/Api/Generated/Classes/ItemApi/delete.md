[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Classes\ItemApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi.md)


ItemApi::delete
================



ItemApi::delete — Deletes the item rows matching the given where conditions, and returns the number of deleted rows.




Description
================


public [ItemApi::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the item rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [ItemApi::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/ItemApi.php#L437-L441)


See Also
================

The [ItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi.md) class.

Previous method: [updateItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/updateItem.md)<br>Next method: [deleteItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemById.md)<br>

