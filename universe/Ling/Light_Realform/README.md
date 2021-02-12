Light_Realform
===========
2019-10-21 -> 2020-12-01



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
    - [Conception notes](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/2020/conception-notes.md)

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

- 2.0.7 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 2.0.6 -- 2020-12-04

    - Add lpi-deps.byml file

- 2.0.5 -- 2020-12-01

    - update service, now recognizes fields of type bool
    
- 2.0.4 -- 2020-11-26

    - update service's injectDefaultValues method, now is private
    - fix multiplier not working properly
    
- 2.0.3 -- 2020-09-21

    - add service's executeSuccessHandler and injectDefaultValues methods

- 2.0.2 -- 2020-09-18

    - implementation of the form multiplier trick
    
- 2.0.1 -- 2020-09-15

    - update links in README.md
    
- 2.0.0 -- 2020-09-15

    - new api
    
- 1.18.0 -- 2020-08-10

    - update BaseRealformHandler, is now generated-custom config pattern compliant
    
- 1.17.1 -- 2020-08-07

    - rename LightRealformLateServiceRegistrationInterface->registerByIdentifier to registerRealformByIdentifier
    
- 1.17.0 -- 2020-08-07

    - add LightRealformLateServiceRegistrationInterface
    
- 1.16.0 -- 2020-07-07

    - update LightRealformRoutineTwo->processForm, add onSuccess option, and update signature
    
- 1.15.0 -- 2020-07-06

    - update LightRealformRoutineOne->processForm, now the onSuccess callback can return an http response directly
    
- 1.14.0 -- 2020-03-06

    - update to accommodate user row restriction system
    
- 1.13.1 -- 2020-02-28

    - fix LightRealformRoutineTwo->processForm displaying share checkboxes even when there is only one record to edit
    
- 1.13.0 -- 2019-12-18

    - update to accommodate Light_MicroPermission 2.0

- 1.12.0 -- 2019-12-16

    - update plugin to accommodate new Light service container

- 1.11.0 -- 2019-12-10

    - add LightRealformRoutineTwo
    - update RealformHandlerInterface->getFormHandler method, add configuration optional argument
    
- 1.10.0 -- 2019-12-06

    - update ToDatabaseSuccessHandler to handle latest form multiplier trick
    
- 1.9.0 -- 2019-12-03

    - update ToDatabaseSuccessHandler, now handles form multiplier trick
    
- 1.8.0 -- 2019-11-29

    - add LightRealformRoutineOne

- 1.7.0 -- 2019-11-28

    - update ToDatabaseSuccessHandler, now delegates to Light_Crud service
    
- 1.6.0 -- 2019-11-25

    - update RealformSuccessHandlerInterface->processData removed the form instance as second argument (conception error)
    
- 1.5.0 -- 2019-11-25

    - update ToDatabaseSuccessHandler, now can handle iframe-signal
    
- 1.4.0 -- 2019-11-25

    - update RealformSuccessHandlerInterface->processData now takes the form instance as second argument
    
- 1.3.0 -- 2019-11-18

    - update BaseRealformHandler->getChloroformField, now handles table_list field
    
- 1.2.0 -- 2019-11-05

    - add title property in the configuration

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