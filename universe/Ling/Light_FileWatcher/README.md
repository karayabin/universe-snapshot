Light_FileWatcher
===========
2020-06-25 -> 2021-06-28



A file watcher service for the [light framework](https://github.com/lingtalfi/Light).


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_FileWatcher
```

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
                - Ling.Light.initialize_1
            listener:
                instance: @service(file_watcher)
                callable_method: onInitialize


```



History Log
=============

- 1.1.9 -- 2021-06-28

    - fix api wrong reference to Ling.Light_Logger
  
- 1.1.8 -- 2021-06-25

    - update api, now use Ling.Light_Logger open registration system
  
- 1.1.7 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.1.6 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.1.5 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.1.4 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2020-06-26

    - update service to accommodate bug with __DIR__
    
- 1.0.0 -- 2020-06-25

    - initial commit