[Back to the Ling/Light_UserPreferences api](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences.md)



The CustomUserPreferenceApi class
================
2020-07-31 --> 2021-03-15






Introduction
============

The CustomUserPreferenceApi class.



Class synopsis
==============


class <span class="pl-k">CustomUserPreferenceApi</span> extends [UserPreferenceApi](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi.md) implements [UserPreferenceApiInterface](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface.md), [CustomUserPreferenceApiInterface](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Interfaces/CustomUserPreferenceApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserPreferencesBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserPreferencesBaseApi::$container](#property-container) ;
    - protected string [LightUserPreferencesBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Classes/CustomUserPreferenceApi/__construct.md)() : void
    - public [getPreferencesByUserId](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Classes/CustomUserPreferenceApi/getPreferencesByUserId.md)(?int $userId = null, ?array $options = []) : array
    - private [error](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Classes/CustomUserPreferenceApi/error.md)(string $msg) : void

- Inherited methods
    - public [UserPreferenceApi::insertUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/insertUserPreference.md)(array $userPreference, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [UserPreferenceApi::insertUserPreferences](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/insertUserPreferences.md)(array $userPreferences, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [UserPreferenceApi::fetchAll](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/fetchAll.md)(?array $components = []) : array
    - public [UserPreferenceApi::fetch](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/fetch.md)(?array $components = []) : array
    - public [UserPreferenceApi::getUserPreferenceById](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getUserPreferenceById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [UserPreferenceApi::getUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getUserPreference.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [UserPreferenceApi::getUserPreferences](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getUserPreferences.md)($where, ?array $markers = []) : array
    - public [UserPreferenceApi::getUserPreferencesColumn](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [UserPreferenceApi::getUserPreferencesColumns](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesColumns.md)($columns, $where, ?array $markers = []) : array
    - public [UserPreferenceApi::getUserPreferencesKey2Value](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [UserPreferenceApi::getAllIds](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getAllIds.md)() : array
    - public [UserPreferenceApi::updateUserPreferenceById](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/updateUserPreferenceById.md)(int $id, array $userPreference, ?array $extraWhere = [], ?array $markers = []) : void
    - public [UserPreferenceApi::updateUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/updateUserPreference.md)(array $userPreference, ?$where = null, ?array $markers = []) : void
    - public [UserPreferenceApi::delete](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [UserPreferenceApi::deleteUserPreferenceById](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/deleteUserPreferenceById.md)(int $id) : void
    - public [UserPreferenceApi::deleteUserPreferenceByIds](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/deleteUserPreferenceByIds.md)(array $ids) : void
    - public [UserPreferenceApi::deleteUserPreferenceByLudUserId](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/deleteUserPreferenceByLudUserId.md)(int $userId) : void
    - public [LightUserPreferencesBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/LightUserPreferencesBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserPreferencesBaseApi::setContainer](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/LightUserPreferencesBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomUserPreferenceApi::__construct](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Classes/CustomUserPreferenceApi/__construct.md) &ndash; Builds the CustomUserPreferenceApi instance.
- [CustomUserPreferenceApi::getPreferencesByUserId](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Classes/CustomUserPreferenceApi/getPreferencesByUserId.md) &ndash; Returns by default all the preferences as rows, for the given user id.
- [CustomUserPreferenceApi::error](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Classes/CustomUserPreferenceApi/error.md) &ndash; Throws an exception.
- [UserPreferenceApi::insertUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/insertUserPreference.md) &ndash; Inserts the given user preference in the database.
- [UserPreferenceApi::insertUserPreferences](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/insertUserPreferences.md) &ndash; Inserts the given user preference rows in the database.
- [UserPreferenceApi::fetchAll](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [UserPreferenceApi::fetch](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [UserPreferenceApi::getUserPreferenceById](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getUserPreferenceById.md) &ndash; Returns the user preference row identified by the given id.
- [UserPreferenceApi::getUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getUserPreference.md) &ndash; Returns the userPreference row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApi::getUserPreferences](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getUserPreferences.md) &ndash; Returns the userPreference rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApi::getUserPreferencesColumn](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApi::getUserPreferencesColumns](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesColumns.md) &ndash; Returns a subset of the userPreference rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApi::getUserPreferencesKey2Value](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesKey2Value.md) &ndash; Returns an array of $key => $value from the userPreference rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApi::getAllIds](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getAllIds.md) &ndash; Returns an array of all userPreference ids.
- [UserPreferenceApi::updateUserPreferenceById](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/updateUserPreferenceById.md) &ndash; Updates the user preference row identified by the given id.
- [UserPreferenceApi::updateUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/updateUserPreference.md) &ndash; Updates the user preference row.
- [UserPreferenceApi::delete](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/delete.md) &ndash; Deletes the userPreference rows matching the given where conditions, and returns the number of deleted rows.
- [UserPreferenceApi::deleteUserPreferenceById](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/deleteUserPreferenceById.md) &ndash; Deletes the user preference identified by the given id.
- [UserPreferenceApi::deleteUserPreferenceByIds](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/deleteUserPreferenceByIds.md) &ndash; Deletes the user preference rows identified by the given ids.
- [UserPreferenceApi::deleteUserPreferenceByLudUserId](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/deleteUserPreferenceByLudUserId.md) &ndash; Deletes the user preference rows having the given user id.
- [LightUserPreferencesBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/LightUserPreferencesBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserPreferencesBaseApi::setContainer](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/LightUserPreferencesBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserPreferences\Api\Custom\Classes\CustomUserPreferenceApi<br>
See the source code of [Ling\Light_UserPreferences\Api\Custom\Classes\CustomUserPreferenceApi](https://github.com/lingtalfi/Light_UserPreferences/blob/master/Api/Custom/Classes/CustomUserPreferenceApi.php)



SeeAlso
==============
Previous class: [CustomLightUserPreferencesBaseApi](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Classes/CustomLightUserPreferencesBaseApi.md)<br>Next class: [CustomLightUserPreferencesApiFactory](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/CustomLightUserPreferencesApiFactory.md)<br>
