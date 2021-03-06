QueryFilterBox
===========
2017-10-03 -> 2021-03-05



An other tool for handling list based on a sql query.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.QueryFilterBox
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/QueryFilterBox
```

Or just download it and place it where you want otherwise.




Theory and brainstorm
=======================

See my theory-and-brainstorm.md document to start with (in the **doc** directory of this repository).
This is an alternative/complement/extension to the [ListParams planet](https://github.com/lingtalfi/ListParams).







Related
=============

- [ListParams](https://github.com/lingtalfi/ListParams)
- [ListModifier](https://github.com/lingtalfi/ListModifier)



History Log
------------------

- 1.6.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.6.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.6.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.6.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.6.0 -- 2017-10-24

    - add ItemsGenerator.getFilterBoxes method
    
- 1.5.0 -- 2017-10-24

    - update SortQueryFilterBox sorts system, now accept an array as real value
    
- 1.4.0 -- 2017-10-23

    - add ItemsGenerator.unsetFilterBox method
    
- 1.3.0 -- 2017-10-23

    - add Query.saveState and Query.restoreState methods
    
- 1.2.0 -- 2017-10-19

    - add ItemsGeneratorHelper::getBundleByItemsAndGenerator sortFrame option
    
- 1.1.0 -- 2017-10-16

    - add Query signal system
    
- 1.0.1 -- 2017-10-16

    - add QueryFilterBox::create method
    
- 1.0.0 -- 2017-10-03

    - initial commit