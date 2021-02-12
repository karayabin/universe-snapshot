[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightServiceContainerInterface class
================
2019-04-09 --> 2021-02-11






Introduction
============

The LightServiceContainerInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">LightServiceContainerInterface</span> implements [OctopusServiceContainerInterface](https://github.com/lingtalfi/Octopus/blob/master/ServiceContainer/OctopusServiceContainerInterface.php) {

- Methods
    - abstract public [getApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface/getApplicationDir.md)() : string
    - abstract public [getLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface/getLight.md)() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - abstract public [setLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface/setLight.md)([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : mixed

- Inherited methods
    - abstract public OctopusServiceContainerInterface::get(string $service) : object
    - abstract public OctopusServiceContainerInterface::has(string $service) : bool
    - abstract public OctopusServiceContainerInterface::all() : array

}






Methods
==============

- [LightServiceContainerInterface::getApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface/getApplicationDir.md) &ndash; Returns the application directory.
- [LightServiceContainerInterface::getLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface/getLight.md) &ndash; Returns the light instance of the application using this container.
- [LightServiceContainerInterface::setLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface/setLight.md) &ndash; Sets the light instance.
- OctopusServiceContainerInterface::get &ndash; Returns the service which name is given.
- OctopusServiceContainerInterface::has &ndash; 
- OctopusServiceContainerInterface::all &ndash; Returns the list of all service names for this instance.





Location
=============
Ling\Light\ServiceContainer\LightServiceContainerInterface<br>
See the source code of [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/ServiceContainer/LightServiceContainerInterface.php)



SeeAlso
==============
Previous class: [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md)<br>Next class: [LightStream](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream.md)<br>
