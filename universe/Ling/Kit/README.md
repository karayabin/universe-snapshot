Kit
===========
2019-04-24 -> 2021-04-09



A system to render widgets in an html page.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Kit
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Kit
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Kit api](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Kit/blob/master/doc/pages/conception-notes.md)
- [Related](#related)
- [History Log](#history-log)



Related
========

- [Kit_PicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget): a widget type 
- [Kit_PrototypeWidget](https://github.com/lingtalfi/Kit_PrototypeWidget): a widget type 





History Log
=============

- 1.14.1 -- 2021-04-09

    - add vars property in the kit page array
  
- 1.14.0 -- 2021-04-08

    - update WidgetHandlerInterface->process, now has a debugArray argument
  
- 1.13.0 -- 2021-04-08

    - update nomenclature, zone can now be thought as position
    - renamed bodyClass property to body_class
    - renamed WidgetHandlerInterface->handle to render, add concept of widget process
  
- 1.12.6 -- 2021-03-08

    - update KitPageRenderer->printPage, now doesn't add bodyClass if empty
  
- 1.12.5 -- 2021-03-05

    - update README.md, add install alternative

- 1.12.4 -- 2021-03-02

    - update ConfStorageInterface->getPageConf signature with php8 notation
  
- 1.12.3 -- 2020-12-08

    - Fix lpi-deps not using natsort

- 1.12.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.12.1 -- 2020-08-10

    - fix KitPageRenderer->printPage not throwing exception if the layout is not a file 
    
- 1.12.0 -- 2019-11-25

    - update BabyYamlConfStorage->getPageConf, now accepts variables for _parent path 
    
- 1.11.1 -- 2019-08-30

    - move KitPageRenderer->getNewHtmlPageCopilot to getHtmlPageCopilot 
    
- 1.11.0 -- 2019-08-30

    - add KitPageRenderer->getNewHtmlPageCopilot method
    
- 1.10.0 -- 2019-07-29

    - add BabyYamlConfStorage->getPageConf parent trick for devs
    
- 1.9.0 -- 2019-07-25

    - update KitPageRenderer, now understands the bodyClass page configuration property
    
- 1.8.0 -- 2019-07-18

    - update BabyYamlConfStorage, can now handle multiple plugins writing to the same page configuration file
    
- 1.7.4 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.7.3 -- 2019-07-11

    - add KitPageRendererInterface::countWidgets method  
    
- 1.7.2 -- 2019-05-17

    - fix KitPageRenderer not handling printZone robustly  
    
- 1.7.1 -- 2019-05-17

    - fix KitPageRendererAwareInterface not using KitPageRendererInterface  
    
- 1.7.0 -- 2019-05-17

    - add KitPageRendererInterface  
    
- 1.6.0 -- 2019-05-17

    - add KitPageRendererAwareInterface  
    
- 1.5.1 -- 2019-05-15

    - update documentation for widget conf decorators  
    
- 1.5.0 -- 2019-04-30

    - add the idea (with commented implementation) for widget conf decorators  
    
- 1.4.0 -- 2019-04-26

    - add title and description to the kit configuration array 
    
- 1.3.0 -- 2019-04-25

    - add ConfStorageInterface
    
- 1.2.0 -- 2019-04-24

    - fix KitPageRenderer->printPage calling top and bottom parts BEFORE the widgets configuring the Copilot
    
- 1.1.0 -- 2019-04-24

    - add debug array to WidgetHandlerInterface->handle
    - fix typo in KitPageRenderer
    
- 1.0.0 -- 2019-04-24

    - initial commit