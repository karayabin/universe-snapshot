BeeFramework
========
2017-05-22 -> 2021-06-15


A php framework.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.BeeFramework
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/BeeFramework
```

Or just download it and place it where you want otherwise.




HowTo
===========
Sorry, there is no howto, it's an old framework, and still use some of its tools sometimes, 
but there is no official doc for now.
 
 
 
History Log
------------------

- 1.0.9 -- 2021-06-15

    - add MachineTool::getProgramPath method
  
- 1.0.8 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.7 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.6 -- 2021-02-02

    - fix ReflectionParameterUtil->getParameterAsString triggering deprecation notice in php8
  
- 1.0.5 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.4 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.3 -- 2019-07-04

    - fix ArrayExportUtil::getSymbolsManager not working with new universe organization
    
- 1.0.2 -- 2019-07-04

    - fix shortcode not allowing optional keys
    
- 1.0.1 -- 2017-05-22

    - add documentation to the ShortCodeTool
    
- 1.0.0 -- 2017-05-22

    - initial commit 