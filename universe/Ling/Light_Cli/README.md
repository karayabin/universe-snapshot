Light_Cli
===========
2021-01-07 -> 2021-02-12


A command line interface for the light framework.



This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.

```bash
uni import Ling/Light_Cli
```

Or just download it and place it where you want otherwise.






Summary
===========

- [Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md) (generated
  with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Cli/blob/master/doc/pages/conception-notes.md)

Images
=========

![light cli list command example](https://lingtalfi.com/img/universe/Light_Cli/light-cli-list.png)




Services
=========


Here is an example of the service configuration:

```yaml
cli:
    instance: Ling\Light_Cli\Service\LightCliService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options: [ ]







```

History Log
=============

- 1.0.10 -- 2021-02-12

    - add create_app command, and light-cli binary

- 1.0.9 -- 2021-02-12

    - fix web-installer functional typo

- 1.0.8 -- 2021-02-12

    - add web-installer 
  
- 1.0.7 -- 2021-02-11

    - update light-cli.php script, the path to the light init file 
  
- 1.0.6 -- 2021-02-04

    - add LightCliApplication->getCurrentDirectory method 
  
- 1.0.5 -- 2021-02-02

    - update LightCliApplication, now transmits errorIsVerbose property to proxy apps 
  
- 1.0.4 -- 2021-01-26

    - fix LightCliCommandDocUtility::printListByApp triggering error if index for alias is given 

- 1.0.3 -- 2021-01-25

    - fix LightCliApplication::onCommandNotFound, functional typo with alias creating infinite loop
  
- 1.0.2 -- 2021-01-15

    - add LightCliCommandDocHelper class
  
- 1.0.1 -- 2021-01-14

    - fix conception notes formatting
  
- 1.0.0 -- 2021-01-07

    - initial commit