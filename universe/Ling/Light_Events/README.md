Light_Events
===========
2019-10-31 -> 2020-11-30



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
    methods:
        setContainer:
            container: @container()
        setOptions:
            options:
                debugDispatch: true   # default is false
                debugCall: true       # default is false
                formattingDispatch: white:bgRed
                formattingCall: null
# --------------------------------------
# hooks
# --------------------------------------
$logger.methods_collection:
    -
        method: addListener
        args:
            channels: events.debug
            listener:
                instance: Ling\Light_Logger\Listener\LightCleanableFileLoggerListener
                methods:
                    configure:
                        options:
                            file: ${app_dir}/log/events_debug.txt

```





History Log
=============

- 1.9.3 -- 2020-11-30

    - fix LightEventsHelper::dispatchEvent not sending the event
    
- 1.9.2 -- 2020-11-27

    - add LightEventsHelper class
    
- 1.9.1 -- 2020-11-06

    - update service configuration options, add formattingDispatch and formattingCall
    
- 1.9.0 -- 2020-08-17

    - add **Dynamic events registration** system
    
- 1.8.0 -- 2020-08-14

    - replace useDebug with debugCaught and debugSent options in the service configuration

- 1.7.0 -- 2020-06-25

    - update service configuration, now has a dedicated logger listener
    
- 1.6.0 -- 2020-06-25

    - update log system, DebugLightEventsService is now integrated by default with useDebug option
    
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