[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The LightKitStoreApiFactory class
================
2021-04-06 --> 2021-08-02






Introduction
============

The LightKitStoreApiFactory class.



Class synopsis
==============


class <span class="pl-k">LightKitStoreApiFactory</span>  {

- Properties
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/__construct.md)() : void
    - public [getAuthorApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/getAuthorApi.md)() : [CustomAuthorApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomAuthorApiInterface.md)
    - public [getItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/getItemApi.md)() : [CustomItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface.md)
    - public [getUserApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/getUserApi.md)() : [CustomUserApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserApiInterface.md)
    - public [getUserRatesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/getUserRatesItemApi.md)() : [CustomUserRatesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface.md)
    - public [getInvoiceApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/getInvoiceApi.md)() : [CustomInvoiceApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomInvoiceApiInterface.md)
    - public [getInvoiceLineApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/getInvoiceLineApi.md)() : [CustomInvoiceLineApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomInvoiceLineApiInterface.md)
    - public [getUserPurchasesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/getUserPurchasesItemApi.md)() : [CustomUserPurchasesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserPurchasesItemApiInterface.md)
    - public [setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-pdoWrapper"><b>pdoWrapper</b></span>

    This property holds the pdoWrapper for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightKitStoreApiFactory::__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/__construct.md) &ndash; Builds the LightKitStoreApiFactoryObjectFactory instance.
- [LightKitStoreApiFactory::getAuthorApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/getAuthorApi.md) &ndash; Returns a CustomAuthorApiInterface.
- [LightKitStoreApiFactory::getItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/getItemApi.md) &ndash; Returns a CustomItemApiInterface.
- [LightKitStoreApiFactory::getUserApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/getUserApi.md) &ndash; Returns a CustomUserApiInterface.
- [LightKitStoreApiFactory::getUserRatesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/getUserRatesItemApi.md) &ndash; Returns a CustomUserRatesItemApiInterface.
- [LightKitStoreApiFactory::getInvoiceApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/getInvoiceApi.md) &ndash; Returns a CustomInvoiceApiInterface.
- [LightKitStoreApiFactory::getInvoiceLineApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/getInvoiceLineApi.md) &ndash; Returns a CustomInvoiceLineApiInterface.
- [LightKitStoreApiFactory::getUserPurchasesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/getUserPurchasesItemApi.md) &ndash; Returns a CustomUserPurchasesItemApiInterface.
- [LightKitStoreApiFactory::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitStoreApiFactory::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Store\Api\Generated\LightKitStoreApiFactory<br>
See the source code of [Ling\Light_Kit_Store\Api\Generated\LightKitStoreApiFactory](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/LightKitStoreApiFactory.php)



SeeAlso
==============
Previous class: [UserRatesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface.md)<br>Next class: [YourAccountBaseController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/Account/YourAccountBaseController.md)<br>
