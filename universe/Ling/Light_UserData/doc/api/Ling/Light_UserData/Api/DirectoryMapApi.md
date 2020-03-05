[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The DirectoryMapApi class
================
2019-09-27 --> 2019-12-20






Introduction
============

The DirectoryMapApi class.



Class synopsis
==============


class <span class="pl-k">DirectoryMapApi</span> extends [LightUserDataBaseApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi.md) implements [DirectoryMapApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface.md) {

- Inherited properties
    - protected Ling\Light_Database\Service\LightDatabaseService [LightUserDataBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDataBaseApi::$container](#property-container) ;
    - protected string [LightUserDataBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/__construct.md)() : void
    - public [insertDirectoryMap](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/insertDirectoryMap.md)(array $directoryMap, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/getDirectoryMapByObfuscatedName.md)(string $obfuscated_name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getAllObfuscatedNames](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/getAllObfuscatedNames.md)() : array
    - public [updateDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/updateDirectoryMapByObfuscatedName.md)(string $obfuscated_name, array $directoryMap) : void
    - public [deleteDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/deleteDirectoryMapByObfuscatedName.md)(string $obfuscated_name) : void

- Inherited methods
    - public [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [LightUserDataBaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/checkMicroPermission.md)(string $type) : void

}






Methods
==============

- [DirectoryMapApi::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/__construct.md) &ndash; Builds the DirectoryMapApi instance.
- [DirectoryMapApi::insertDirectoryMap](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/insertDirectoryMap.md) &ndash; Inserts the given directoryMap in the database.
- [DirectoryMapApi::getDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/getDirectoryMapByObfuscatedName.md) &ndash; Returns the directoryMap row identified by the given obfuscated_name.
- [DirectoryMapApi::getAllObfuscatedNames](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/getAllObfuscatedNames.md) &ndash; Returns an array of all directoryMap obfuscated_names.
- [DirectoryMapApi::updateDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/updateDirectoryMapByObfuscatedName.md) &ndash; Updates the directoryMap row identified by the given obfuscated_name.
- [DirectoryMapApi::deleteDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/deleteDirectoryMapByObfuscatedName.md) &ndash; Deletes the directoryMap identified by the given obfuscated_name.
- [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/setContainer.md) &ndash; Sets the container.
- [LightUserDataBaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/checkMicroPermission.md) &ndash; Checks whether the current user has the micro permission which type is specified.





Location
=============
Ling\Light_UserData\Api\DirectoryMapApi<br>
See the source code of [Ling\Light_UserData\Api\DirectoryMapApi](https://github.com/lingtalfi/Light_UserData/blob/master/Api/DirectoryMapApi.php)



SeeAlso
==============
Previous class: [CustomDirectoryMapApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomDirectoryMapApi.md)<br>Next class: [DirectoryMapApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface.md)<br>
