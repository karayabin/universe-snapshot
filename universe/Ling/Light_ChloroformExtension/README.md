Light_ChloroformExtension
===========
2019-11-18 -> 2021-03-15



More [Chloroform](https://github.com/lingtalfi/Chloroform) Field objects for the [light framework](https://github.com/lingtalfi/Light).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_ChloroformExtension
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_ChloroformExtension
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md)
- [Services](#services)
- [Related](#related)
    




Services
=========


This plugin provides the following services:

- chloroform_extension (returns a LightChloroformExtensionService instance)


Here is an example of the service configuration:

```yaml
chloroform_extension:
    instance: Ling\Light_ChloroformExtension\Service\LightChloroformExtensionService
    methods:
        setContainer:
            container: @container()


# --------------------------------------
# hooks
# --------------------------------------
$ajax_handler.methods_collection:
    -
        method: registerHandler
        args:
            id: Light_ChloroformExtension
            handler:
                instance: Ling\Light_ChloroformExtension\AjaxHandler\LightChloroformExtensionAjaxHandler
```



Related
===========
- [Chloroform](https://github.com/lingtalfi/Chloroform): the base form system
- [ChloroformChloroform_HeliumLightRenderer](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer): the chloroform renderer for light using bootstrap 





History Log
=============

- 1.6.16 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.6.15 -- 2021-05-11

    - Update deps (by CommitWizard).

- 1.6.14 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0
  
- 1.6.13 -- 2021-03-05

    - update README.md, add install alternative

- 1.6.12 -- 2021-02-19

    - upgrade dependencies

- 1.6.11 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.6.10 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.6.9 -- 2020-11-20

    - fix TableListField, multiplier was erroneously initialized in update mode 
    
- 1.6.8 -- 2020-11-20

    - fix TableListField, multiplier initialized to array instead of false 
    
- 1.6.7 -- 2020-11-20

    - update TableListField conception notes to adapt simpler form multiplier trick 
    
- 1.6.6 -- 2020-11-19

    - update TableListField conception notes to adapt new form multiplier trick 
    
- 1.6.5 -- 2020-09-25

    - update TableListField, now autocomplete also works with multiplier trick 
    
- 1.6.4 -- 2020-09-18

    - implementation of form multiplier trick 
    
- 1.6.3 -- 2020-09-14

    - adapt TableListService->checkSecurity to latest Light_Nugget changes 
    
- 1.6.2 -- 2020-09-14

    - adapt TableListService->checkSecurity to latest Light_Nugget changes 
    
- 1.6.1 -- 2020-09-14

    - update internal TableListService->checkSecurity method, now uses the checkSecurity method from Light_Nugget
    
- 1.6.0 -- 2020-09-14

    - new TableListField api 
    
- 1.5.0 -- 2020-06-04

    - adapt for new Light_AjaxHandler api 
    
- 1.4.2 -- 2019-12-09

    - fix TableListField inducing multiple=true in update mode 
    
- 1.4.1 -- 2019-12-06

    - update documentation links, configuration item => table list configuration item
    
- 1.4.0 -- 2019-12-06

    - update TableListField to adapt latest form multiplier trick changes
    
- 1.3.1 -- 2019-12-05

    - fix LightChloroformExtensionAjaxHandler not compatible with new TableListService addition
    
- 1.3.0 -- 2019-12-04

    - add TableListService and moved methods from LightChloroformExtensionService to TableListService
    
- 1.2.2 -- 2019-12-02

    - fix forgot to take into account the user query
    
- 1.2.1 -- 2019-12-02

    - fix TableListField->toArray throwing exception in insert mode
    
- 1.2.0 -- 2019-11-27

    - use of csrf_session service replaces csrf_simple
    
- 1.1.0 -- 2019-11-19

    - update TableListField conception, now handles the first display of ajax list with the column property
    
- 1.0.0 -- 2019-11-18

    - initial commit