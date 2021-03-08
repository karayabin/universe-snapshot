Chloroform_HeliumLightRenderer
===========
2019-10-21 -> 2021-03-05



An adaptation of the [Chloroform_HeliumRenderer](https://github.com/lingtalfi/Chloroform_HeliumRenderer) for the [light framework](https://github.com/lingtalfi/Light).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



Chloroform_HeliumLightRenderer is compliant with the [clever form initiative](https://github.com/lingtalfi/TheBar/blob/master/discussions/clever-form-initiative.md).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Chloroform_HeliumLightRenderer
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Chloroform_HeliumLightRenderer
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Chloroform_HeliumLightRenderer api](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Chloroform helium light renderer example](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/pages/chloroform-helium-light-renderer-example.md)
- [Related](#related)









Related
=========

- [Chloroform](https://github.com/lingtalfi/Chloroform), the library to create the form structure
- [Chloroform Hydrogen renderer](https://github.com/lingtalfi/Chloroform_HydrogenRenderer), another renderer for chloroform
- [Chloroform HeliumRenderer](https://github.com/lingtalfi/Chloroform_HeliumRenderer/)



History Log
=============

- 1.6.8 -- 2021-03-05

    - update README.md, add install alternative

- 1.6.7 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.6.6 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.6.5 -- 2020-11-20

    - fix HeliumLightRenderer rendering multiplier widget in update mode
    
- 1.6.4 -- 2020-11-20

    - update HeliumLightRenderer to render newest TableListField api, fix js TableHelper inconsistencies with multiplier
    
- 1.6.3 -- 2020-11-09

    - update HeliumLightRenderer not rendering TableList properly
    - now handle LightCsrfSessionField
    - update HeliumLightRenderer->printField with AjaxFileBoxField, now handle gormanCallbackKeys property completely
    
- 1.6.2 -- 2020-09-25

    - update api, is now compliant with new TableList features
    
- 1.6.1 -- 2020-09-22

    - update api, is now compliant with clever form initiative 
    
- 1.6.0 -- 2020-06-04

    - update HeliumLightRenderer->printAjaxFileBoxField_FileUploader to work with jFileUploader v3 
    
- 1.5.0 -- 2020-02-24

    - add HeliumLightRenderer->printAjaxFileBoxField_FileUploader handler to handle jFileUploader script 
    
- 1.4.1 -- 2020-01-10

    - fix HeliumLightRenderer->printAjaxFileBoxFieldWithAjaxFileUploadManager not showing error messages because of the bootstrap class d-none 
    
- 1.4.0 -- 2019-12-06

    - update HeliumLightRenderer->printTableListField to accommodate latest version of form multiplier trick
    
- 1.3.0 -- 2019-11-27

    - use of csrf_session service replaces csrf_simple
    
- 1.2.1 -- 2019-11-25

    - fix HeliumLightRenderer->printAjaxFileBoxField having dependencies to Light_Kit_Admin web assets
    
- 1.2.0 -- 2019-11-19

    - update HeliumLightRenderer->printTableListField to handle new TableListField conception
    
- 1.1.0 -- 2019-11-18

    - add HeliumLightRenderer->printTableListField
    
- 1.0.2 -- 2019-10-24

    - add link in README.md
    
- 1.0.1 -- 2019-10-21

    - add related section in README.md
    
- 1.0.0 -- 2019-10-21

    - initial commit