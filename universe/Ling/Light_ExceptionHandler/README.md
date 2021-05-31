Light_ExceptionHandler
===========
2019-11-11 -> 2021-05-31



A plugin to handle the unhandled exceptions in the [light framework](https://github.com/lingtalfi/Light).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_ExceptionHandler
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_ExceptionHandler
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_ExceptionHandler api](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/pages/conception-notes.md)
- [Services](#services)
- [Related](#related)





Services
=========


This plugin provides the following services:

- exception_handler (returns a LightExceptionHandlerService instance)

Here is an example of the service configuration:

```yaml
exception_handler:
    instance: Ling\Light_ExceptionHandler\Service\LightExceptionHandlerService


# --------------------------------------
# hooks
# --------------------------------------

$logger.methods_collection:
    -
        method: addListener
        args:
            channels: exception
            listener:
                instance: Ling\Light_Logger\Listener\LightFileLoggerListener
                methods:
                    configure:
                        options:
                            file: ${app_dir}/log/exceptions/{date}.txt
```




Related
=============

- [Light_ErrorPop](https://github.com/lingtalfi/Light_ErrorPop/)
- [Light_ErrorHandler](https://github.com/lingtalfi/Light_ErrorHandler/)
    
    


History Log
=============

- 1.2.15 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.2.14 -- 2021-05-31

    - update api to work with Light_PlanetInstaller 2.0.0
  
- 1.2.13 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.2.12 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.2.11 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.2.10 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.2.9 -- 2021-03-22

    - fix data file not containing all events
  
- 1.2.8 -- 2021-03-22

    - adapt api to work with Ling.Light_Events:1.10.0
  
- 1.2.7 -- 2021-03-19

    - fix open events now in the events directory
  
- 1.2.6 -- 2021-03-19

    - switch to Ling.Light_Events' open registration system

- 1.2.5 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.2.4 -- 2021-03-05

    - update README.md, add install alternative

- 1.2.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.1 -- 2020-11-05

    - add handling of "Light_Server.on_controller_exception_caught" event
    
- 1.2.0 -- 2020-06-04

    - adapt api for updated Light_AjaxHandler events
    
- 1.1.0 -- 2019-11-28

    - update service configuration, now handles Light_RealGenerator.on_realform_exception_caught event
    
- 1.0.1 -- 2019-11-12

    - fix functional typo in service configuration
    
- 1.0.0 -- 2019-11-11

    - initial commit