Light_RealGenerator
===========
2019-10-24



A [light](https://github.com/lingtalfi/Light) plugin to generate [realist](https://github.com/lingtalfi/Light_Realist) and [realform](https://github.com/lingtalfi/Light_Realform) configuration files.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_RealGenerator
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- [Related](#related)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/conception-notes.md)
    - [Configuration block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md)




Services
=========


This plugin provides the following services:

- real_generator (returns a LightRealGeneratorService instance)



Here is an example of the service configuration:

```yaml
real_generator:
    instance: Ling\Light_RealGenerator\Service\LightRealGeneratorService
    methods:
        setContainer:
            container: @container()
```


How to use
--------------

```php

$file = $appDir . '/config/data/Light_Kit_Admin/Light_RealGenerator/jindemo.byml';
az($container->get("real_generator")->generate($file));
```






Related
=========
- [Light_Realist](https://github.com/lingtalfi/Light_Realist): a light plugin to create any list.
- [Light_Realform](https://github.com/lingtalfi/Light_Realform): a light plugin to create any form.



History Log
=============

- 1.1.0 -- 2019-10-30

    - update ListConfigGenerator, now includes use_micro_permission entry
    
- 1.0.2 -- 2019-10-25

    - add onGenerateAfter method
    
- 1.0.1 -- 2019-10-25

    - add link to README.md
    
- 1.0.0 -- 2019-10-24

    - initial commit