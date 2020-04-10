Light_UserRowRestriction
===========
2020-03-03 -> 2020-03-10



A tool to help defend against the [database-identity-usurpation](https://github.com/lingtalfi/TheBar/blob/master/discussions/database-identity-usurpation.md) problem.

This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_UserRowRestriction
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_UserRowRestriction api](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md)


- [Services](#services)
- [Related](#related)



Services
=========


This plugin provides the following services:

- user_row_restriction (returns a LightUserRowRestrictionService instance)




Here is an example of the service configuration:

```yaml
user_row_restriction:
    instance: Ling\Light_UserRowRestriction\Service\LightUserRowRestrictionService
    methods:
        setContainer:
            container: @container()





```


Related
===========
- [Light_MicroPermission](https://github.com/lingtalfi/Light_MicroPermission)



History Log
=============

- 1.3.0 -- 2020-03-10

    - implement the new row restriction system 
    
- 1.2.0 -- 2020-03-05

    - add LightUserRowRestrictionService::$mode property 
    
- 1.1.0 -- 2020-03-03

    - update plugin to adapt new Light_Database implementation with system call flags 
    
- 1.0.2 -- 2020-03-03

    - fix LightUserRowRestrictionService->handle passing $eventName in checkRestriction 
    
- 1.0.1 -- 2020-03-03

    - fix LightUserRowRestrictionService->handle fetch "select database" triggering error
    
- 1.0.0 -- 2020-03-03

    - initial commit