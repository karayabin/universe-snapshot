Light_ErrorHandler
===========
2020-06-01 -> 2021-03-05



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
            events: Light.initialize_1
            listener:
                instance: @service(error_handler)
                callable_method: registerFunctions


$logger.methods_collection:
    -
        method: addListener
        args:
            channels:
                - error_handler
                - fatal_error_handler
                - error
            listener:
                instance: Ling\Light_ErrorHandler\Light_Logger\LightLoggerErrorHandlerListener
                methods:
                    setContainer:
                        container: @container()
                    configure:
                        options:
                            file: ${app_dir}/log/errors/{date}.txt





```



Related
=============

- [Light_ErrorPop](https://github.com/lingtalfi/Light_ErrorPop/)
- [Light_ExceptionHandler](https://github.com/lingtalfi/Light_ExceptionHandler/)
    
    
    



History Log
=============

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