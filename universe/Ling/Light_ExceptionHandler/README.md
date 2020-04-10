Light_ExceptionHandler
===========
2019-11-11 -> 2020-04-10



A plugin to handle the unhandled exceptions in the [light framework](https://github.com/lingtalfi/Light).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
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
$events.methods_collection:
    -
        method: registerListener
        args:
            events:
                - Light.on_unhandled_exception_caught
                - Light_AjaxHandler.on_handle_exception_caught
                - Light_AjaxFileUploadManager.on_controller_exception_caught
                - Light_RealGenerator.on_realform_exception_caught
            listener:
                instance: @service(exception_handler)
                callable_method: onExceptionCaught

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
                            file: ${app_dir}/log/exception.txt

```





History Log
=============

-- 1.2.0 -- 2020-04-10

    - adapt api for updated Light_AjaxHandler events
    
- 1.1.0 -- 2019-11-28

    - update service configuration, now handles Light_RealGenerator.on_realform_exception_caught event
    
- 1.0.1 -- 2019-11-12

    - fix functional typo in service configuration
    
- 1.0.0 -- 2019-11-11

    - initial commit