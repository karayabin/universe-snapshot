Light_ReverseRouter
===========
2019-04-10 -> 2019-12-17



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
    instance: Ling\Light_ReverseRouter\Service\LightReverseRouterService



# --------------------------------------
# hooks
# --------------------------------------
$events.methods_collection:
    -
        method: registerListener
        args:
            events: Light.initialize_1
            listener:
                instance: @service(reverse_router)
                callable_method: initialize





```

The **reverse_router** service can build an uri from a [route](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md),
and so it helps creating web applications which don't use hardcoded uris.

In other words, it helps creating web applications where you can change uris easily. 


The **initializer** service is provided by the [Light_Initializer planet](https://github.com/lingtalfi/Light_Initializer), which this planet depends on.






History Log
=============

- 1.11.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.11.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.11.1 -- 2019-12-17

    - fix functional typo in service configuration
    
- 1.11.0 -- 2019-12-17

    - update plugin to accommodate Light 0.50 new initialization system

- 1.10.0 -- 2019-11-19

    - ReverseRouter becomes LightReverseRouterService 
    
- 1.9.0 -- 2019-11-12

    - fix functional typo and rewrite service configuration with new listener priority 
    
- 1.8.0 -- 2019-11-11

    - add redirecting handler for Light.on_exception_caught event 
    
- 1.7.2 -- 2019-09-17

    - update ReverseRouter to accommodate new LightReverseRouterInterface interface method signature 
    
- 1.7.1 -- 2019-10-21

    - update ReverseRouter->getUrl, now internally uses UriTool::httpBuildQuery instead of http_build_query
    
- 1.7.0 -- 2019-09-17

    - update ReverseRouter to accommodate new LightReverseRouterInterface interface methods 
    
- 1.6.0 -- 2019-09-10

    - update service instantiation to accommodate the new initializer interface
    
- 1.5.0 -- 2019-09-05

    - update ReverseRouter->getUrl, now add query string when urlParameters are passed
    
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