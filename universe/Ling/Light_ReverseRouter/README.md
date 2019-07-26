Light_ReverseRouter
===========
2019-04-10



A reverse router for the [Light](https://github.com/lingtalfi/Light) framework.
This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_ReverseRouter
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_ReverseRouter api](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)





Services
=========

Here is the content of the service configuration file:

```yaml
reverse_router:
    instance: Ling\Light_ReverseRouter\ReverseRouter



# --------------------------------------
# hooks
# --------------------------------------
$initializer.methods.setInitializers.initializers:
    - @service(reverse_router)



```

The **reverse_router** service can build an uri from a [route](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md),
and so it helps creating web applications which don't use hardcoded uris.

In other words, it helps creating web applications where you can change uris easily. 


The **initializer** service is provided by the [Light_Initializer planet](https://github.com/lingtalfi/Light_Initializer), which this planet depends on.






History Log
=============
    
- 1.4.0 -- 2019-07-18

    - update ReverseRouter.getUrl to adapt the new LightReverseRouterInterface
    
- 1.3.2 -- 2019-07-18

    - fix ReverseRouter.getUrl returning wrong implicit host for absolute url
    
- 1.3.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
        
- 1.3.0 -- 2019-07-17

    - update ReverseRouter class to adapt the new LightInitializerInterface
    
- 1.2.0 -- 2019-07-17

    - update ReverseRouter class to adapt the new LightReverseRouterInterface
    
- 1.1.0 -- 2019-07-17

    - update ReverseRouter class to adapt the new  LightInitializerInterface
    
- 1.0.0 -- 2019-04-10

    - initial commit