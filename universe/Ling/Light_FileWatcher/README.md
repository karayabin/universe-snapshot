Light_FileWatcher
===========
2020-06-25 -> 2020-06-26



A file watcher service for the [light framework](https://github.com/lingtalfi/Light).


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_FileWatcher
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_FileWatcher api](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
file_watcher:
    instance: Ling\Light_FileWatcher\Service\LightFileWatcherService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options:
                useDebug: true      # default is false

# --------------------------------------
# hooks
# --------------------------------------
$events.methods_collection:
    -
        method: registerListener
        args:
            events:
                - Light.initialize_1
            listener:
                instance: @service(file_watcher)
                callable_method: onInitialize


$logger.methods_collection:
    -
        method: addListener
        args:
            channels: file_watcher.debug
            listener:
                instance: Ling\Light_Logger\Listener\LightCleanableFileLoggerListener
                methods:
                    configure:
                        options:
                            file: ${app_dir}/log/file_watcher_debug.txt




```



History Log
=============

- 1.1.0 -- 2020-06-26

    - update service to accommodate bug with __DIR__
    
- 1.0.0 -- 2020-06-25

    - initial commit