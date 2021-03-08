[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataApiFactory class
================
2019-09-27 --> 2021-03-05






Introduction
============

The LightUserDataApiFactory class.



Class synopsis
==============


class <span class="pl-k">LightUserDataApiFactory</span>  {

- Properties
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory/__construct.md)() : void
    - public [getTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory/getTagApi.md)() : [CustomTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomTagApiInterface.md)
    - public [getResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory/getResourceApi.md)() : [CustomResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface.md)
    - public [getResourceHasTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory/getResourceHasTagApi.md)() : [CustomResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceHasTagApiInterface.md)
    - public [getResourceFileApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory/getResourceFileApi.md)() : [CustomResourceFileApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceFileApiInterface.md)
    - public [setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-pdoWrapper"><b>pdoWrapper</b></span>

    This property holds the pdoWrapper for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUserDataApiFactory::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory/__construct.md) &ndash; Builds the LightUserDataApiFactoryObjectFactory instance.
- [LightUserDataApiFactory::getTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory/getTagApi.md) &ndash; Returns a CustomTagApiInterface.
- [LightUserDataApiFactory::getResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory/getResourceApi.md) &ndash; Returns a CustomResourceApiInterface.
- [LightUserDataApiFactory::getResourceHasTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory/getResourceHasTagApi.md) &ndash; Returns a CustomResourceHasTagApiInterface.
- [LightUserDataApiFactory::getResourceFileApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory/getResourceFileApi.md) &ndash; Returns a CustomResourceFileApiInterface.
- [LightUserDataApiFactory::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDataApiFactory::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserData\Api\Generated\LightUserDataApiFactory<br>
See the source code of [Ling\Light_UserData\Api\Generated\LightUserDataApiFactory](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/LightUserDataApiFactory.php)



SeeAlso
==============
Previous class: [TagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface.md)<br>Next class: [LightUserData2SvpDataTransformer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/DataTransformer/LightUserData2SvpDataTransformer.md)<br>
