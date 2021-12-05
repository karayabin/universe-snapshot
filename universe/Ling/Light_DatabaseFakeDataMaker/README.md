Light_DatabaseFakeDataMaker
===========
2021-07-02 -> 2021-07-30



Generate fake data for your database quickly.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_DatabaseFakeDataMaker
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_DatabaseFakeDataMaker
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_DatabaseFakeDataMaker api](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
database_fake_data_maker:
    instance: Ling\Light_DatabaseFakeDataMaker\Service\LightDatabaseFakeDataMakerService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options: ${database_fake_data_maker_vars.service_options}


database_fake_data_maker_vars:
    service_options: []





```



History Log
=============

- 1.0.3 -- 2021-07-30

    - test commit 2

- 1.0.2 -- 2021-07-30

    - test commit

- 1.0.1 -- 2021-07-30

    - add special strings: _select and _between
  
- 1.0.0 -- 2021-07-02

    - initial commit