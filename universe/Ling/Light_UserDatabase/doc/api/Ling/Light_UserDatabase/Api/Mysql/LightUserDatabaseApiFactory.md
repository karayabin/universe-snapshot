[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The LightUserDatabaseApiFactory class
================
2019-07-19 --> 2020-02-07






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
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/__construct.md)() : void
    - public [getUserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getUserGroupApi.md)() : [UserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi.md)
    - public [getUserApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getUserApi.md)() : [UserApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserApi.md)
    - public [getPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getPermissionGroupApi.md)() : [PermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/PermissionGroupApi.md)
    - public [getPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getPermissionApi.md)() : [CustomPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Custom/CustomPermissionApi.md)
    - public [getUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getUserHasPermissionGroupApi.md)() : [UserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserHasPermissionGroupApi.md)
    - public [getPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getPermissionGroupHasPermissionApi.md)() : [PermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/PermissionGroupHasPermissionApi.md)
    - public [getPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getPluginOptionApi.md)() : [CustomPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Custom/CustomPluginOptionApi.md)
    - public [getUserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getUserGroupHasPluginOptionApi.md)() : [UserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupHasPluginOptionApi.md)
    - public [setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-pdoWrapper"><b>pdoWrapper</b></span>

    This property holds the pdoWrapper for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUserDatabaseApiFactory::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/__construct.md) &ndash; Builds the LightUserDatabaseApiFactoryObjectFactory instance.
- [LightUserDatabaseApiFactory::getUserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getUserGroupApi.md) &ndash; Returns a UserGroupApiInterface.
- [LightUserDatabaseApiFactory::getUserApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getUserApi.md) &ndash; Returns a UserApiInterface.
- [LightUserDatabaseApiFactory::getPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getPermissionGroupApi.md) &ndash; Returns a PermissionGroupApiInterface.
- [LightUserDatabaseApiFactory::getPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getPermissionApi.md) &ndash; Returns a PermissionApiInterface.
- [LightUserDatabaseApiFactory::getUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getUserHasPermissionGroupApi.md) &ndash; Returns a UserHasPermissionGroupApiInterface.
- [LightUserDatabaseApiFactory::getPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getPermissionGroupHasPermissionApi.md) &ndash; Returns a PermissionGroupHasPermissionApiInterface.
- [LightUserDatabaseApiFactory::getPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getPluginOptionApi.md) &ndash; Returns a PluginOptionApiInterface.
- [LightUserDatabaseApiFactory::getUserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/getUserGroupHasPluginOptionApi.md) &ndash; Returns a UserGroupHasPluginOptionApiInterface.
- [LightUserDatabaseApiFactory::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDatabaseApiFactory::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserDatabase\Api\Mysql\LightUserDatabaseApiFactory<br>
See the source code of [Ling\Light_UserDatabase\Api\Mysql\LightUserDatabaseApiFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/LightUserDatabaseApiFactory.php)



SeeAlso
==============
Previous class: [UserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface.md)<br>Next class: [LightWebsiteUserDatabaseBullsheeter](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Bullsheet/LightWebsiteUserDatabaseBullsheeter.md)<br>
