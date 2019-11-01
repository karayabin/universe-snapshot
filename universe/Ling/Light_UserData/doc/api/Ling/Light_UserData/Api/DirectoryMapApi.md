[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The DirectoryMapApi class
================
2019-09-27 --> 2019-10-31






Introduction
============

The DirectoryMapApi class.



Class synopsis
==============


class <span class="pl-k">DirectoryMapApi</span> implements [DirectoryMapApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface.md) {

- Properties
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [$pdoWrapper](#property-pdoWrapper) ;
    - protected string [$microPermissionPlugin](#property-microPermissionPlugin) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/__construct.md)() : void
    - public [insertDirectoryMap](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/insertDirectoryMap.md)(array $directoryMap, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/getDirectoryMapByObfuscatedName.md)(string $obfuscated_name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [updateDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/updateDirectoryMapByObfuscatedName.md)(string $obfuscated_name, array $directoryMap) : void
    - public [deleteDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/deleteDirectoryMapByObfuscatedName.md)(string $obfuscated_name) : void
    - public [setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setMicroPermissionPlugin](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/setMicroPermissionPlugin.md)(string $pluginName) : void
    - protected [doInsertDirectoryMap](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/doInsertDirectoryMap.md)(array $directoryMap, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - protected [doGetDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/doGetDirectoryMapByObfuscatedName.md)(string $obfuscated_name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - protected [doUpdateDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/doUpdateDirectoryMapByObfuscatedName.md)(string $obfuscated_name, array $directoryMap) : void
    - protected [doDeleteDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/doDeleteDirectoryMapByObfuscatedName.md)(string $obfuscated_name) : void
    - protected [checkMicroPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/checkMicroPermission.md)(string $type) : void

}




Properties
=============

- <span id="property-pdoWrapper"><b>pdoWrapper</b></span>

    This property holds the pdoWrapper for this instance.
    
    

- <span id="property-microPermissionPlugin"><b>microPermissionPlugin</b></span>

    This property holds the microPermissionPlugin for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [DirectoryMapApi::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/__construct.md) &ndash; Builds the DirectoryMapApi instance.
- [DirectoryMapApi::insertDirectoryMap](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/insertDirectoryMap.md) &ndash; Inserts the given directoryMap in the database.
- [DirectoryMapApi::getDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/getDirectoryMapByObfuscatedName.md) &ndash; Returns the directoryMap row identified by the given obfuscated_name.
- [DirectoryMapApi::updateDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/updateDirectoryMapByObfuscatedName.md) &ndash; Updates the directoryMap row identified by the given obfuscated_name.
- [DirectoryMapApi::deleteDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/deleteDirectoryMapByObfuscatedName.md) &ndash; Deletes the directoryMap identified by the given obfuscated_name.
- [DirectoryMapApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [DirectoryMapApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/setContainer.md) &ndash; Sets the container.
- [DirectoryMapApi::setMicroPermissionPlugin](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/setMicroPermissionPlugin.md) &ndash; Sets the name of the plugin used to handle the micro-permissions.
- [DirectoryMapApi::doInsertDirectoryMap](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/doInsertDirectoryMap.md) &ndash; The working horse behind the insertDirectoryMap method.
- [DirectoryMapApi::doGetDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/doGetDirectoryMapByObfuscatedName.md) &ndash; The working horse behind the getDirectoryMapByObfuscatedName method.
- [DirectoryMapApi::doUpdateDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/doUpdateDirectoryMapByObfuscatedName.md) &ndash; The working horse behind the updateDirectoryMapByObfuscatedName method.
- [DirectoryMapApi::doDeleteDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/doDeleteDirectoryMapByObfuscatedName.md) &ndash; The working horse behind the deleteDirectoryMapByObfuscatedName method.
- [DirectoryMapApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/checkMicroPermission.md) &ndash; Checks whether the current user has the micro permission which type is specified.





Location
=============
Ling\Light_UserData\Api\DirectoryMapApi<br>
See the source code of [Ling\Light_UserData\Api\DirectoryMapApi](https://github.com/lingtalfi/Light_UserData/blob/master/Api/DirectoryMapApi.php)



SeeAlso
==============
Previous class: [CustomDirectoryMapApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomDirectoryMapApi.md)<br>Next class: [DirectoryMapApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface.md)<br>
