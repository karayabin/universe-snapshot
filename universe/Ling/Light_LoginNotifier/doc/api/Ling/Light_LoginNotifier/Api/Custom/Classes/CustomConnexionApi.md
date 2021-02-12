[Back to the Ling/Light_LoginNotifier api](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier.md)



The CustomConnexionApi class
================
2020-11-27 --> 2021-02-11






Introduction
============

The CustomConnexionApi class.



Class synopsis
==============


class <span class="pl-k">CustomConnexionApi</span> extends [ConnexionApi](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi.md) implements [ConnexionApiInterface](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface.md), [CustomConnexionApiInterface](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Custom/Interfaces/CustomConnexionApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightLoginNotifierBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightLoginNotifierBaseApi::$container](#property-container) ;
    - protected string [LightLoginNotifierBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Custom/Classes/CustomConnexionApi/__construct.md)() : void

- Inherited methods
    - public [ConnexionApi::insertConnexion](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/insertConnexion.md)(array $connexion, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [ConnexionApi::insertConnexions](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/insertConnexions.md)(array $connexions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [ConnexionApi::fetchAll](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/fetchAll.md)(?array $components = []) : array
    - public [ConnexionApi::fetch](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/fetch.md)(?array $components = []) : array
    - public [ConnexionApi::getConnexionById](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/getConnexionById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ConnexionApi::getConnexion](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/getConnexion.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ConnexionApi::getConnexions](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/getConnexions.md)($where, ?array $markers = []) : array
    - public [ConnexionApi::getConnexionsColumn](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/getConnexionsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [ConnexionApi::getConnexionsColumns](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/getConnexionsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [ConnexionApi::getConnexionsKey2Value](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/getConnexionsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [ConnexionApi::getAllIds](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/getAllIds.md)() : array
    - public [ConnexionApi::updateConnexionById](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/updateConnexionById.md)(int $id, array $connexion, ?array $extraWhere = [], ?array $markers = []) : void
    - public [ConnexionApi::updateConnexion](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/updateConnexion.md)(array $connexion, ?$where = null, ?array $markers = []) : void
    - public [ConnexionApi::delete](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [ConnexionApi::deleteConnexionById](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/deleteConnexionById.md)(int $id) : void
    - public [ConnexionApi::deleteConnexionByIds](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/deleteConnexionByIds.md)(array $ids) : void
    - public [LightLoginNotifierBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/LightLoginNotifierBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightLoginNotifierBaseApi::setContainer](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/LightLoginNotifierBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomConnexionApi::__construct](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Custom/Classes/CustomConnexionApi/__construct.md) &ndash; Builds the CustomConnexionApi instance.
- [ConnexionApi::insertConnexion](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/insertConnexion.md) &ndash; Inserts the given connexion in the database.
- [ConnexionApi::insertConnexions](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/insertConnexions.md) &ndash; Inserts the given connexion rows in the database.
- [ConnexionApi::fetchAll](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [ConnexionApi::fetch](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [ConnexionApi::getConnexionById](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/getConnexionById.md) &ndash; Returns the connexion row identified by the given id.
- [ConnexionApi::getConnexion](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/getConnexion.md) &ndash; Returns the connexion row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ConnexionApi::getConnexions](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/getConnexions.md) &ndash; Returns the connexion rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ConnexionApi::getConnexionsColumn](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/getConnexionsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ConnexionApi::getConnexionsColumns](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/getConnexionsColumns.md) &ndash; Returns a subset of the connexion rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ConnexionApi::getConnexionsKey2Value](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/getConnexionsKey2Value.md) &ndash; Returns an array of $key => $value from the connexion rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ConnexionApi::getAllIds](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/getAllIds.md) &ndash; Returns an array of all connexion ids.
- [ConnexionApi::updateConnexionById](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/updateConnexionById.md) &ndash; Updates the connexion row identified by the given id.
- [ConnexionApi::updateConnexion](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/updateConnexion.md) &ndash; Updates the connexion row.
- [ConnexionApi::delete](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/delete.md) &ndash; Deletes the connexion rows matching the given where conditions, and returns the number of deleted rows.
- [ConnexionApi::deleteConnexionById](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/deleteConnexionById.md) &ndash; Deletes the connexion identified by the given id.
- [ConnexionApi::deleteConnexionByIds](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/deleteConnexionByIds.md) &ndash; Deletes the connexion rows identified by the given ids.
- [LightLoginNotifierBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/LightLoginNotifierBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightLoginNotifierBaseApi::setContainer](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/LightLoginNotifierBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_LoginNotifier\Api\Custom\Classes\CustomConnexionApi<br>
See the source code of [Ling\Light_LoginNotifier\Api\Custom\Classes\CustomConnexionApi](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/Api/Custom/Classes/CustomConnexionApi.php)



SeeAlso
==============
Next class: [CustomLightLoginNotifierBaseApi](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Custom/Classes/CustomLightLoginNotifierBaseApi.md)<br>
