Light_ChloroformExtension
===========
2019-11-18



More [Chloroform](https://github.com/lingtalfi/Chloroform) Field objects for the [light framework](https://github.com/lingtalfi/Light).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
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