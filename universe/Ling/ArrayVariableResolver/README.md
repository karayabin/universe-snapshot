ArrayVariableResolver
===========
2019-05-15 -> 2021-03-05



A tool to inject variables in an array.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.ArrayVariableResolver
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/ArrayVariableResolver
```

Or just download it and place it where you want otherwise.






Summary
===========
- [ArrayVariableResolver api](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))






History Log
=============

- 1.2.5 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.2.4 -- 2021-03-05

    - update README.md, add install alternative

- 1.2.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.1 -- 2019-10-31

    - fix ArrayVariableResolverUtil->resolve not resolving multiple variables in the same expression 
    
- 1.2.0 -- 2019-09-18

    - update ArrayVariableResolverUtil->resolve now accepts bdot notation 
    
- 1.1.2 -- 2019-07-23

    - fix ArrayVariableResolverUtil->resolve not accepting null values as inline replacement 
    
- 1.1.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.1.0 -- 2019-05-15

    - fix ArrayVariableResolverUtil accepting only one char length symbols
    
- 1.0.1 -- 2019-05-15

    - add documentation examples
    
- 1.0.0 -- 2019-05-15

    - initial commit