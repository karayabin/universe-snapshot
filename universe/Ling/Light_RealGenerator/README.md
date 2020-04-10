Light_RealGenerator
===========
2019-10-24 -> 2020-03-10



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