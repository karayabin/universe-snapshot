Light_Realform
===========
2019-10-21



A tool for the [light framework](https://github.com/lingtalfi/Light) to create any form. 

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Realform
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes linear](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/conception-notes-linear.md)
    - [Conception notes](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/conception-notes.md)
    - [Realform configuration example](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/realform-config-example.md)

- [Services](#services)
- [Related](#related)



Services
=========


This plugin provides the following services:

- realform (returns a LightRealformService instance)



Here is an example of the service configuration:

```yaml
realform:
    instance: Ling\Light_Realform\Service\LightRealformService
    methods:
        setContainer:
            container: @container()
```



Related
==========

- [Light_Realist](https://github.com/lingtalfi/Light_Realist): a tool to create any list
- [Light_RealGenerator](https://github.com/lingtalfi/Light_RealGenerator): a tool to generate configuration files for realist and realform


History Log
=============

- 1.1.0 -- 2019-11-01

    - finished the base implementation
    
- 1.0.4 -- 2019-10-24

    - add link in README.md

- 1.0.3 -- 2019-10-24

    - update realform configuration example
    
- 1.0.2 -- 2019-10-24

    - add realform configuration example
    
- 1.0.1 -- 2019-10-21

    - add related section in README.md
    
- 1.0.0 -- 2019-10-21

    - initial commit