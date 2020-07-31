TokenFun
=================
2016-01-02 -> 2020-07-28




Tools for playing with php tokens.



TokenFun is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
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
    
    



