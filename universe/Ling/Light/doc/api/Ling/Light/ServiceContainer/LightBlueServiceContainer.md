[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightBlueServiceContainer class
================
2019-04-09 --> 2020-07-28






Introduction
============

The LightBlueServiceContainer class.



Class synopsis
==============


class <span class="pl-k">LightBlueServiceContainer</span> extends [BlueOctopusServiceContainer](https://github.com/lingtalfi/Octopus/blob/master/ServiceContainer/BlueOctopusServiceContainer.php) implements [OctopusServiceContainerInterface](https://github.com/lingtalfi/Octopus/blob/master/ServiceContainer/OctopusServiceContainerInterface.php), [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) {

- Properties
    - protected string [$appDir](#property-appDir) ;
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [$light](#property-light) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightBlueServiceContainer/__construct.md)() : void
    - public [getApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightBlueServiceContainer/getApplicationDir.md)() : string
    - public [getLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightBlueServiceContainer/getLight.md)() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - public [setLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightBlueServiceContainer/setLight.md)([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : mixed
    - public [setApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightBlueServiceContainer/setApplicationDir.md)(string $appDir) : void

- Inherited methods
    - public BlueOctopusServiceContainer::get(string $service) : object
    - public BlueOctopusServiceContainer::has(string $service) : bool
    - public BlueOctopusServiceContainer::all() : array
    - public static BlueOctopusServiceContainer::getMethodName(string $serviceName) : string
    - public static BlueOctopusServiceContainer::getServiceName(string $methodName) : string

}




Properties
=============

- <span id="property-appDir"><b>appDir</b></span>

    This property holds the appDir for this instance.
    
    

- <span id="property-light"><b>light</b></span>

    This property holds the light for this instance.
    
    



Methods
==============

- [LightBlueServiceContainer::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightBlueServiceContainer/__construct.md) &ndash; Builds the LightRedServiceContainer instance.
- [LightBlueServiceContainer::getApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightBlueServiceContainer/getApplicationDir.md) &ndash; Returns the application directory.
- [LightBlueServiceContainer::getLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightBlueServiceContainer/getLight.md) &ndash; Returns the light instance of the application using this container.
- [LightBlueServiceContainer::setLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightBlueServiceContainer/setLight.md) &ndash; Sets the light instance.
- [LightBlueServiceContainer::setApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightBlueServiceContainer/setApplicationDir.md) &ndash; Sets the application directory.
- BlueOctopusServiceContainer::get &ndash; Returns the service which name is given.
- BlueOctopusServiceContainer::has &ndash; 
- BlueOctopusServiceContainer::all &ndash; Returns the list of all service names for this instance.
- BlueOctopusServiceContainer::getMethodName &ndash; Converts the given service name into a method name (the name of the method in charge of returning the service).
- BlueOctopusServiceContainer::getServiceName &ndash; Returns the service name from the given method name.





Location
=============
Ling\Light\ServiceContainer\LightBlueServiceContainer<br>
See the source code of [Ling\Light\ServiceContainer\LightBlueServiceContainer](https://github.com/lingtalfi/Light/blob/master/ServiceContainer/LightBlueServiceContainer.php)



SeeAlso
==============
Previous class: [LightRouterInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface.md)<br>Next class: [LightDummyServiceContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer.md)<br>
