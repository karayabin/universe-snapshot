[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightRedServiceContainer class
================
2019-04-09 --> 2021-07-30






Introduction
============

The LightRedServiceContainer class.



Class synopsis
==============


class <span class="pl-k">LightRedServiceContainer</span> extends [RedOctopusServiceContainer](https://github.com/lingtalfi/Octopus/blob/master/ServiceContainer/RedOctopusServiceContainer.php) implements [OctopusServiceContainerInterface](https://github.com/lingtalfi/Octopus/blob/master/ServiceContainer/OctopusServiceContainerInterface.php), [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) {

- Properties
    - protected string [$appDir](#property-appDir) ;
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [$light](#property-light) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightRedServiceContainer/__construct.md)() : void
    - public [getApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightRedServiceContainer/getApplicationDir.md)() : string
    - public [getLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightRedServiceContainer/getLight.md)() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - public [setLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightRedServiceContainer/setLight.md)([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : mixed
    - public [setApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightRedServiceContainer/setApplicationDir.md)(string $appDir) : void

- Inherited methods
    - public RedOctopusServiceContainer::build(array $config) : void
    - public RedOctopusServiceContainer::get(string $service) : object
    - public RedOctopusServiceContainer::has(string $service) : bool
    - public RedOctopusServiceContainer::all() : array
    - protected RedOctopusServiceContainer::resolveCustomNotation($value, ?&$isCustomNotation = false) : mixed
    - protected RedOctopusServiceContainer::registerServices(array $conf, array &$breadcrumb) : void
    - protected RedOctopusServiceContainer::getServiceName($key, array $breadcrumb) : string
    - public HotServiceResolver::getService(array $sicBlock) : false | object | array

}




Properties
=============

- <span id="property-appDir"><b>appDir</b></span>

    This property holds the appDir for this instance.
    
    

- <span id="property-light"><b>light</b></span>

    This property holds the light for this instance.
    
    



Methods
==============

- [LightRedServiceContainer::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightRedServiceContainer/__construct.md) &ndash; Builds the LightRedServiceContainer instance.
- [LightRedServiceContainer::getApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightRedServiceContainer/getApplicationDir.md) &ndash; Returns the application directory.
- [LightRedServiceContainer::getLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightRedServiceContainer/getLight.md) &ndash; Returns the light instance of the application using this container.
- [LightRedServiceContainer::setLight](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightRedServiceContainer/setLight.md) &ndash; Sets the light instance.
- [LightRedServiceContainer::setApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightRedServiceContainer/setApplicationDir.md) &ndash; Sets the application directory.
- RedOctopusServiceContainer::build &ndash; found in the given (sic) config.
- RedOctopusServiceContainer::get &ndash; Returns the service (class instance) which name is given.
- RedOctopusServiceContainer::has &ndash; 
- RedOctopusServiceContainer::all &ndash; Returns the list of all service names for this instance.
- RedOctopusServiceContainer::resolveCustomNotation &ndash; Parses the given value as a custom notation and returns the interpreted result.
- RedOctopusServiceContainer::registerServices &ndash; Parses the given $conf array and registers the services.
- RedOctopusServiceContainer::getServiceName &ndash; Returns the service name based on its position in the configuration array.
- HotServiceResolver::getService &ndash; Returns the service (an instance of a class) defined in the given sic block.





Location
=============
Ling\Light\ServiceContainer\LightRedServiceContainer<br>
See the source code of [Ling\Light\ServiceContainer\LightRedServiceContainer](https://github.com/lingtalfi/Light/blob/master/ServiceContainer/LightRedServiceContainer.php)



SeeAlso
==============
Previous class: [LightDummyServiceContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer.md)<br>Next class: [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md)<br>
