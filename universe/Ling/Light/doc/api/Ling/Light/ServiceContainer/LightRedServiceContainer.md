[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightRedServiceContainer class
================
2019-04-09 --> 2019-09-20






Introduction
============

The LightRedServiceContainer class.



Class synopsis
==============


class <span class="pl-k">LightRedServiceContainer</span> extends [RedOctopusServiceContainer](https://github.com/lingtalfi/Octopus/blob/master/ServiceContainer/RedOctopusServiceContainer.php) implements [OctopusServiceContainerInterface](https://github.com/lingtalfi/Octopus/blob/master/ServiceContainer/OctopusServiceContainerInterface.php), [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) {

- Inherited methods
    - public RedOctopusServiceContainer::__construct() : void
    - public RedOctopusServiceContainer::build(array $config) : void
    - public RedOctopusServiceContainer::get(string $service) : object
    - public RedOctopusServiceContainer::has(string $service) : bool
    - public RedOctopusServiceContainer::all() : array
    - protected RedOctopusServiceContainer::resolveCustomNotation(?$value, &$isCustomNotation = false) : mixed
    - protected RedOctopusServiceContainer::registerServices(array $conf, array &$breadcrumb) : void
    - protected RedOctopusServiceContainer::getServiceName(?$key, array $breadcrumb) : string
    - public HotServiceResolver::getService(array $sicBlock) : false | object | array
    - private HotServiceResolver::resolveArgs(array $args) : array

}






Methods
==============

- RedOctopusServiceContainer::__construct &ndash; Builds the red octopus instance.
- RedOctopusServiceContainer::build &ndash; found in the given (sic) config.
- RedOctopusServiceContainer::get &ndash; Returns the service (class instance) which name is given.
- RedOctopusServiceContainer::has &ndash; 
- RedOctopusServiceContainer::all &ndash; Returns the list of all service names for this instance.
- RedOctopusServiceContainer::resolveCustomNotation &ndash; Parses the given value as a custom notation and returns the interpreted result.
- RedOctopusServiceContainer::registerServices &ndash; Parses the given $conf array and registers the services.
- RedOctopusServiceContainer::getServiceName &ndash; Returns the service name based on its position in the configuration array.
- HotServiceResolver::getService &ndash; Returns the service (an instance of a class) defined in the given sic block.
- HotServiceResolver::resolveArgs &ndash; Returns the given $args array, but with services resolved (based on the sic notation).





Location
=============
Ling\Light\ServiceContainer\LightRedServiceContainer<br>
See the source code of [Ling\Light\ServiceContainer\LightRedServiceContainer](https://github.com/lingtalfi/Light/blob/master/ServiceContainer/LightRedServiceContainer.php)



SeeAlso
==============
Previous class: [LightDummyServiceContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer.md)<br>Next class: [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md)<br>
