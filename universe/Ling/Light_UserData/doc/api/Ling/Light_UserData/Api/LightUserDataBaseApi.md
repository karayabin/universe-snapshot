[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataBaseApi class
================
2019-09-27 --> 2019-12-20






Introduction
============

The LightUserDataBaseApi class.



Class synopsis
==============


class <span class="pl-k">LightUserDataBaseApi</span>  {

- Properties
    - protected Ling\Light_Database\Service\LightDatabaseService [$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected string [$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/__construct.md)() : void
    - public [setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [checkMicroPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/checkMicroPermission.md)(string $type) : void

}




Properties
=============

- <span id="property-pdoWrapper"><b>pdoWrapper</b></span>

    This property holds the pdoWrapper for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-table"><b>table</b></span>

    This property holds the table for this instance.
    
    



Methods
==============

- [LightUserDataBaseApi::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/__construct.md) &ndash; Builds the AbstractLightUserDatabaseApi instance.
- [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/setContainer.md) &ndash; Sets the container.
- [LightUserDataBaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/checkMicroPermission.md) &ndash; Checks whether the current user has the micro permission which type is specified.





Location
=============
Ling\Light_UserData\Api\LightUserDataBaseApi<br>
See the source code of [Ling\Light_UserData\Api\LightUserDataBaseApi](https://github.com/lingtalfi/Light_UserData/blob/master/Api/LightUserDataBaseApi.php)



SeeAlso
==============
Previous class: [LightUserDataApiFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataApiFactory.md)<br>Next class: [ResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApi.md)<br>
