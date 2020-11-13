[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightDummyServiceContainer class
================
2019-04-09 --> 2020-11-10






Introduction
============

The LightDummyServiceContainer class.



Class synopsis
==============


class <span class="pl-k">LightDummyServiceContainer</span> implements [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md), [OctopusServiceContainerInterface](https://github.com/lingtalfi/Octopus/blob/master/ServiceContainer/OctopusServiceContainerInterface.php) {

- Properties
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [$light](#property-light) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/__construct.md)() : void
    - public [get](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/get.md)(string $service) : object
    - public [has](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/has.md)(string $service) : bool
    - public [all](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/all.md)() : array
    - public [getApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/getApplicationDir.md)() : string
    - public [getLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/getLight.md)() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - public [setLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/setLight.md)([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : mixed

}




Properties
=============

- <span id="property-light"><b>light</b></span>

    This property holds the light for this instance.
    
    



Methods
==============

- [LightDummyServiceContainer::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/__construct.md) &ndash; Builds the LightDummyServiceContainer instance.
- [LightDummyServiceContainer::get](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/get.md) &ndash; Returns the service which name is given.
- [LightDummyServiceContainer::has](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/has.md) &ndash; 
- [LightDummyServiceContainer::all](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/all.md) &ndash; Returns the list of all service names for this instance.
- [LightDummyServiceContainer::getApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/getApplicationDir.md) &ndash; Returns the application directory.
- [LightDummyServiceContainer::getLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/getLight.md) &ndash; Returns the light instance of the application using this container.
- [LightDummyServiceContainer::setLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/setLight.md) &ndash; Sets the light instance.





Location
=============
Ling\Light\ServiceContainer\LightDummyServiceContainer<br>
See the source code of [Ling\Light\ServiceContainer\LightDummyServiceContainer](https://github.com/lingtalfi/Light/blob/master/ServiceContainer/LightDummyServiceContainer.php)



SeeAlso
==============
Previous class: [LightBlueServiceContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightBlueServiceContainer.md)<br>Next class: [LightRedServiceContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightRedServiceContainer.md)<br>
