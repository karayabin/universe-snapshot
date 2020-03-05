Chloroform_HeliumLightRenderer
===========
2019-10-21 -> 2020-02-24



An adaptation of the [Chloroform_HeliumRenderer](https://github.com/lingtalfi/Chloroform_HeliumRenderer) for the [light framework](https://github.com/lingtalfi/Light).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
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