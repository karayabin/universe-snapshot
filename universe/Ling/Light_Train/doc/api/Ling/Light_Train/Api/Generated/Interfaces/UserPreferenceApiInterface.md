[Back to the Ling/Light_Train api](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train.md)



The UserPreferenceApiInterface class
================
2021-02-01 --> 2021-05-31






Introduction
============

The UserPreferenceApiInterface interface.
It implements the ling standard object methods concept.



Class synopsis
==============


abstract class <span class="pl-k">UserPreferenceApiInterface</span>  {

- Methods
    - abstract public [insertUserPreference](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/insertUserPreference.md)(array $userPreference, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertUserPreferences](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/insertUserPreferences.md)(array $userPreferences, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [fetchAll](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [fetch](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [getUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreferenceById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserPreference](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreference.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserPreferences](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreferences.md)($where, ?array $markers = []) : array
    - abstract public [getUserPreferencesColumn](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreferencesColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getUserPreferencesColumns](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreferencesColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getUserPreferencesKey2Value](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreferencesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/getAllIds.md)() : array
    - abstract public [updateUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/updateUserPreferenceById.md)(int $id, array $userPreference) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deleteUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/deleteUserPreferenceById.md)(int $id) : void
    - abstract public [deleteUserPreferenceByIds](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/deleteUserPreferenceByIds.md)(array $ids) : void

}






Methods
==============

- [UserPreferenceApiInterface::insertUserPreference](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/insertUserPreference.md) &ndash; Inserts the given userPreference in the database.
- [UserPreferenceApiInterface::insertUserPreferences](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/insertUserPreferences.md) &ndash; Inserts the given userPreference rows in the database.
- [UserPreferenceApiInterface::fetchAll](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [UserPreferenceApiInterface::fetch](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [UserPreferenceApiInterface::getUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreferenceById.md) &ndash; Returns the userPreference row identified by the given id.
- [UserPreferenceApiInterface::getUserPreference](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreference.md) &ndash; Returns the userPreference row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApiInterface::getUserPreferences](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreferences.md) &ndash; Returns the userPreference rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApiInterface::getUserPreferencesColumn](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreferencesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApiInterface::getUserPreferencesColumns](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreferencesColumns.md) &ndash; Returns a subset of the userPreference rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApiInterface::getUserPreferencesKey2Value](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreferencesKey2Value.md) &ndash; Returns an array of $key => $value from the userPreference rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApiInterface::getAllIds](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/getAllIds.md) &ndash; Returns an array of all userPreference ids.
- [UserPreferenceApiInterface::updateUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/updateUserPreferenceById.md) &ndash; Updates the userPreference row identified by the given id.
- [UserPreferenceApiInterface::delete](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/delete.md) &ndash; Deletes the userPreference rows matching the given where conditions, and returns the number of deleted rows.
- [UserPreferenceApiInterface::deleteUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/deleteUserPreferenceById.md) &ndash; Deletes the userPreference identified by the given id.
- [UserPreferenceApiInterface::deleteUserPreferenceByIds](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/deleteUserPreferenceByIds.md) &ndash; Deletes the userPreference rows identified by the given ids.





Location
=============
Ling\Light_Train\Api\Generated\Interfaces\UserPreferenceApiInterface<br>
See the source code of [Ling\Light_Train\Api\Generated\Interfaces\UserPreferenceApiInterface](https://github.com/lingtalfi/Light_Train/blob/master/Api/Generated/Interfaces/UserPreferenceApiInterface.php)



SeeAlso
==============
Previous class: [UserPreferenceApi](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi.md)<br>Next class: [LightTrainApiFactory](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/LightTrainApiFactory.md)<br>
