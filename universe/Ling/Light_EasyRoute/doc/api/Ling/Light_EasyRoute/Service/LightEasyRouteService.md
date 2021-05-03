[Back to the Ling/Light_EasyRoute api](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute.md)



The LightEasyRouteService class
================
2019-08-21 --> 2021-03-15






Introduction
============

The LightEasyRouteService class.



Class synopsis
==============


class <span class="pl-k">LightEasyRouteService</span>  {

- Properties
    - protected array [$bundleFiles](#property-bundleFiles) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)|null [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [initialize](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/initialize.md)(Ling\Light\Events\LightEvent $event) : void
    - public [registerBundleFile](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/registerBundleFile.md)(string $bundleFile) : void
    - private [registerRouteByBundle](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/registerRouteByBundle.md)(string $bundleName, array $bundle, Ling\Light\Core\Light $light) : void

}




Properties
=============

- <span id="property-bundleFiles"><b>bundleFiles</b></span>

    This property holds the array of bundle file paths for this instance.
    
    Each bundle path is relative to the application directory.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightEasyRouteService::__construct](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/__construct.md) &ndash; Builds the LightEasyRouteService instance.
- [LightEasyRouteService::setContainer](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/setContainer.md) &ndash; Sets the container.
- [LightEasyRouteService::initialize](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/initialize.md) &ndash; Listener for the [Ling.Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
- [LightEasyRouteService::registerBundleFile](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/registerBundleFile.md) &ndash; Adds a bundle file.
- [LightEasyRouteService::registerRouteByBundle](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/registerRouteByBundle.md) &ndash; Register the routes from the given bundle to the light instance.





Location
=============
Ling\Light_EasyRoute\Service\LightEasyRouteService<br>
See the source code of [Ling\Light_EasyRoute\Service\LightEasyRouteService](https://github.com/lingtalfi/Light_EasyRoute/blob/master/Service/LightEasyRouteService.php)



SeeAlso
==============
Previous class: [LightEasyRouteHelper](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper.md)<br>
