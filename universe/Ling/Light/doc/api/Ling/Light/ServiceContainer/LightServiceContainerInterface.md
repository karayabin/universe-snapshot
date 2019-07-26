[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightServiceContainerInterface class
================
2019-04-09 --> 2019-07-18






Introduction
============

The LightServiceContainerInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">LightServiceContainerInterface</span> implements [OctopusServiceContainerInterface](https://github.com/lingtalfi/Octopus/blob/master/ServiceContainer/OctopusServiceContainerInterface.php) {

- Inherited methods
    - abstract public OctopusServiceContainerInterface::get(string $service) : object
    - abstract public OctopusServiceContainerInterface::has(string $service) : bool
    - abstract public OctopusServiceContainerInterface::all() : array

}






Methods
==============

- OctopusServiceContainerInterface::get &ndash; Returns the service which name is given.
- OctopusServiceContainerInterface::has &ndash; 
- OctopusServiceContainerInterface::all &ndash; Returns the list of all service names for this instance.





Location
=============
Ling\Light\ServiceContainer\LightServiceContainerInterface<br>
See the source code of [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/ServiceContainer/LightServiceContainerInterface.php)



SeeAlso
==============
Previous class: [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md)<br>
