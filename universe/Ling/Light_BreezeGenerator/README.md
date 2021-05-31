Light_BreezeGenerator
===========
2019-09-11 -> 2021-03-15



A simple orm generator service with different flavours, for the [light](https://github.com/lingtalfi/Light) framework.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_BreezeGenerator
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/BreezeGenerator
```

Or just download it and place it where you want otherwise.






Summary
===========
- [BreezeGenerator api](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/conception-notes.md)
    - [Ling breeze generator 2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator-2.md)
    - [Ling breeze generator](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator.md)
    - [Ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md)
- [Services](#services)



Services
=========


This plugin provides the following services:

- breeze_generator



Here is an example of the service configuration:

```yaml
breeze_generator:
    instance: Ling\Light_BreezeGenerator\Service\LightBreezeGeneratorService
    methods:
        setContainer:
            container: @container()

```




History Log
=============

- 1.29.14 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.29.13 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0
  
- 1.29.12 -- 2021-03-05

    - update README.md, add install alternative

- 1.29.11 -- 2021-02-19

    - upgrade dependencies

- 1.29.10 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.29.9 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.29.8 -- 2020-11-09

    - fix LingBreezeGenerator2 generating erroneous deleteBy, updateBy docBlock parameters  
    
- 1.29.7 -- 2020-11-05

    - update LingBreezeGenerator2, add the usePrefixInMethodNames option
    
- 1.29.6 -- 2020-11-03

    - fix LingBreezeGenerator2, method name conflicts with deleteByFk and "has table" deleteBy methods 
    
- 1.29.5 -- 2020-11-03

    - update LingBreezeGenerator2, now generates deleteByFk methods 
    
- 1.29.4 -- 2020-10-30

    - update LingBreezeGenerator2, add precision in comment for generated insert methods 
    
- 1.29.3 -- 2020-10-16

    - update LingBreezeGenerator2, add singleColumn handling for generated fetch methods
    
- 1.29.2 -- 2020-09-01

    - fix LingBreezeGenerator2 typo when generating fetchAll method
    
- 1.29.1 -- 2020-08-31

    - fix LingBreezeGenerator2 generating update method twice
    
- 1.29.0 -- 2020-08-13

    - update LingBreezeGenerator2, add simple update method, add extraWhere and markers args to generated updateBy methods
    
- 1.28.1 -- 2020-08-10

    - fix LingBreezeGenerator2, generated factory didn't set the container on api objects 
    
- 1.28.0 -- 2020-07-27

    - update LingBreezeGenerator2, add fetch and fetchAll methods 
    
- 1.27.2 -- 2020-07-21

    - fix LingBreezeGenerator2, conflict when generating interface method using the "user" variable 
    
- 1.27.1 -- 2020-07-03

    - fix LingBreezeGenerator2 generated insert method not taking SimplePdoWrapperQueryException into account 
    
- 1.27.0 -- 2020-07-03

    - update LingBreezeGenerator2 now generates multiple insert method 

- 1.26.0 -- 2020-06-08

    - fix LingBreezeGenerator2 generating wrong method names for some templates 

- 1.25.0 -- 2020-06-08

    - update LingBreezeGenerator2, now the source file can use the ${app_dir} tag 
    
- 1.24.1 -- 2020-06-08

    - update ling-breeze-generator-2.md document, add suggestion for the getFactory method 
    
- 1.24.0 -- 2020-06-02

    - add LingBreezeGenerator2 methods: getTagsColumn, getTagsColumns, getTagsKey2Value 
    
- 1.23.0 -- 2020-05-28

    - add LingBreezeGenerator2 delete methods 
    
- 1.22.0 -- 2020-05-21

    - add LingBreezeGenerator2 deleteXXXByIds methods 
    
- 1.21.0 -- 2020-05-21

    - LingBreezeGenerator2 custom interfaces now extends generated interfaces 
    
- 1.20.0 -- 2020-05-21

    - add LingBreezeGenerator2 
    
- 1.19.1 -- 2020-02-13

    - fix LingBreezeGenerator->getItemsXXXByHasMethod method wrong template 
    
- 1.19.0 -- 2020-02-13

    - update LingBreezeGenerator, now generates getter methods based on has relationship 
    
- 1.18.0 -- 2020-02-06

    - update LingBreezeGenerator, now generates documentation with link to the whereConds argument 
    
- 1.17.0 -- 2020-02-05

    - update LingBreezeGenerator, now generates getObject and getObjects methods 
    
- 1.16.0 -- 2020-02-05

    - update LingBreezeGenerator, now generates deleteByForeignKey methods for has tables 
    
- 1.15.0 -- 2020-02-04

    - update LingBreezeGenerator, now generates factory methods only return interfaces 
    
- 1.14.1 -- 2020-02-04

    - fix LingBreezeGenerator->getFactoryMethod not returning the child object instead of the Custom object
    
- 1.14.0 -- 2020-02-04

    - LingBreezeGenerator now generates getIdByUniqueIndex methods
    
- 1.13.0 -- 2020-02-04

    - LingBreezeGenerator now add abstract class if the child class is extended by a Custom class
    
- 1.12.0 -- 2020-02-04

    - new version of LightBreezeGenerator, more organized, more flexible, new doc
    
- 1.11.2 -- 2020-01-31

    - fix insertUser.tpl.txt not throwing exception when ignoreDuplicate flag is false
    
- 1.11.1 -- 2019-12-20

    - fix LingBreezeGenerator->generate not generating the setContainer method for the factory class if useMicroPermission is set to false  
    
- 1.11.0 -- 2019-12-19

    - add baseClassName system, re-factorize internal code  
    
- 1.10.0 -- 2019-12-18

    - update to accommodate Light_MicroPermission 2.0  
    
- 1.9.3 -- 2019-12-17

    - fix LingBreezeGenerator->getDoRicMethod, incorrectly replacing $user instead of array $user  
    
- 1.9.2 -- 2019-12-17

    - fix LingBreezeGenerator not removing // getAllXXX comment in generated interface  
    
- 1.9.1 -- 2019-12-17

    - fix getAllXXX.tpl.txt, missing asterisk in comment  
    
- 1.9.0 -- 2019-12-17

    - update lsom, add getAllXXX method 
    
- 1.8.2 -- 2019-12-16

    - update UserObjectInterface.phtml, added a doc link to ling standard object methods 
    
- 1.8.1 -- 2019-10-31

    - update LingBreezeGenerator, now useMicroPermission=false by default 
    
- 1.8.0 -- 2019-10-31

    - update LingBreezeGenerator now the microPermission plugin can be set directly from the factory 
    
- 1.7.2 -- 2019-10-30

    - fix LingBreezeGenerator not generating docBlock parameters correctly for doXXX methods 
    
- 1.7.1 -- 2019-10-30

    - fix typo with insertXXX methods's first argument 
    
- 1.7.0 -- 2019-10-30

    - update LingBreezeGenerator, now implements a micro permission layer
    
- 1.6.0 -- 2019-10-30

    - add LightBreezeGeneratorService->addConfigurationEntryByFile
    
- 1.5.1 -- 2019-10-23

    - fix LingBreezeGenerator not generating interface methods for unique indexes
    
- 1.5.0 -- 2019-10-23

    - extended lsom, LingBreezeGenerator now also generate methods for every unique index
    
- 1.4.1 -- 2019-10-17

    - fix getXXX method not replacing user table correctly
    
- 1.4.0 -- 2019-10-17

    - implemented custom methods system
    
- 1.3.0 -- 2019-10-04

    - update LingBreezeGenerator->getInsertMethod, now returns consistent return, even with ignored duplicate entries
    
- 1.2.0 -- 2019-09-16

    - add usePrefixInClassName option in the service configuration
    - now LingBreezeGenerator doesn't include the namespace automatically in the path of the generated file
    
- 1.1.1 -- 2019-09-16

    - add documentation precision for lsom
    
- 1.1.0 -- 2019-09-16

    - update getXXX method, add a default return argument
    
- 1.0.7 -- 2019-09-13

    - add arguments to "ling standard object methods" doc
    
- 1.0.6 -- 2019-09-13

    - add line to "ling standard object methods"
    
- 1.0.5 -- 2019-09-13

    - added "ling standard object methods" concept
    
- 1.0.4 -- 2019-09-13

    - added example of ling breeze generator
    
- 1.0.3 -- 2019-09-13

    - fix wrong service example in README.md
    
- 1.0.2 -- 2019-09-13

    - fix doc links
    
- 1.0.1 -- 2019-09-13

    - fix doc links
    
- 1.0.0 -- 2019-09-13

    - initial commit