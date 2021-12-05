[Back to the Ling/Light_Events api](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events.md)



The LightEventsHelper class
================
2019-10-31 --> 2021-06-28






Introduction
============

The LightEventsHelper class.



Class synopsis
==============


class <span class="pl-k">LightEventsHelper</span>  {

- Methods
    - public static [dispatchEvent](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Helper/LightEventsHelper/dispatchEvent.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, $eventName, array $variables) : void
    - public static [registerOpenEventByPlanet](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Helper/LightEventsHelper/registerOpenEventByPlanet.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, string $planetDotName) : void
    - public static [unregisterOpenEventByPlanet](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Helper/LightEventsHelper/unregisterOpenEventByPlanet.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, string $planetDotName) : void

}






Methods
==============

- [LightEventsHelper::dispatchEvent](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Helper/LightEventsHelper/dispatchEvent.md) &ndash; Dispatches the $eventName event using a LightEvent object filled with the given $variables.
- [LightEventsHelper::registerOpenEventByPlanet](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Helper/LightEventsHelper/registerOpenEventByPlanet.md) &ndash; Adds open events.
- [LightEventsHelper::unregisterOpenEventByPlanet](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Helper/LightEventsHelper/unregisterOpenEventByPlanet.md) &ndash; Removes open events.





Location
=============
Ling\Light_Events\Helper\LightEventsHelper<br>
See the source code of [Ling\Light_Events\Helper\LightEventsHelper](https://github.com/lingtalfi/Light_Events/blob/master/Helper/LightEventsHelper.php)



SeeAlso
==============
Previous class: [LightEventsException](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Exception/LightEventsException.md)<br>Next class: [LightEventsPlanetInstaller](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Light_PlanetInstaller/LightEventsPlanetInstaller.md)<br>
