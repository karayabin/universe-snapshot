[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The LightUserDatabaseApiFactory class
================
2019-07-19 --> 2021-05-31






Introduction
============

The LightUserDatabaseApiFactory class.



Class synopsis
==============


class <span class="pl-k">LightUserDatabaseApiFactory</span>  {

- Properties
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/__construct.md)() : void
    - public [getUserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserGroupApi.md)() : [CustomUserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserGroupApiInterface.md)
    - public [getUserApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserApi.md)() : [CustomUserApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserApiInterface.md)
    - public [getPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionGroupApi.md)() : [CustomPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionGroupApiInterface.md)
    - public [getPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionApi.md)() : [CustomPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionApiInterface.md)
    - public [getUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserHasPermissionGroupApi.md)() : [CustomUserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserHasPermissionGroupApiInterface.md)
    - public [getPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionGroupHasPermissionApi.md)() : [CustomPermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionGroupHasPermissionApiInterface.md)
    - public [getPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPluginOptionApi.md)() : [CustomPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPluginOptionApiInterface.md)
    - public [getUserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserGroupHasPluginOptionApi.md)() : [CustomUserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserGroupHasPluginOptionApiInterface.md)
    - public [setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-pdoWrapper"><b>pdoWrapper</b></span>

    This property holds the pdoWrapper for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUserDatabaseApiFactory::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/__construct.md) &ndash; Builds the LightUserDatabaseApiFactoryObjectFactory instance.
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
Ling\Light_UserDatabase\Api\Generated\LightUserDatabaseApiFactory<br>
See the source code of [Ling\Light_UserDatabase\Api\Generated\LightUserDatabaseApiFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/LightUserDatabaseApiFactory.php)



SeeAlso
==============
Previous class: [UserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface.md)<br>Next class: [LightWebsiteUserDatabaseBullsheeter](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Bullsheet/LightWebsiteUserDatabaseBullsheeter.md)<br>
