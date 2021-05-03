Kit_PicassoWidget
===========
2019-04-24 -> 2021-04-15



A type of widget for the [kit](https://github.com/lingtalfi/Kit) system.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Kit_PicassoWidget
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Kit_PicassoWidget
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Kit_PicassoWidget api](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/pages/conception-notes.md)
- [Related](#related)    
- [History Log](#history-log)




                
                

Related
========

- [Kit](https://github.com/lingtalfi/Kit): the widget rendering system 
- [Kit_PrototypeWidget](https://github.com/lingtalfi/Kit_PrototypeWidget): another widget type
- [Light_Kit_BootstrapWidgetLibrary](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary): a widget library for the [Light framework](https://github.com/lingtalfi/Light), using picasso widgets


History Log
=============

- 1.30.8 -- 2021-04-15

    - fix VariableDescriptionFileGeneratorUtil->generate assuming that zone is always array 
  
- 1.30.7 -- 2021-04-09

    - update brain, $vars is now accessible instead of registerWidgetVar 
  
- 1.30.6 -- 2021-04-09

    - add widget brain implementation 
  
- 1.30.5 -- 2021-04-08

    - adapt to Kit:1.14.0
  
- 1.30.4 -- 2021-03-08

    - update PicassoWidgetHandler->handle, now ignore skin if empty
  
- 1.30.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.30.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.30.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.30.0 -- 2019-08-30

    - taking into account the new HtmlPageCopilot interface
    
- 1.29.0 -- 2019-07-24

    - update VariableDescriptionDocWriterUtil now insert the image name before the screenshots
    
- 1.28.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.28.0 -- 2019-07-11

    - add EasyLightPicassoWidget::getKitPageRenderer method

- 1.27.0 -- 2019-07-04

    - add EasyLightPicassoWidget class
    
- 1.26.3 -- 2019-07-04

    - update the concept of dynamic data extraction in the conception notes
    
- 1.26.2 -- 2019-07-03

    - adding the concept of dynamic data extraction in the conception notes again (updated wrong file last time)
    
- 1.26.1 -- 2019-07-03

    - adding the concept of dynamic data extraction in the conception notes
    
- 1.26.0 -- 2019-05-17

    - add the js var to the picasso widget array
    
- 1.25.0 -- 2019-05-17

    - update PicassoWidgetHandler, now can pass the KitPageRendererInterface to widgets so that they can print zones
    
- 1.24.0 -- 2019-05-16

    - update PicassoWidgetHandler, now passes the copilot to the widget instances automatically
    
- 1.23.0 -- 2019-05-13

    - update widget structure, js-init directory becomes js directory
    
- 1.22.0 -- 2019-05-13

    - update VariableDescriptionFileGeneratorUtil now generate more convoluted examples
    
- 1.21.0 -- 2019-05-13

    - update VariableDescriptionDocWriterUtil now add "back to top" links

- 1.20.1 -- 2019-05-13

    - fix VariableDescriptionFileGeneratorUtil setting default value of null for arrays
    
- 1.20.0 -- 2019-05-13

    - update VariableDescriptionDocWriterUtil, now lists the presets

- 1.19.0 -- 2019-05-10

    - update PicassoWidget->prepare method, now can transform the widget configuration array
    
- 1.18.1 -- 2019-05-10

    - fix VariableDescriptionDocWriterUtil no carriage return after long example (typo)
    
- 1.18.0 -- 2019-05-06

    - update VariableDescriptionDocWriterUtil, now example accepts array value
    
- 1.17.0 -- 2019-05-06

    - update VariableDescriptionFileGeneratorUtil, now the default value for string is set with the actual value being used 
    
- 1.16.0 -- 2019-05-03

    - add the PicassoWidget->prepare method 
    
- 1.15.0 -- 2019-05-03

    - update VariableDescriptionDocWriterUtil now lists the skins and templates
    
- 1.14.1 -- 2019-05-03

    - update documentation
    
- 1.14.0 -- 2019-05-03

    - update VariableDescriptionFileGeneratorUtil, now the renderExample method indents the code with four spaces.
    
- 1.13.0 -- 2019-05-03

    - update VariableDescriptionFileGeneratorUtil, now adds a specific description for attr variable.
    
- 1.12.0 -- 2019-05-03

    - add VariableDescriptionFileGeneratorUtil
    
- 1.11.0 -- 2019-05-03

    - update PicassoWidgetHandler: now handles dynamic nuggets
    - update PicassoWidgetHandler: add constructor option $showJsNuggetHeaders
    
- 1.10.0 -- 2019-05-02

    - update PicassoWidgetHandler: add constructor option $showCssNuggetHeaders
    
- 1.9.0 -- 2019-05-02

    - update widget configuration array: attr is now part of the vars
    
- 1.8.0 -- 2019-05-02

    - add the skin concept (and implementation)
    
- 1.7.0 -- 2019-05-02

    - add VariableDescriptionDocWriterUtil
    
- 1.6.0 -- 2019-04-30

    - add WidgetConfAwarePicassoWidgetInterface interface
    - reintroducting the vars property into the widget configuration array
    
- 1.5.0 -- 2019-04-30

    - add the widget base dir concept (and implementation)
    
- 1.4.0 -- 2019-04-30

    - add the widgetDir directive to the widget configuration array
    
- 1.3.0 -- 2019-04-30

    - remove vars property from the widget configuration array
    
- 1.2.0 -- 2019-04-30

    - add attr property to the widget configuration array
    
- 1.1.0 -- 2019-04-29

    - update PicassoWidgetHandler, now handles css code blocks
    
- 1.0.0 -- 2019-04-24

    - initial commit