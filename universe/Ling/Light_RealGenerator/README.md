Light_RealGenerator
===========
2019-10-24 -> 2021-03-15



A [light](https://github.com/lingtalfi/Light) plugin to generate [realist](https://github.com/lingtalfi/Light_Realist) and [realform](https://github.com/lingtalfi/Light_Realform) configuration files.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_RealGenerator
```

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


# --------------------------------------
# hooks
# --------------------------------------
$logger.methods_collection:
    -
        method: addListener
        args:
            channels: real_generator.debug
            listener:
                instance: Ling\Light_Logger\Listener\LightCleanableFileLoggerListener
                methods:
                    configure:
                        options:
                            file: ${app_dir}/log/real_generator_debug.txt
```


How to use
--------------

```php

$file = $appDir . '/config/data/Ling.Light_Kit_Admin/Light_RealGenerator/jindemo.byml';
az($container->get("real_generator")->generate($file));
```






Related
=========
- [Light_Realist](https://github.com/lingtalfi/Light_Realist): a light plugin to create any list.
- [Light_Realform](https://github.com/lingtalfi/Light_Realform): a light plugin to create any form.



History Log
=============


- 1.31.20 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.31.19 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.31.18 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.31.17 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.31.16 -- 2021-03-05

    - update README.md, add install alternative

- 1.31.15 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.31.14 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.31.13 -- 2020-12-01

    - update ListConfigGenerator->getCrossColumnPluginName, now returns the planetId by default
    
- 1.31.12 -- 2020-12-01

    - add internal LightRealGeneratorService->getNewListConfigGeneratorInstance method
    
- 1.31.11 -- 2020-12-01

    - add internal ListConfigGenerator->getCrossColumnPluginName method
    
- 1.31.10 -- 2020-11-27

    - fix generated config, now nullable field depends on column nullability
    
- 1.31.9 -- 2020-11-23

    - update generated config, now adds planetId if galaxyName defined in variables
    
- 1.31.8 -- 2020-11-12

    - update config, adapt new Light_Nugget variable replacement system
    - update config, include rendering section
    - update FormConfigGenerator, now generates inline tableListConf
    - update RepresentativeColumnFinderUtil->method, now uses the first varchar col instead of the first str col as the representative
    
- 1.31.7 -- 2020-09-18

    - update config example
    
- 1.31.6 -- 2020-09-18

    - update ListConfigGenerator, now uses _vars system as well

- 1.31.5 -- 2020-09-18

    - update variable system, now uses the exclamation mark instead of dollar, to avoid conflict with Light_Nugget var system
    
- 1.31.4 -- 2020-09-18

    - re-enabling form multiplier trick
    
- 1.31.3 -- 2020-09-17

    - fix ListConfigGenerator not showing cross columns properly
    
- 1.31.2 -- 2020-09-17

    - fix FormConfigGenerator trying to merge arrays with null value
    
- 1.31.1 -- 2020-09-17

    - update FormConfigGenerator remove unused code
    
- 1.31.0 -- 2020-09-15

    - update api to adapt new Realist and Realform apis
    
- 1.30.3 -- 2020-09-03

    - update "The configuration block" document, list.target_dir and form.target_dir have new defaults

- 1.30.2 -- 2020-09-03

    - update "The configuration block" document, reorganized, fix typo
    
- 1.30.1 -- 2020-09-03

    - fix "The configuration block" document, forgot to remove the identifier part
    
- 1.30.0 -- 2020-09-03

    - adapt for realist2 api
    
- 1.29.0 -- 2020-08-18

    - add LightRealGeneratorService->generateByConf method
    
- 1.28.0 -- 2020-08-18

    - update config file, add target_basename directive
    
- 1.27.0 -- 2020-08-04

    - update LightRealGeneratorService->generate, now returns the configuration array used
    
- 1.26.0 -- 2020-08-03

    - update config file, add use_list and use_form properties
    
- 1.25.1 -- 2020-07-31

    - fix Light_RealGenerator generating old way of checking csrf_token
    
- 1.25.0 -- 2020-07-07

    - add create_file and use_create_file directives

- 1.24.1 -- 2020-07-06

    - update configuration block example
    
- 1.24.0 -- 2020-07-06

    - update ListConfigGenerator to accommodate new _action dynamic column name

- 1.23.2 -- 2020-07-02

    - fix LightRealGeneratorService->generate not replacing multiple variables in the same string
    
- 1.23.1 -- 2020-07-02

    - fix LightRealGeneratorService->generate not replacing string variables correctly
    
- 1.23.0 -- 2020-07-02

    - update LightRealGeneratorService, now can use variables to replace keys, and non-scalar are accepted for values replacement 
    
- 1.22.0 -- 2020-06-30

    - update generator logs, now uses symbolic path to make it more readable 
    
- 1.21.0 -- 2020-06-30

    - update generator, add log system 

- 1.20.0 -- 2020-03-10

    - update generator config, add form.on_success_handler.use_row_restriction property for database handler 
    
- 1.19.1 -- 2020-03-03

    - fix ListConfigGenerator not generating table alias for non crossed columns
    
- 1.19.0 -- 2020-02-28

    - add list config properties, such as cross_column_hub_link_table_prefix_2_plugin 
    - fix ListConfigGenerator->getFileContent, generating incorrect operator_and_value.value option instead of operator_and_value.target
    
- 1.18.2 -- 2020-02-26

    - fix ListConfigGenerator->getFileContent, ambiguous column name with joined tables in where clause too
    
- 1.18.1 -- 2020-02-26

    - fix ListConfigGenerator->getFileContent, ambiguous column name with joined tables
    
- 1.18.0 -- 2020-02-26

    - add variables system
    
- 1.17.0 -- 2019-12-18

    - update to accommodate Light_MicroPermission 2.0
    
- 1.16.0 -- 2019-12-09

    - update ListConfigGenerator, added an edit icon for list action
    
- 1.15.0 -- 2019-12-06

    - update FormConfigGenerator to handle latest form multiplier trick
    
- 1.14.0 -- 2019-12-04

    - update FormConfigGenerator now can handle for multiplier trick's update initial value
    
- 1.13.0 -- 2019-12-03

    - update FormConfigGenerator now can handle for multiplier trick
    
- 1.12.0 -- 2019-12-02

    - update FormConfigGenerator to accommodate new TableField.search_column property
    
- 1.11.0 -- 2019-11-28

    - update FormConfigGenerator to accommodate with new database success handler
    
- 1.10.0 -- 2019-11-19

    - update FormConfigGenerator, now handles TableListField objects
    
- 1.9.1 -- 2019-11-14

    - fix ListConfigGenerator: in_rics not being generated
    
- 1.9.0 -- 2019-11-13

    - implemented cross column concept
    
- 1.8.0 -- 2019-11-06

    - update ListConfigGenerator, now we can set the label for checkbox and action
    - fix functional typo in ListConfigGenerator 
    
- 1.7.0 -- 2019-11-06

    - update ListConfigGenerator, now rows renderer types accept the generic tags
    
- 1.6.0 -- 2019-11-05

    - update, add form.title and list.title properties
    
- 1.5.0 -- 2019-11-05

    - update ListConfigGenerator, now accepts {TableClass} tag
    
- 1.4.1 -- 2019-11-05

    - fix functional typo in ListConfigGenerator
    
- 1.4.0 -- 2019-11-05

    - update ListConfigGenerator, now handles the related_links section

- 1.3.1 -- 2019-11-05

    - fix ListConfigGenerator generating fields instead of base_fields

- 1.3.0 -- 2019-11-04

    - update FormConfigGenerator, now handles fields_merge_aliases
    
- 1.2.0 -- 2019-11-04

    - update FormConfigGenerator, now handles on_success_handler

- 1.1.0 -- 2019-10-30

    - update ListConfigGenerator, now includes use_micro_permission entry
    
- 1.0.2 -- 2019-10-25

    - add onGenerateAfter method
    
- 1.0.1 -- 2019-10-25

    - add link to README.md
    
- 1.0.0 -- 2019-10-24

    - initial commit