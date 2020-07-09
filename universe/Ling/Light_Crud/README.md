Light_Crud
===========
2019-11-28 -> 2020-06-04



A generic crud system for your [light](https://github.com/lingtalfi/Light) applications.



This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Crud
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Crud api](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Crud/blob/master/doc/pages/conception-notes.md)
    - [Events](https://github.com/lingtalfi/Light_Crud/blob/master/doc/pages/events.md)

- [Services](#services)



Services
=========

Here is an example of the service configuration:

```yaml
crud:
    instance: Ling\Light_Crud\Service\LightCrudService
    methods:
        setContainer:
            container: @container()
```





History Log
=============

- 1.7.0 -- 2020-06-04

    - adapt for new Light_AjaxHandler api
    
- 1.6.0 -- 2020-03-06

    - implement row restriction
    
- 1.5.1 -- 2020-02-27

    - update LightCrudService->execute, gives more details about an error message
    
- 1.5.0 -- 2019-12-18

    - update to accommodate Light_MicroPermission 2.0
    
- 1.4.0 -- 2019-12-16

    - removed event system, as it's now handled directly by the underlying Light_Database plugin

- 1.3.0 -- 2019-12-06

    - move LightBaseCrudRequestHandler->getWhereByRics to SimplePdoWrapper planet
    
- 1.2.0 -- 2019-12-06

    - update LightBaseCrudRequestHandler to accommodate the latest version of the form multiplier trick
    
- 1.1.0 -- 2019-12-03

    - update LightBaseCrudRequestHandler, can now handle the form multiplier trick
    
- 1.0.1 -- 2019-11-28

    - update LightCrudRequestHandlerInterface, add precision comment
    
- 1.0.0 -- 2019-11-28

    - initial commit