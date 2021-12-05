Light_ErrorHandler
===========
2020-06-01 -> 2021-06-28



A plugin to handle the php errors in a [light](https://github.com/lingtalfi/Light) application.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_ErrorHandler
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_ErrorHandler
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_ErrorHandler api](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/pages/conception-notes.md)
- [Related](#related)






Services
=========


Here is an example of the service configuration:

```yaml
error_handler:
    instance: Ling\Light_ErrorHandler\Service\LightErrorHandlerService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options:
                handleFatalErrors: true
                handleErrors: true
                handleLogErrors: true

# --------------------------------------
# hooks
# --------------------------------------
$events.methods_collection:
    -
        method: registerListener
        args:
            events: Ling.Light.initialize_1
            listener:
                instance: @service(error_handler)
                callable_method: registerFunctions



```



Related
=============

- [Light_ErrorPop](https://github.com/lingtalfi/Light_ErrorPop/)
- [Light_ExceptionHandler](https://github.com/lingtalfi/Light_ExceptionHandler/)
    
    
    



History Log
=============

- 1.0.14 -- 2021-06-28

    - fix api wrong reference to Ling.Light_Logger
  
- 1.0.13 -- 2021-06-25

    - update api, now use Ling.Light_Logger open registration system
  
- 1.0.12 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.11 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.0.10 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.0.9 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.0.8 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.7 -- 2021-02-19

    - fix service errorHandler not being public
  
- 1.0.6 -- 2021-02-12

    - fix functional typo in service->registerFunctions

- 1.0.5 -- 2020-12-08

    - Fix lpi-deps not using natsort

- 1.0.4 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.3 -- 2020-11-30

    - update service, add handleLogErrors option
    
- 1.0.2 -- 2020-06-01

    - Added related section in README.md
    
- 1.0.1 -- 2020-06-01

    - fix doc (forgot to generate)
    
- 1.0.0 -- 2020-06-01

    - initial commit