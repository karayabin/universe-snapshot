[Back to the Ling/Light_Train api](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train.md)<br>
[Back to the Ling\Light_Train\Api\Generated\Interfaces\UserPreferenceApiInterface class](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface.md)


UserPreferenceApiInterface::delete
================



UserPreferenceApiInterface::delete — Deletes the userPreference rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [UserPreferenceApiInterface::delete](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the userPreference rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [UserPreferenceApiInterface::delete](https://github.com/lingtalfi/Light_Train/blob/master/Api/Generated/Interfaces/UserPreferenceApiInterface.php#L216-L216)


See Also
================

The [UserPreferenceApiInterface](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface.md) class.

Previous method: [updateUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/updateUserPreferenceById.md)<br>Next method: [deleteUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/deleteUserPreferenceById.md)<br>

