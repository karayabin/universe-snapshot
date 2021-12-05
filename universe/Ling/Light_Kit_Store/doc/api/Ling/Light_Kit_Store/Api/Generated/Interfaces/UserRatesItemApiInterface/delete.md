[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\UserRatesItemApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface.md)


UserRatesItemApiInterface::delete
================



UserRatesItemApiInterface::delete — Deletes the userRatesItem rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [UserRatesItemApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the userRatesItem rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [UserRatesItemApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/UserRatesItemApiInterface.php#L256-L256)


See Also
================

The [UserRatesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface.md) class.

Previous method: [updateUserRatesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/updateUserRatesItem.md)<br>Next method: [deleteUserRatesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/deleteUserRatesItemById.md)<br>

