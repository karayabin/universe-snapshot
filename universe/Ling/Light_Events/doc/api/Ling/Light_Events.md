Ling/Light_Events
================
2019-10-31 --> 2021-06-28




Table of contents
===========

- [LightEventsException](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Exception/LightEventsException.md) &ndash; The LightEventsException class.
- [LightEventsHelper](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Helper/LightEventsHelper.md) &ndash; The LightEventsHelper class.
    - [LightEventsHelper::dispatchEvent](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Helper/LightEventsHelper/dispatchEvent.md) &ndash; Dispatches the $eventName event using a LightEvent object filled with the given $variables.
    - [LightEventsHelper::registerOpenEventByPlanet](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Helper/LightEventsHelper/registerOpenEventByPlanet.md) &ndash; Adds open events.
    - [LightEventsHelper::unregisterOpenEventByPlanet](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Helper/LightEventsHelper/unregisterOpenEventByPlanet.md) &ndash; Removes open events.
- [LightEventsPlanetInstaller](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Light_PlanetInstaller/LightEventsPlanetInstaller.md) &ndash; The LightEventsPlanetInstaller class.
    - [LightEventsPlanetInstaller::init2](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Light_PlanetInstaller/LightEventsPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
    - [LightEventsPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Light_PlanetInstaller/LightEventsPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
    - LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
    - LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.
- [LightEventsListenerInterface](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Listener/LightEventsListenerInterface.md) &ndash; The LightEventsListenerInterface interface.
    - [LightEventsListenerInterface::process](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Listener/LightEventsListenerInterface/process.md) &ndash; Process the given data.
- [LightEventsService](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService.md) &ndash; The LightEventsService class.
    - [LightEventsService::__construct](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/__construct.md) &ndash; Builds the LightEventsService instance.
    - [LightEventsService::dispatch](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/dispatch.md) &ndash; Dispatches the given event along with the given data.
    - [LightEventsService::registerListener](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/registerListener.md) &ndash; Registers one or more listener(s) (either a callable or a LightEventsListenerInterface instance).
    - [LightEventsService::getDispatchedEvents](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/getDispatchedEvents.md) &ndash; Returns the dispatchedEvents of this instance, in the order they appeared.
    - [LightEventsService::setContainer](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/setContainer.md) &ndash; Sets the container.
    - [LightEventsService::setOptions](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Service/LightEventsService/setOptions.md) &ndash; Sets the options.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [CliTools](https://github.com/lingtalfi/CliTools)
- [DirScanner](https://github.com/lingtalfi/DirScanner)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Logger](https://github.com/lingtalfi/Light_Logger)
- [Light_PlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller)
- [SectionComment](https://github.com/lingtalfi/SectionComment)
- [UniverseTools](https://github.com/lingtalfi/UniverseTools)


