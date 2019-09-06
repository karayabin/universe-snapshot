Light
===========
2019-04-05



WORK IN PROGRESS, COME BACK IN A FEW MONTHS...


A light framework for creating web apps.
This supersedes the [Jin](https://github.com/lingtalfi/Jin) framework. 


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Diary](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/diary.md)
    - [Plugin](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/plugin.md)
    - [Rights](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/rights.md)
    - [Route](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/route.md)
    - [Service container](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-service-container.md)
    - [General philosophy](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-general-philosophy.md)
    - [Application recommended structure](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-application-recommended-structure.md)






History Log
=============

- 0.13.2 -- 2019-09-03

    - add doc link to api
    
- 0.13.1 -- 2019-08-21

    - fix HttpJsonResponse typo
    
- 0.13.0 -- 2019-08-21

    - added HttpJsonResponse
    
- 0.12.0 -- 2019-08-14

    - changed application recommended structure philosophy
    
- 0.11.0 -- 2019-08-13

    - changed application recommended structure
    
- 0.10.0 -- 2019-08-09

    - add LightHelper::executeMethod
    
- 0.9.0 -- 2019-08-02

    - add setter/getter for Light applicationDir property.
    
- 0.8.0 -- 2019-07-18

    - add LightController
    - add LightAwareInterface
    
- 0.7.3 -- 2019-07-18

    - update LightReverseRouterInterface to reflect the new route concept

- 0.7.2 -- 2019-07-18

    - update route concept, the default protocol is now null instead of true
    
- 0.7.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 0.7.0 -- 2019-07-17

    - update Light instance to take into account the new LightInitializerInterface interface 
    
- 0.6.0 -- 2019-07-17

    - add HttpRedirectResponse 
    
- 0.5.0 -- 2019-07-17

    - update the route concept: now has the host and protocol bound to it 
    
- 0.4.0 -- 2019-07-17

    - add service container documentation page
    
- 0.3.0 -- 2019-07-16

    - update Light instance to take into account the new LightInitializerInterface interface
    
- 0.2.0 -- 2019-07-11

    - add LightServiceContainerAwareInterface
    
- 0.1.0 -- 2019-05-02

    - update LightDummyServiceContainer with the all method
    
- 0.0.0 -- 2019-04-05

    - initial commit