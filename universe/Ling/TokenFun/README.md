TokenFun
=================
2016-01-02 -> 2021-08-16




Tools for playing with php tokens.



TokenFun is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.TokenFun
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/TokenFun
```

Or just download it and place it where you want otherwise.




Summary
===========
- [TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/TokenFun/blob/master/doc/pages/conception-notes.md)









Dependencies
------------------

- [lingtalfi/Bat 1.256](https://github.com/lingtalfi/Bat)
- [lingtalfi/DirScanner 1.0.0](https://github.com/lingtalfi/DirScanner)




History Log
------------------

- 1.11.12 -- 2021-08-16

    - fix MethodTokenFinder not detecting return hint of type array 
  
- 1.11.11 -- 2021-06-04

    - fix ClassPropertyTokenFinder not recognizing ? and | chars
  
- 1.11.10 -- 2021-06-04

    - fix ClassPropertyTokenFinder not recognizing property type
  
- 1.11.9 -- 2021-06-03

    - fix TokenArrayIteratorTool::moveToCorrespondingEnd capturing false sometimes

- 1.11.8 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.11.7 -- 2021-03-08

    - add UseStatementsParser and bnb tests, update TokenFinderTool::getUseDependencies
  
- 1.11.6 -- 2021-03-05

    - update README.md, add install alternative

- 1.11.5 -- 2021-02-02

    - update TokenArrayIteratorTool::skipNsChain to work with php8

- 1.11.4 -- 2020-12-08

    - Fix lpi-deps not using natsort

- 1.11.3 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.11.2 -- 2020-07-28

    - update TokenFinderTool::getClassSignatureInfo docBlock comment
    
- 1.11.1 -- 2020-07-28

    - update finder class doc, removed author tag
    
- 1.11.0 -- 2020-07-28

    - add ClassSignatureTokenFinder class, add docTool doc
    
- 1.10.0 -- 2020-07-23

    - update TokenFinderTool::getMethodsInfo, the key of each item is now the name of the method 
    
- 1.9.0 -- 2020-07-23

    - add TokenFinderTool::removePhpComments method
    
- 1.8.1 -- 2020-07-23

    - update TokenFinderTool::getMethodsInfo, now returns static information; fix wrong commentEndLine if the method has no comment
    
- 1.8.0 -- 2020-07-23

    - update TokenFinderTool::getMethodsInfo, now returns line numbers for method and comments, and fix method working only for the first method
    
- 1.7.1 -- 2020-07-21

    - fix MethodTokenFinder not taking into account return type hint
    
- 1.7.0 -- 2020-07-10

    - update TokenFinderTool::getClassPropertyBasicInfo, now returns the commentStartLine and commentEndLine info
    
- 1.6.0 -- 2020-07-10

    - update TokenFinderTool::getClassPropertyBasicInfo, now returns the variable names as keys
    
- 1.5.0 -- 2020-07-10

    - add TokenFinderTool::getClassPropertyBasicInfo method
    
- 1.4.0 -- 2020-07-10

    - add ClassPropertyTokenFinder
    
- 1.3.0 -- 2019-04-30

    - add includeInterfaces option to TokenFinderTool::getClassNames method
    
- 1.2.0 -- 2019-04-04

    - add TokenFinderTool::getUseDependenciesByReflectionClasses method
    
- 1.1.0 -- 2017-03-23

    - add TokenFinderTool::getInterfaces and TokenFinderTool::getParentClassName methods
    
- 1.0.0 -- 2016-01-02

    - initial commit
    
    



