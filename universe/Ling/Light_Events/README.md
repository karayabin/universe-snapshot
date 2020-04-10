Light_Events
===========
2019-10-31 -> 2019-12-19



An event dispatcher for the [light framework](https://github.com/lingtalfi/Light).

This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Events
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Events api](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Events/blob/master/doc/pages/conception-notes.md)
- [Services](#services)




Services
=========


This plugin provides the following services:

- events (returns a LightEventsService instance)


Here is an example of the service configuration:

```yaml
events:
    instance: Ling\Light_Events\Service\LightEventsService
#    instance: Ling\Light_Events\Service\DebugLightEventsService
    methods:
        setContainer:
            container: @container()
```





History Log
=============

- 1.5.0 -- 2020-01-08

    - add DebugLightEventsService
    
- 1.4.1 -- 2019-12-19

    - fix LightEventsService, forgot setContainer method
    
- 1.4.0 -- 2019-12-19

    - add LightEventsService->getDispatchedEvents method
    
- 1.3.0 -- 2019-12-19

    - update LightEventsService, now transmits the container for listeners implementing LightServiceContainerAwareInterface
    
- 1.2.0 -- 2019-11-12

    - add priority and stopPropagation systems
    
- 1.1.0 -- 2019-11-11

    - update LightEventsService->registerListener, now accepts an array of events as first argument
    
- 1.0.0 -- 2019-10-31

    - initial commit