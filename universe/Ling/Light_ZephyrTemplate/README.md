Light_ZephyrTemplate
===========
2019-04-09 -> 2021-03-05



A template service for the [Light](https://github.com/lingtalfi/Light) framework.
This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_ZephyrTemplate
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_ZephyrTemplate
```

Or just download it and place it where you want otherwise.




Summary
===========
- [Light_ZephyrTemplate api](https://github.com/lingtalfi/Light_ZephyrTemplate/blob/master/doc/api/Ling/Light_ZephyrTemplate.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)




Services
=========

Here is the content of the service configuration file:


```yaml
zephyr_template:
    instance: Ling\Light_ZephyrTemplate\LightZephyrTemplate
    methods:
        setDirectory:
            root_dir: ${app_dir}




```



The **template** service can be used to render html using the [zephyr template engine](https://github.com/lingtalfi/ZephyrTemplateEngine).




History Log
=============

- 1.2.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.2.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.0 -- 2019-11-11

    - changed service name to zephyr_template
    
- 1.1.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.0.0 -- 2019-04-09

    - initial commit