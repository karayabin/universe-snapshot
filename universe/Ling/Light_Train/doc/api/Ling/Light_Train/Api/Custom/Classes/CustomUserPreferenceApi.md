[Back to the Ling/Light_Train api](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train.md)



The CustomUserPreferenceApi class
================
2021-02-01 --> 2021-05-31






Introduction
============

The CustomUserPreferenceApi class.



Class synopsis
==============


class <span class="pl-k">CustomUserPreferenceApi</span> extends [UserPreferenceApi](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi.md) implements [UserPreferenceApiInterface](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface.md), [CustomUserPreferenceApiInterface](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Custom/Interfaces/CustomUserPreferenceApiInterface.md) {

- Inherited properties
    - protected Ling\Light_Database\Service\LightDatabaseService [LightTrainBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected Ling\Light\ServiceContainer\LightServiceContainerInterface [LightTrainBaseApi::$container](#property-container) ;
    - protected string [LightTrainBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Custom/Classes/CustomUserPreferenceApi/__construct.md)() : void

- Inherited methods
    - public [UserPreferenceApi::insertUserPreference](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/insertUserPreference.md)(array $userPreference, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [UserPreferenceApi::insertUserPreferences](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/insertUserPreferences.md)(array $userPreferences, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [UserPreferenceApi::fetchAll](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/fetchAll.md)(?array $components = []) : array
    - public [UserPreferenceApi::fetch](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/fetch.md)(?array $components = []) : array
    - public [UserPreferenceApi::getUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreferenceById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [UserPreferenceApi::getUserPreference](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreference.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [UserPreferenceApi::getUserPreferences](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreferences.md)($where, ?array $markers = []) : array
    - public [UserPreferenceApi::getUserPreferencesColumn](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [UserPreferenceApi::getUserPreferencesColumns](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesColumns.md)($columns, $where, ?array $markers = []) : array
    - public [UserPreferenceApi::getUserPreferencesKey2Value](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [UserPreferenceApi::getAllIds](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getAllIds.md)() : array
    - public [UserPreferenceApi::updateUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/updateUserPreferenceById.md)(int $id, array $userPreference) : void
    - public [UserPreferenceApi::delete](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [UserPreferenceApi::deleteUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/deleteUserPreferenceById.md)(int $id) : void
    - public [UserPreferenceApi::deleteUserPreferenceByIds](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/deleteUserPreferenceByIds.md)(array $ids) : void
    - public [LightTrainBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/LightTrainBaseApi/setPdoWrapper.md)(Ling\SimplePdoWrapper\SimplePdoWrapperInterface $pdoWrapper) : void
    - public [LightTrainBaseApi::setContainer](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/LightTrainBaseApi/setContainer.md)(Ling\Light\ServiceContainer\LightServiceContainerInterface $container) : void

}






Methods
==============

- [CustomUserPreferenceApi::__construct](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Custom/Classes/CustomUserPreferenceApi/__construct.md) &ndash; Builds the CustomUserPreferenceApi instance.
- [UserPreferenceApi::insertUserPreference](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/insertUserPreference.md) &ndash; Inserts the given userPreference in the database.
- [UserPreferenceApi::insertUserPreferences](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/insertUserPreferences.md) &ndash; Inserts the given userPreference rows in the database.
- [UserPreferenceApi::fetchAll](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [UserPreferenceApi::fetch](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [UserPreferenceApi::getUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreferenceById.md) &ndash; Returns the userPreference row identified by the given id.
- [UserPreferenceApi::getUserPreference](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreference.md) &ndash; Returns the userPreference row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApi::getUserPreferences](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreferences.md) &ndash; Returns the userPreference rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApi::getUserPreferencesColumn](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApi::getUserPreferencesColumns](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesColumns.md) &ndash; Returns a subset of the userPreference rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApi::getUserPreferencesKey2Value](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesKey2Value.md) &ndash; Returns an array of $key => $value from the userPreference rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPreferenceApi::getAllIds](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getAllIds.md) &ndash; Returns an array of all userPreference ids.
- [UserPreferenceApi::updateUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/updateUserPreferenceById.md) &ndash; Updates the userPreference row identified by the given id.
- [UserPreferenceApi::delete](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/delete.md) &ndash; Deletes the userPreference rows matching the given where conditions, and returns the number of deleted rows.
- [UserPreferenceApi::deleteUserPreferenceById](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/deleteUserPreferenceById.md) &ndash; Deletes the userPreference identified by the given id.
- [UserPreferenceApi::deleteUserPreferenceByIds](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/deleteUserPreferenceByIds.md) &ndash; Deletes the userPreference rows identified by the given ids.
- [LightTrainBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/LightTrainBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightTrainBaseApi::setContainer](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/LightTrainBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Train\Api\Custom\Classes\CustomUserPreferenceApi<br>
See the source code of [Ling\Light_Train\Api\Custom\Classes\CustomUserPreferenceApi](https://github.com/lingtalfi/Light_Train/blob/master/Api/Custom/Classes/CustomUserPreferenceApi.php)



SeeAlso
==============
Previous class: [CustomLightTrainBaseApi](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Custom/Classes/CustomLightTrainBaseApi.md)<br>Next class: [CustomLightTrainApiFactory](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Custom/CustomLightTrainApiFactory.md)<br>
