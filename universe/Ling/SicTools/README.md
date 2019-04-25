SicTools
========
2019-02-06



Tools for implementing the [sic notation](https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/NotationFan/sic.md) in a php application.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/SicTools
```

Or just download it and place it where you want otherwise.





Summary
=======

- [HotServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/HotServiceResolver.md)
- [ColdServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/ColdServiceResolver.md)
- [SicTool](https://github.com/lingtalfi/SicTools/blob/master/doc/SicTool.md)









History Log
------------------

- 1.4.0 -- 2019-04-25

    - add SicFileCombinerUtil->setEnvironmentVariables method
    
- 1.3.0 -- 2019-04-09

    - update SicFileCombinerUtil class, now uses the concepts of lazy override and variable references
    
- 1.2.1 -- 2019-04-05

    - fix ColdServiceResolver not turning associative arrays into numerical arrays when calling them as constructor/method arguments
    
- 1.2.0 -- 2019-04-05

    - add SicFileCombinerUtil class
    
- 1.1.0 -- 2019-02-07

    - add callable notation interpretation for SicTools\HotServiceResolver and SicTools\ColdServiceResolver

- 1.0.1 -- 2019-02-07

    - fix SicTools\ColdServiceResolver->addServiceCode not resetting stack

- 1.0.0 -- 2019-02-06

    - initial commit