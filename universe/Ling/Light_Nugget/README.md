Light_Nugget
===========
2020-08-21 -> 2020-12-03



A service to fetch [nuggets](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/nomenclature.md#nugget).


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Nugget
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Nugget api](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml

nugget:
    instance: Ling\Light_Nugget\Service\LightNuggetService
    methods:
        setContainer:
            container: @container()






```



History Log
=============

- 1.3.4 -- 2020-12-03

    - update documentation, add "light execute notation" section
    
- 1.3.3 -- 2020-10-15

    - update LightNuggetService->getNuggetByPath method, now resolve light execute notation by default
    
- 1.3.2 -- 2020-10-02

    - update LightNuggetService, add getNuggetByPath method
    
- 1.3.1 -- 2020-09-24

    - update LightNuggetService, add getNuggetDirective method
    
- 1.3.0 -- 2020-09-21

    - update variables resolution system, now use percent notation to avoid conflict with babyYaml mappings
    
- 1.2.10 -- 2020-09-21

    - update conception notes suggestion path
    
- 1.2.9 -- 2020-09-18

    - update conception notes toc
    
- 1.2.8 -- 2020-09-15

    - add variables replacement mechanism
    
- 1.2.7 -- 2020-09-14

    - fix LightNuggetService->checkSecurity not working (loose implementation)
    
- 1.2.6 -- 2020-09-14

    - add security.handler_params directive
    
- 1.2.5 -- 2020-09-14

    - update LightNuggetService->checkSecurity, now takes the whole nugget instead of the security bit (cancelling last commit).
    
- 1.2.4 -- 2020-09-14

    - update LightNuggetService->checkSecurity, now takes the security bit instead of the whole nugget.
    
- 1.2.3 -- 2020-09-14

    - add LightNuggetService->checkSecurity method.
    
- 1.2.1 -- 2020-08-25

    - update LightNuggetService->getNugget docBlock comment.
    
- 1.2.0 -- 2020-08-24

    - update conception notes, add security recommendation, made LightNuggetService->getNugget method a little more secure
    
- 1.1.0 -- 2020-08-24

    - update conception notes
    
- 1.0.1 -- 2020-08-21

    - update doc (forgot to configure docTools)
    
- 1.0.0 -- 2020-08-21

    - initial commit