Light_It4Tools
===========
2021-12-01 -> 2022-01-20



Some tools related to IT4.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_It4Tools
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_It4Tools
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)






Services
=========


Here is an example of the service configuration:

```yaml
it4_tools:
    instance: Ling\Light_It4Tools\Service\LightIt4ToolsService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options: ${it4_tools_vars.service_options}

it4_tools_vars:
    service_options:
        dbInfoCacheDir: ${app_dir}/cache/Light_DatabaseInfo




```



History Log
=============

- 1.0.6 -- 2022-01-20

    - add It42021LightDatabaseInfoService class
  
- 1.0.5 -- 2021-12-05

    - add It4FileParserTool class
  
- 1.0.4 -- 2021-12-05

    - add It4DbParserTool->recreateAll method
    
- 1.0.3 -- 2021-12-02

    - test commit 2
  
- 1.0.2 -- 2021-12-02

    - test commit
  
- 1.0.1 -- 2021-12-02

    - add $noParseTables param to It4DbParserTool.getRelatedTablesByTables method

- 1.0.0 -- 2021-12-01

    - initial commit