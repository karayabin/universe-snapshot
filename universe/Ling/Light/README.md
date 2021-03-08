Light
===========
2019-04-05 -> 2021-03-05



WORK IN PROGRESS, COME BACK IN A FEW MONTHS..., OR USE IT NOW AT YOUR OWN RISKS


A light framework for creating web apps.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Application recommended structure](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-application-recommended-structure.md)
    - [Diary](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/diary.md)
    - [Efficiency tips](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/efficiency-tips.md)
    - [Environments](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/environments.md)
    - [Events](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md)
    - [General philosophy](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-general-philosophy.md)
    - [how to debug](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/how-to-debug.md)
    - [light init script](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-init-script.md)
    - [Nomenclature](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/nomenclature.md)
    - [Plugin](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/plugin.md)
    - [Rights](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/rights.md)
    - [Route](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/route.md)
    - [Service container](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-service-container.md)
    - [Security](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/security.md)
    - Design
        - [ajax permission philosophy](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/ajax-permission-philosophy.md)
        - [open vs close service registration](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/open-vs-close-service-registration.md)
    - Notation
        - [light execute notation](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/notation/light-execute-notation.md)
- [License](https://lingtalfi.com/no-license)





History Log
=============

- 0.69.30 -- 2021-03-05

    - update README.md, add install alternative

- 0.69.29 -- 2021-02-25

    - update Light->registerRoute method, now the pattern and controller argument have precedence over their equivalents in the route array
    - add container notation definition
  
- 0.69.28 -- 2021-02-25

    - checkpoint commit
  
- 0.69.27 -- 2021-02-25

    - checkpoint commit
  
- 0.69.26 -- 2021-02-23

    - add ZFileHelper::hasProp method
  
- 0.69.25 -- 2021-02-23

    - mark optional route properties as optional in the route document
  
- 0.69.24 -- 2021-02-22

    - add "Open vs close service registration" document, config/dynamic has now moved to config/open
  
- 0.69.23 -- 2021-02-22

    - update recommended app structure, /www/plugins is not part of the recommendation anymore, using universe assets instead
  
- 0.69.22 -- 2021-02-15

    - checkpoint commit
  
- 0.69.21 -- 2021-02-11

    - adding assets 
  
- 0.69.20 -- 2021-02-09

    - add environment sensitive file concept and implementation
  
- 0.69.19 -- 2021-02-04

    - updated light app recommended structure document
  
- 0.69.18 -- 2020-12-08

    - Fix lpi-deps not using natsort

- 0.69.17 -- 2020-12-04

    - Add lpi-deps.byml file

- 0.69.16 -- 2020-12-03

    - add "light init script" concept 
    
- 0.69.15 -- 2020-12-03

    - update service container document 
    
- 0.69.14 -- 2020-12-01

    - add VoidHttpRequest, update light execute notation document 
    
- 0.69.13 -- 2020-11-27

    - update light execute notation document 
    
- 0.69.12 -- 2020-11-26

    - update app recommended structure documentation, add one sentence 
    
- 0.69.11 -- 2020-11-10

    - update app recommended structure documentation 
    
- 0.69.10 -- 2020-10-13

    - fix LightHelper::executeParenthesisWrappersByArray trying to parse null values 
    
- 0.69.9 -- 2020-10-05

    - update light execute notation, now we can access the container directly 
    
- 0.69.8 -- 2020-10-05

    - add LightHelper::executeParenthesisWrappersByArray method 
    
- 0.69.7 -- 2020-09-11

    - add LightBlueServiceContainer.__debugInfo method 
    
- 0.69.6 -- 2020-09-08

    - update HttpRedirectResponse and HttpResponse, internal adjustments
    
- 0.69.5 -- 2020-08-21

    - update nomenclature.md document, update nugget definition, add ajax-nugget definition
    - add ajax-permission-philosophy.md 
    
- 0.69.4 -- 2020-08-21

    - update nomenclature.md document, add nugget definition
    
- 0.69.3 -- 2020-08-21

    - update plugin.md document
    
- 0.69.2 -- 2020-08-21

    - add nomenclature.md document
    
- 0.69.1 -- 2020-08-17

    - update light-service-container.md document
    
- 0.69.0 -- 2020-08-17

    - update LightHelper::executeMethod, add argReplace option
        
- 0.69.0 -- 2020-08-14

    - update LightHelper::executeMethod, removed options
    
- 0.68.0 -- 2020-08-14

    - update LightHelper::executeMethod, add prependArgs option
    
- 0.67.0 -- 2020-08-14

    - add "light execute notation" page
    
- 0.66.4 -- 2020-08-06

    - update "Light application recommended structure" document, com -> dynamic
    
- 0.66.3 -- 2020-08-06

    - update "Light application recommended structure" document
    
- 0.66.2 -- 2020-08-03

    - update late service registration document
    
- 0.66.1 -- 2020-08-03

    - add late service registration document
    
- 0.66.0 -- 2020-07-27

    - add LightNamesAndPathHelper
    
- 0.65.0 -- 2020-07-06

    - checkpoint commit
    
- 0.64.0 -- 2020-06-02

    - removed LightRedirectionException, judged bad design for now
    
- 0.63.2 -- 2020-06-01

    - update events documentation
    
- 0.63.1 -- 2020-04-17

    - fix HttpResponse->addHeader not handling strings correctly
    
- 0.63.0 -- 2020-04-17

    - update HttpResponseInterface
        
- 0.62.1 -- 2020-04-10

    - update LightRedServiceContainer/LightBlueServiceContainer setApplicationDir method now throws an exception if the dir doesn't exist 
    
- 0.62.0 -- 2020-04-10

    - add HttpRequestInterface->getGetValue, getFilesValue, getCookieValue methods 
    
- 0.61.0 -- 2020-04-10

    - add HttpRequestInterface->getPostValue method 
    
- 0.60.0 -- 2020-04-10

    - Light now returns http status 404 when no route matches in debug mode 
    
- 0.59.0 -- 2020-04-06

    - add HttpResponseInterface->setHeader method
    
- 0.58.0 -- 2020-03-10

    - add LightController->hasService method
    
- 0.57.1 -- 2020-02-24

    - add efficiency tips page
    
- 0.57.0 -- 2020-02-13

    - update HttpResponse, add setHeader method
    
- 0.56.0 -- 2020-02-07

    - removed Light.initialize_2 and Light.initialize_3 events data
        
- 0.55.0 -- 2020-01-31

    - update Light.initialize_X events data, removed passing the level with the event (was deemed unnecessary after all)
    
- 0.54.0 -- 2020-01-31

    - update Light.initialize_X events data, now passes the level with the event
    
- 0.53.0 -- 2020-01-20

    - add the license link to the README.md
    
- 0.52.0 -- 2019-12-19

    - update Light, now dispatches Light.end_routine event instead of using the end_routine service
    
- 0.51.0 -- 2019-12-17

    - update Light, replaced initializer system with a new multi-level initialization system
    
- 0.50.0 -- 2019-12-16

    - update Light, replaced initializer system with a new multi-level initialization system
    
- 0.49.0 -- 2019-12-16

    - add LightServiceContainerInterface->getLight method
    
- 0.48.0 -- 2019-12-12

    - update LightException::create, can now pass the light error code directly as an argument
    
- 0.47.0 -- 2019-12-09

    - add security document
    
- 0.46.0 -- 2019-11-19

    - fix Light->run functional typo
    
- 0.45.0 -- 2019-11-19

    - update Light->run, now handles the LightRedirectException directly (i.e. no 3rd party handling)
    - removed LightReverseRouterInterface
    
- 0.44.0 -- 2019-11-11

    - fix Light->run functional typo
    
- 0.43.0 -- 2019-11-11

    - add Light.on_unhandled_exception_caught event
    
- 0.42.0 -- 2019-11-11

    - update Core/Light: new exception handling system
    
- 0.41.0 -- 2019-11-08

    - add LightEvent::createByContainer 
    
- 0.40.1 -- 2019-11-07

    - add events naming convention 
    
- 0.40.0 -- 2019-11-07

    - fix ControllerHelper::executeController throwing exception when the response is a string 
    
- 0.39.0 -- 2019-11-07

    - fix Core/Light not handling no route match exception properly
    
- 0.38.0 -- 2019-11-06

    - add LightEvent->getContainer method
    
- 0.37.0 -- 2019-11-06

    - add LightEvent
    
- 0.36.0 -- 2019-11-06

    - update Core/Light, now dispatches the Light.on_route_found event
    
- 0.35.0 -- 2019-10-28

    - fix Light->run triggering end routine with route=false
    
- 0.34.0 -- 2019-10-28

    - add LightRedirectException
    
- 0.33.0 -- 2019-10-28

    - add LightClassHelper
    
- 0.32.0 -- 2019-10-28

    - add ControllerHelper::executeController
    
- 0.31.0 -- 2019-10-28

    - add Light->getMatchingRoute method
    
- 0.30.0 -- 2019-10-28

    - add ControllerHelper::resolveController and ControllerHelper::getControllerArgs
    
- 0.29.0 -- 2019-10-28

    - add Light->getHttpRequest
    
- 0.28.0 -- 2019-10-24

    - add LightServiceContainerInterface->getApplicationDir method
    
- 0.27.2 -- 2019-10-23

    - update LightReverseRouterInterface->getUrl.useAbsolute now is truly optional
    
- 0.27.1 -- 2019-10-21

    - update route documentation
    
- 0.27.0 -- 2019-10-17

    - add HttpResponse->setFileName method

- 0.26.0 -- 2019-10-17

    - update LightReverseRouterInterface->getUrl now useAbsolute defaults to false
    
- 0.25.1 -- 2019-10-17

    - add precision comment to LightReverseRouterInterface->getUrl
    
- 0.25.0 -- 2019-10-17

    - add HttpResponse->setMimeType method
    
- 0.24.0 -- 2019-10-16

    - update Light->getControllerArgs, now controller can use arguments from the $_GET array
    
- 0.23.1 -- 2019-10-09

    - added Light->isDebug method
    
- 0.23.0 -- 2019-10-01

    - added route.is_ajax property again (new heuristic didn't work as hoped)
    
- 0.22.0 -- 2019-09-30

    - add LightTool::getPluginName

- 0.21.0 -- 2019-09-30

    - removed route.is_ajax property again, found new heuristic to guess without it
    
- 0.20.0 -- 2019-09-24

    - add LightTool
    
- 0.19.0 -- 2019-09-24

    - add route.is_ajax property again
    
- 0.18.0 -- 2019-09-24

    - add Light->initialize debug method
    
- 0.17.0 -- 2019-09-24

    - removed route.is_ajax property, judged too painful for plugin authors

- 0.16.0 -- 2019-09-20

    - update Light, end routine service is now called just before the response is sent (rather than after)
    
- 0.15.0 -- 2019-09-20

    - add LightRouterInterface->getMatchingRoute method
    
- 0.14.0 -- 2019-09-19

    - add route.is_ajax property
    - add Light->run end routine service handling
    
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