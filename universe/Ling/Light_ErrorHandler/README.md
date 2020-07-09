Light_ErrorHandler
===========
2020-06-01



A plugin to handle the php errors in a [light](https://github.com/lingtalfi/Light) application.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
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
            channels: error_handler
            listener:
                instance: Ling\Light_Logger\Listener\LightFileLoggerListener
                methods:
                    configure:
                        options:
                            file: ${app_dir}/log/errors/{date}.txt
    -
        method: addListener
        args:
            channels: fatal_error_handler
            listener:
                instance: Ling\Light_Logger\Listener\LightFileLoggerListener
                methods:
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

- 1.0.2 -- 2020-06-01

    - Added related section in README.md
    
- 1.0.1 -- 2020-06-01

    - fix doc (forgot to generate)
    
- 1.0.0 -- 2020-06-01

    - initial commit