[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The LightKitStoreService class
================
2021-04-06 --> 2021-05-31






Introduction
============

The LightKitStoreService class.



Class synopsis
==============


class <span class="pl-k">LightKitStoreService</span>  {

- Properties
    - protected Ling\Light\ServiceContainer\LightServiceContainerInterface [$container](#property-container) ;
    - protected array [$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/setContainer.md)(Ling\Light\ServiceContainer\LightServiceContainerInterface $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/setOptions.md)(array $options) : void
    - public [registerWebsiteFromDirectory](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/registerWebsiteFromDirectory.md)() : void
    - private [error](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    
    
    See the [Light_Kit_Store conception notes](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/pages/conception-notes.md) for more details.
    
    



Methods
==============

- [LightKitStoreService::__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/__construct.md) &ndash; Builds the LightKitStoreService instance.
- [LightKitStoreService::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/setContainer.md) &ndash; Sets the container.
- [LightKitStoreService::setOptions](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/setOptions.md) &ndash; Sets the options.
- [LightKitStoreService::registerWebsiteFromDirectory](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/registerWebsiteFromDirectory.md) &ndash; 
- [LightKitStoreService::error](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Kit_Store\Service\LightKitStoreService<br>
See the source code of [Ling\Light_Kit_Store\Service\LightKitStoreService](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Service/LightKitStoreService.php)



SeeAlso
==============
Previous class: [LightKitStoreException](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Exception/LightKitStoreException.md)<br>Next class: [LightKitStoreItemInstallerInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/StoreItemInstaller/LightKitStoreItemInstallerInterface.md)<br>
