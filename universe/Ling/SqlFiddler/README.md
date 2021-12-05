SqlFiddler
===========
2021-07-06 -> 2021-07-27



A tool to help when writing sql queries where the user can opt-in some parts.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.SqlFiddler
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/SqlFiddler
```

Or just download it and place it where you want otherwise.






Summary
===========
- [SqlFiddler api](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/pages/conception-notes.md)






History Log
=============

- 1.0.11 -- 2021-07-11

    - update conception notes, add "list super useful info" concept 
  
- 1.0.10 -- 2021-07-11

    - fix SqlFiddlerUtil->fetchAllCountInfo incorrect offset in some cases 
  
- 1.0.9 -- 2021-07-09

    - rename SqlFiddlerUtil->getOrderBy method to getOrderByInfo 
  
- 1.0.8 -- 2021-07-09

    - update conception notes, add some info separation for clarity
  
- 1.0.7 -- 2021-07-09

    - add SqlFiddlerUtil-fetchAllCountInfo method
    - fix SqlFiddlerUtil->getPageOffset returning an absurd number
  
- 1.0.6 -- 2021-07-08

    - fix SqlFiddlerUtil->fetchAllCount method not implemented useWrap feature
  
- 1.0.5 -- 2021-07-08

    - add SqlFiddlerUtil->fetchAllCount method
  
- 1.0.4 -- 2021-07-06

    - update SqlFiddlerUtil->setSearchExpression, now accepts search modes
  
- 1.0.3 -- 2021-07-06

    - update conception notes, fix example typo
  
- 1.0.2 -- 2021-07-06

    - update conception notes, update example
  
- 1.0.1 -- 2021-07-06

    - update conception notes, add precision
  
- 1.0.0 -- 2021-07-06

    - initial commit