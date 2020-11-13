[Back to the Ling/Light_UserPreferences api](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences.md)<br>
[Back to the Ling\Light_UserPreferences\Api\Generated\Interfaces\UserPreferenceApiInterface class](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface.md)


UserPreferenceApiInterface::delete
================



UserPreferenceApiInterface::delete — Deletes the userPreference rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [UserPreferenceApiInterface::delete](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




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
See the source code for method [UserPreferenceApiInterface::delete](https://github.com/lingtalfi/Light_UserPreferences/blob/master/Api/Generated/Interfaces/UserPreferenceApiInterface.php#L232-L232)


See Also
================

The [UserPreferenceApiInterface](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface.md) class.

Previous method: [updateUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface/updateUserPreference.md)<br>Next method: [deleteUserPreferenceById](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface/deleteUserPreferenceById.md)<br>

