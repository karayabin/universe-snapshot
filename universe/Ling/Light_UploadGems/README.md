Light_UploadGems
===========
2020-04-13 -> 2021-03-15



A php mini library to help with file upload handling.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_UploadGems
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_UploadGems
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
upload_gems:
    instance: Ling\Light_UploadGems\Service\LightUploadGemsService
    methods:
        setContainer:
            container: @container()


```



History Log
=============

- 1.8.10 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.8.9 -- 2021-03-05

    - update README.md, add install alternative

- 1.8.8 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.8.7 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.8.6 -- 2020-11-06

    - update api to work with Bat 1.279
    
- 1.8.5 -- 2020-10-23

    - update api using Light_Nugget system to fetch config
    
- 1.8.4 -- 2020-10-20

    - add GemHelperTool class
    
- 1.8.3 -- 2020-10-20

    - remove GemHelperInterface

- 1.8.2 -- 2020-10-19

    - update GemHelper->transformImage, is now public instead of private
    
- 1.8.1 -- 2020-10-01

    - update conception notes, grammar fixes
    
- 1.8.0 -- 2020-05-26

    - add GemHelperInterface->applyCopies onCopyAfter option
    
- 1.7.1 -- 2020-05-25

    - fix GemHelper->applyCopies re-using the previous copy's base dir instead of the source file's base dir
    
- 1.7.0 -- 2020-05-15

    - add GemHelperInterface->applyCopies options parameter
    
- 1.6.0 -- 2020-05-14

    - add GemHelperInterface->applyChunkValidation method
    
- 1.5.0 -- 2020-04-17

    - add GemHelperInterface->getCustomConfigValue method
    
- 1.4.0 -- 2020-04-17

    - add name_validation section, and revisit some parts of the code, removed setFilename and apply methods
    
- 1.3.0 -- 2020-04-14

    - add apply and getConfig methods, and fix container not set
    
- 1.2.0 -- 2020-04-13

    - add GemHelper->setTags method
    
- 1.1.0 -- 2020-04-13

    - add LightUploadGemsService->checkFilename method
    
- 1.0.0 -- 2020-04-13

    - initial commit