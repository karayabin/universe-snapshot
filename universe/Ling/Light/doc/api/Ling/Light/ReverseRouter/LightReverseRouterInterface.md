[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightReverseRouterInterface class
================
2019-04-09 --> 2019-04-10






Introduction
============

The LightReverseRouterInterface interface.

A reverser router is an object able to get the url out of a route and possibly some parameters.

It allows you to abstract the uris of your pages.
In other words, if your application uses a reverse router, you can change the uris of your
page easily (because they aren't hardcoded in your application).




See more information about the route in the route page.



Class synopsis
==============


abstract class <span class="pl-k">LightReverseRouterInterface</span>  {

- Methods
    - abstract public [getUrl](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ReverseRouter/LightReverseRouterInterface/getUrl.md)(string $routeName, array $urlParameters = []) : string

}






Methods
==============

- [LightReverseRouterInterface::getUrl](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ReverseRouter/LightReverseRouterInterface/getUrl.md) &ndash; Returns the url corresponding to the given route name and url parameters.





Location
=============
Ling\Light\ReverseRouter\LightReverseRouterInterface


SeeAlso
==============
Previous class: [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)<br>Next class: [LightRouter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter.md)<br>
