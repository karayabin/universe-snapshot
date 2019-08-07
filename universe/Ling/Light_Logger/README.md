Light_Logger
===========
2019-08-01



A logger service to use in your [Light](https://github.com/lingtalfi/Light) applications.

This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Logger
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Logger api](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Service](#service)


Service
---------

This plugin provides the following services:

- logger


More info in the description of the [LightLoggerService class](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService.md).



Here is an example of service configuration:

```yaml
logger:
    instance: Ling\Light_Logger\LightLoggerService
    methods:
        setFormat:
            format: [{channel}]: {dateTime} -- {message}
    methods_collection: []
        -
            method: addListener
            args:
                channels: *
                listener:
                    instance: Ling\Light_Logger\Listener\LightFileLoggerListener
                    methods:
                        configure:
                            options:
                                file: ${app_dir}/log/light_log.log

```



History Log
=============

- 1.0.0 -- 2019-08-01

    - initial commit