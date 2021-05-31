[Back to the Ling/Light_ReverseRouter api](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter.md)



The LightReverseRouterService class
================
2019-04-10 --> 2021-05-31






Introduction
============

The LightReverseRouterService class.

A reverser router is an object able to get the url out of a route and possibly some parameters.

It allows you to abstract the uris of your pages.
In other words, if your application uses a reverse router, you can change the uris of your
page easily (because they aren't hardcoded in your application).




See more information about the route in [the route page](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md).



Class synopsis
==============


class <span class="pl-k">LightReverseRouterService</span>  {

- Properties
    - protected array [$routes](#property-routes) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/Service/LightReverseRouterService/__construct.md)() : void
    - public [initialize](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/Service/LightReverseRouterService/initialize.md)(Ling\Light\Events\LightEvent $event) : void
    - public [getUrl](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/Service/LightReverseRouterService/getUrl.md)(string $routeName, ?array $urlParameters = [], ?$useAbsolute = false) : string

}




Properties
=============

- <span id="property-routes"><b>routes</b></span>

    This property holds the routes for this instance.
    
    



Methods
==============

- [LightReverseRouterService::__construct](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/Service/LightReverseRouterService/__construct.md) &ndash; Builds the ReverseRouter instance.
- [LightReverseRouterService::initialize](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/Service/LightReverseRouterService/initialize.md) &ndash; Listener for the [Ling.Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
- [LightReverseRouterService::getUrl](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/Service/LightReverseRouterService/getUrl.md) &ndash; Returns the url corresponding to the given route name and url parameters.





Location
=============
Ling\Light_ReverseRouter\Service\LightReverseRouterService<br>
See the source code of [Ling\Light_ReverseRouter\Service\LightReverseRouterService](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/Service/LightReverseRouterService.php)



SeeAlso
==============
Previous class: [LightReverseRouterException](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/Exception/LightReverseRouterException.md)<br>
