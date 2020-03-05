Light_404Logger
===========
2019-12-12



A [Light](https://github.com/lingtalfi/Light) plugin to log 404 route not matching messages.

This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_404Logger
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_404Logger api](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/pages/conception-notes.md)
- [Services](#services)    






Services
=========


This plugin provides the following services:

- _404_logger (returns a Light404LoggerService instance)


Note: the underscore in front of the service name is not a typo. That's because the service names
are converted to object methods, and it's not permitted in php to have method names starting with a number. 



Here is an example of the service configuration:

```yaml
_404_logger:
    instance: Ling\Light_404Logger\Service\Light404LoggerService


# --------------------------------------
# hooks
# --------------------------------------
$events.methods_collection:
    -
        method: registerListener
        args:
            events:
                - Light.on_unhandled_exception_caught
            listener:
                instance: @service(_404_logger)
                callable_method: onExceptionCaught

$logger.methods_collection:
    -
        method: addListener
        args:
            channels: "404"
            listener:
                instance: Ling\Light_404Logger\Logger\Light404LoggerListener
                methods:
                    configure:
                        options:
                            file: ${app_dir}/log/404-assets.log
                            format: [{channel}]: {dateTime} -- {message}
                            expand_array: true
                            keepOnlyIf:
                                extension.inArray:
                                    - css
                                    - js
                                    - jpg
                                    - jpeg
                                    - gif
                                    - png
                                    - bmp
                                    - eot
                                    - ttf
                                    - ico
                                    - pdf
```




History Log
=============

- 1.0.0 -- 2019-12-12

    - initial commit