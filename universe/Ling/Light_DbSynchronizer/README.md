Light_DbSynchronizer
===========
2020-06-19 -> 2021-04-06



A semi-automated tool to synchronize your database with a "create" file.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_DbSynchronizer
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_DbSynchronizer
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_DbSynchronizer api](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
db_synchronizer:
    instance: Ling\Light_DbSynchronizer\Service\LightDbSynchronizerService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options:
                useDebug: true          # default is true
                stopAtFirstError: false # default is false


# --------------------------------------
# hooks
# --------------------------------------
$logger.methods_collection:
    -
        method: addListener
        args:
            channels: db_synchronizer.debug
            listener:
                instance: Ling\Light_Logger\Listener\LightCleanableFileLoggerListener
                methods:
                    configure:
                        options:
                            file: ${app_dir}/log/db_synchronizer_debug.txt
    -
        method: addListener
        args:
            channels: db_synchronizer.error
            listener:
                instance: Ling\Light_Logger\Listener\LightFileLoggerListener
                methods:
                    configure:
                        options:
                            file: ${app_dir}/log/db_synchronizer_error.txt




```



History Log
=============

- 1.2.16 -- 2021-04-06

    - update LightDbSynchronizerService->executeStatement, now returns more useful debug messages
  
- 1.2.15 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.2.14 -- 2021-03-05

    - update README.md, add install alternative

- 1.2.13 -- 2021-02-25

    - fix assets/map dir removed

- 1.2.12 -- 2021-02-23

    - Update dependencies (pushed by SubscribersUtil)

- 1.2.11 -- 2021-02-23

    - Update dependencies (pushed by SubscribersUtil)

- 1.2.10 -- 2021-02-23

    - Update dependencies

- 1.2.9 -- 2021-02-19

    - upgrade dependencies

- 1.2.8 -- 2021-02-11

    - fix non synchronized dependencies between uni style and lpi style
  
- 1.2.7 -- 2021-02-11

    - fix service not declaring dependency to Light_DatabaseInfo planet
  
- 1.2.6 -- 2021-01-25

    - update LightDbSynchronizerHelper::synchronizePlanetCreateFile, add scope option
  
- 1.2.5 -- 2021-01-25

    - update LightDbSynchronizerService, fix primary key remove/create problems, add column order detection feature
  
- 1.2.4 -- 2021-01-25

    - update conception notes, add clarifications
  
- 1.2.3 -- 2021-01-22

    - add LightDbSynchronizerHelper class
    - fix LightDbSynchronizerService not handling rename column statements correctly, fix tinyint display width triggering a stale sync
  
- 1.2.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.0 -- 2020-08-11

    - update LightDbSynchronizerService->logDebug, now can return logDebug messages on demand even with logDebug turned off
    
- 1.1.1 -- 2020-06-22

    - add create file section in conception notes
    
- 1.1.0 -- 2020-06-22

    - add LightDbSynchronizerService->getLogErrorMessages and getLogDebugMessages methods
    
- 1.0.0 -- 2020-06-19

    - initial commit