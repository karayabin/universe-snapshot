Light_Kit_Editor
===========
2021-03-08 -> 2021-08-03



A tool to help users edit their [kit pages](https://github.com/lingtalfi/Kit) using a gui.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Kit_Editor
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Editor
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
kit_editor:
    instance: Ling\Light_Kit_Editor\Service\LightKitEditorService
    methods:
        setContainer:
            container: @container()
        setDefaultWebsiteIdentifier:
            identifier: default




```



History Log
=============

- 0.3.0 -- 2021-08-03

    - update babyYaml storage, now add _babyYamlPage info 
    - add LightKitEditorPageRenderer class
    - simplified theme concepts
    - update easy route namespace (add galaxy prefix)
  
- 0.2.10 -- 2021-06-25

    - updated routes, add galaxy prefix

- 0.2.9 -- 2021-06-22

    - fix service->renderPage not taking advantage of LightKitEditorHelper::getBasicPageRenderer
  
- 0.2.8 -- 2021-06-19

    - fix LightKitEditorHelper::getBasicPageRenderer not using the kit configured service as the instance base
  
- 0.2.7 -- 2021-06-18

    - add LightKitEditorHelper class
  
- 0.2.6 -- 2021-06-18

    - add default website_identifier concept
    - add own page renderer
  
- 0.2.5 -- 2021-06-03

    - adapt api to work with Light_PlanetInstaller:2.0.4
  
- 0.2.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 0.2.3 -- 2021-05-31

    - update api to work with Light_PlanetInstaller 2.0.0
  
- 0.2.2 -- 2021-05-11

    - Update deps (by CommitWizard).

- 0.2.1 -- 2021-05-11

    - Update dependencies to Ling.Light_EasyRoute (pushed by SubscribersUtil)

- 0.2.0 -- 2021-04-09

    - add main controller to render any page, add multi storage api class
  
- 0.1.2 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 0.1.1 -- 2021-03-09

    - update planet to adapt Ling.Light_Kit_Admin:0.12.25
  
- 0.1.0 -- 2021-03-08

    - initial commit