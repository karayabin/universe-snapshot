Light_ErrorPop
===========
2020-06-01 -> 2020-11-30



A development tool to show the last error of the light application.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_ErrorPop
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_ErrorPop api](https://github.com/lingtalfi/Light_ErrorPop/blob/master/doc/api/Ling/Light_ErrorPop.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_ErrorPop/blob/master/doc/pages/conception-notes.md)
- [Related](#related)






Services
=========


Here is an example of the service configuration:

```yaml
error_pop:
    instance: Ling\Light_ErrorPop\Service\LightErrorPopService

# --------------------------------------
# hooks
# --------------------------------------

$logger.methods_collection:
    -
        method: addListener
        args:
            channels:
                - error_handler
                - fatal_error_handler
                - error
            listener:
                instance: Ling\Light_Logger\Listener\LightLastMessageFileLoggerListener
                methods:
                    setFile:
                        file: /tmp/error_pop.txt
                        


```



Related
=============

- [Light_ErrorHandler](https://github.com/lingtalfi/Light_ErrorHandler/)
- [Light_ExceptionHandler](https://github.com/lingtalfi/Light_ExceptionHandler/)
    
    
    
History Log
=============

- 1.0.2 -- 2020-11-30

    - update service to also work with the error channel of the logger
    
- 1.0.1 -- 2020-06-01

    - update README.md
    
- 1.0.0 -- 2020-06-01

    - initial commit