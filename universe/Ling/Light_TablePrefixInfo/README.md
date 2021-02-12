Light_TablePrefixInfo
===========
2020-12-01



A plugin to register/deliver information about table prefixes.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_TablePrefixInfo
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_TablePrefixInfo api](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
table_prefix_info:
    instance: Ling\Light_TablePrefixInfo\Service\LightTablePrefixInfoService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options: []







```



History Log
=============

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2020-12-01

    - initial commit