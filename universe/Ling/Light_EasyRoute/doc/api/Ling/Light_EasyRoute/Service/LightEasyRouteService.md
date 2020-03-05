[Back to the Ling/Light_EasyRoute api](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute.md)



The LightEasyRouteService class
================
2019-08-21 --> 2019-12-17






Introduction
============

The LightEasyRouteService class.



Class synopsis
==============


class <span class="pl-k">LightEasyRouteService</span>  {

- Properties
    - protected array [$bundleFiles](#property-bundleFiles) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/__construct.md)() : void
    - public [initialize](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/initialize.md)(Ling\Light\Events\LightEvent $event) : void
    - public [registerBundleFile](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/registerBundleFile.md)(string $bundleFile) : void

}




Properties
=============

- <span id="property-bundleFiles"><b>bundleFiles</b></span>

    This property holds the array of bundle file paths for this instance.
    
    Each bundle path is relative to the application directory.
    
    



Methods
==============

- [LightEasyRouteService::__construct](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/__construct.md) &ndash; Builds the LightEasyRouteService instance.
- [LightEasyRouteService::initialize](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/initialize.md) &ndash; Listener for the [Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
- [LightEasyRouteService::registerBundleFile](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService/registerBundleFile.md) &ndash; Adds a bundle file.





Location
=============
Ling\Light_EasyRoute\Service\LightEasyRouteService<br>
See the source code of [Ling\Light_EasyRoute\Service\LightEasyRouteService](https://github.com/lingtalfi/Light_EasyRoute/blob/master/Service/LightEasyRouteService.php)



SeeAlso
==============
Previous class: [LightEasyRouteException](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Exception/LightEasyRouteException.md)<br>
