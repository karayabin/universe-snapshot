[Back to the Ling/Light_Train api](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train.md)<br>
[Back to the Ling\Light_Train\Api\Generated\Classes\UserPreferenceApi class](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi.md)


UserPreferenceApi::delete
================



UserPreferenceApi::delete — Deletes the userPreference rows matching the given where conditions, and returns the number of deleted rows.




Description
================


public [UserPreferenceApi::delete](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/delete.md)(?$where = null, ?array $markers = []) : false | int




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
See the source code for method [UserPreferenceApi::delete](https://github.com/lingtalfi/Light_Train/blob/master/Api/Generated/Classes/UserPreferenceApi.php#L263-L267)


See Also
================

The [UserPreferenceApi](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi.md) class.

Previous method: [updateUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/updateUserPreferenceById.md)<br>Next method: [deleteUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/deleteUserPreferenceById.md)<br>

