[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The CustomLightUserDatabaseApiFactory class
================
2019-07-19 --> 2020-11-09






Introduction
============

The CustomLightUserDatabaseApiFactory class.



Class synopsis
==============


class <span class="pl-k">CustomLightUserDatabaseApiFactory</span> extends [LightUserDatabaseApiFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory.md)  {

- Inherited properties
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [LightUserDatabaseApiFactory::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseApiFactory::$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/CustomLightUserDatabaseApiFactory/__construct.md)() : void

- Inherited methods
    - public [LightUserDatabaseApiFactory::getUserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserGroupApi.md)() : [CustomUserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserGroupApiInterface.md)
    - public [LightUserDatabaseApiFactory::getUserApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserApi.md)() : [CustomUserApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserApiInterface.md)
    - public [LightUserDatabaseApiFactory::getPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionGroupApi.md)() : [CustomPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionGroupApiInterface.md)
    - public [LightUserDatabaseApiFactory::getPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionApi.md)() : [CustomPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionApiInterface.md)
    - public [LightUserDatabaseApiFactory::getUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserHasPermissionGroupApi.md)() : [CustomUserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserHasPermissionGroupApiInterface.md)
    - public [LightUserDatabaseApiFactory::getPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionGroupHasPermissionApi.md)() : [CustomPermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionGroupHasPermissionApiInterface.md)
    - public [LightUserDatabaseApiFactory::getPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPluginOptionApi.md)() : [CustomPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPluginOptionApiInterface.md)
    - public [LightUserDatabaseApiFactory::getUserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserGroupHasPluginOptionApi.md)() : [CustomUserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserGroupHasPluginOptionApiInterface.md)
    - public [LightUserDatabaseApiFactory::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDatabaseApiFactory::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomLightUserDatabaseApiFactory::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/CustomLightUserDatabaseApiFactory/__construct.md) &ndash; Builds the CustomLightUserDatabaseApiFactory instance.
- [LightUserDatabaseApiFactory::getUserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserGroupApi.md) &ndash; Returns a CustomUserGroupApiInterface.
- [LightUserDatabaseApiFactory::getUserApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserApi.md) &ndash; Returns a CustomUserApiInterface.
- [LightUserDatabaseApiFactory::getPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionGroupApi.md) &ndash; Returns a CustomPermissionGroupApiInterface.
- [LightUserDatabaseApiFactory::getPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionApi.md) &ndash; Returns a CustomPermissionApiInterface.
- [LightUserDatabaseApiFactory::getUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserHasPermissionGroupApi.md) &ndash; Returns a CustomUserHasPermissionGroupApiInterface.
- [LightUserDatabaseApiFactory::getPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionGroupHasPermissionApi.md) &ndash; Returns a CustomPermissionGroupHasPermissionApiInterface.
- [LightUserDatabaseApiFactory::getPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPluginOptionApi.md) &ndash; Returns a CustomPluginOptionApiInterface.
- [LightUserDatabaseApiFactory::getUserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserGroupHasPluginOptionApi.md) &ndash; Returns a CustomUserGroupHasPluginOptionApiInterface.
- [LightUserDatabaseApiFactory::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDatabaseApiFactory::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserDatabase\Api\Custom\CustomLightUserDatabaseApiFactory<br>
See the source code of [Ling\Light_UserDatabase\Api\Custom\CustomLightUserDatabaseApiFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Custom/CustomLightUserDatabaseApiFactory.php)



SeeAlso
==============
Previous class: [CustomUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomUserHasPermissionGroupApi.md)<br>Next class: [CustomPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionApiInterface.md)<br>
