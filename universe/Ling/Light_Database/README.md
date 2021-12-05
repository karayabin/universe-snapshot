Light_Database
===========
2019-07-22 -> 2021-06-28

A database service for the [Light](https://github.com/lingtalfi/Light) framework.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller)
via [light-cli](https://github.com/lingtalfi/Light_Cli)

```bash
lt install Ling.Light_Database
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.

```bash
uni import Ling/Light_Database
```

Or just download it and place it where you want otherwise.






Summary
===========

- [Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md) (
  generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages:
    - [conception notes](https://github.com/lingtalfi/Light_Database/blob/master/personal/mydoc/pages/conception-notes.md)
    - [events](https://github.com/lingtalfi/Light_Database/blob/master/personal/mydoc/pages/events.md)

- [Services](#services)

Services
=========


This plugin provides the following services:

- database  (returns a LightDatabaseService)

The database service provides you access to a configured instance of
the [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)
, which extends the
[SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper) class.

Here is the content of the service configuration file:

```yaml
database:
    instance: Ling\Light_Database\Service\LightDatabaseService
    methods:
        init:
            settings: []
        setOptions:
            options:
                devMode: true
                queryLog: true
                queryLogTrackSource: true
                queryLogFormatting:
                    query: white:bgBlack
                    error: white:bgRed
        setContainer:
            container: @container()


# example of settings
#$database.methods.init.settings:
#    pdo_database: my_database
#    pdo_user: my_user
#    pdo_pass: my_pass
#    pdo_options:
#        persistent: true
#        errmode: exception
#        initCommand: SET NAMES 'UTF8'



```

History Log
=============

- 1.14.30 -- 2021-06-28

    - fix api wrong reference to Ling.Light_Logger
  
- 1.14.29 -- 2021-06-25

    - update api, now use Ling.Light_Logger open registration system

- 1.14.28 -- 2021-06-03

    - add LightDatabaseBasePlanetInstaller class
    - adapt api to Light_PlanetInstaller 2.0.4

- 1.14.27 -- 2021-06-01

    - adding precision to the init1 message in LightDatabasePlanetInstaller

- 1.14.26 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.14.25 -- 2021-05-31

    - update api to work with Light_PlanetInstaller 2.0.0

- 1.14.24 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.14.23 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.14.22 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.14.21 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.14.20 -- 2021-05-03

    - fake commit to test generated lpi-deps.byml

- 1.14.19 -- 2021-03-22

    - adapt api to work with Ling.Light_Events:1.10.0

- 1.14.18 -- 2021-03-19

    - fix open events not in the "events" directory

- 1.14.17 -- 2021-03-18

    - switch to Ling.Light_Events' open registration system

- 1.14.16 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.14.15 -- 2021-03-05

    - update README.md, add install alternative

- 1.14.14 -- 2021-02-23

    - fix LightDatabasePlanetInstaller->onMapCopyAfter, erroneous bool condition

- 1.14.13 -- 2021-02-23

    - update LightDatabasePlanetInstaller->onMapCopyAfter, now only execute if necessary

- 1.14.12 -- 2021-02-15

    - add LightDatabasePlanetInstaller class

- 1.14.11 -- 2020-12-08

    - Fix lpi-deps not using natsort

- 1.14.10 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.14.9 -- 2020-11-20

    - update service, the queryLogTrackSource option has now better rendering

- 1.14.8 -- 2020-11-20

    - update service, the queryLogTrackSource option now renders more info about arguments

- 1.14.7 -- 2020-11-20

    - update service, the queryLogTrackSource option now also renders compact arguments

- 1.14.6 -- 2020-11-20

    - update service, the queryLogTrackSource option renders in a more php style way

- 1.14.5 -- 2020-11-20

    - update service, the queryLogTrackSource option is now recursive

- 1.14.4 -- 2020-11-20

    - update service, add queryLogTrackSource option

- 1.14.3 -- 2020-11-16

    - update service, add getMysqlInfoUtil method

- 1.14.2 -- 2020-11-06

    - update query log system, add formatting for error message

- 1.14.1 -- 2020-11-06

    - update service, add query log system

- 1.14.0 -- 2020-08-28

    - update service, dropped pXXX methods which added unnecessary complexity to the api

- 1.13.0 -- 2020-06-02

    - update service, embellished SimplePdoWrapperQueryException message now contains marker information as well

- 1.12.0 -- 2020-06-02

    - update service, embellish SimplePdoWrapperQueryException message when devMode=true

- 1.11.0 -- 2020-03-10

    - removed system call concept, implement user row restriction system

- 1.10.0 -- 2020-03-03

    - implement system call concept

- 1.9.3 -- 2020-03-03

    - fix LightDatabasePdoWrapper->dispatch forgot replace fix for passing only user-defined arguments instead of all
      method defined arguments

- 1.9.2 -- 2020-03-03

    - fix LightDatabasePdoWrapper->dispatch passing only user-defined arguments instead of all method defined arguments

- 1.9.1 -- 2020-03-03

    - fix LightDatabasePdoWrapper->dispatch, wrong method signature

- 1.9.0 -- 2020-03-02

    - replace listener concept with eventHandler concept

- 1.8.2 -- 2020-03-02

    - fix LightDatabasePdoWrapper, add registerListener method (forgot)

- 1.8.1 -- 2020-03-02

    - fix service config file

- 1.8.0 -- 2020-03-02

    - add listener concept, removed microPermission hook

- 1.7.1 -- 2019-12-20

    - fix LightDatabaseHelper->getTablesByQuery, not handling nested queries properly

- 1.7.0 -- 2019-12-20

    - removed LightDatabasePdoWrapper->disableMicroPermissions and enableMicroPermissions methods (conception error)

- 1.6.0 -- 2019-12-20

    - add LightDatabasePdoWrapper->disableMicroPermissions and enableMicroPermissions methods

- 1.5.2 -- 2019-12-19

    - fix functional typo in LightDatabasePdoWrapper->onSuccess: missing prefix in dispatched event

- 1.5.1 -- 2019-12-19

    - add links to pages in the README.md

- 1.5.0 -- 2019-12-19

    - add useMicroPermission system

- 1.4.1 -- 2019-12-17

    - update documentation events page

- 1.4.0 -- 2019-12-16

    - add LightDatabasePdoWrapper->onSuccess with events system

- 1.3.0 -- 2019-11-22

    - add LightDatabaseService

- 1.2.1 -- 2019-09-17

    - add comment in the README.md

- 1.2.0 -- 2019-08-14

    - remove LightDatabasePdoWrapperAwareInterface

- 1.1.0 -- 2019-08-14

    - add LightDatabasePdoWrapperAwareInterface

- 1.0.2 -- 2019-07-23

    - fix typo

- 1.0.1 -- 2019-07-22

    - update documentation for docTools

- 1.0.0 -- 2019-07-22

    - initial commit