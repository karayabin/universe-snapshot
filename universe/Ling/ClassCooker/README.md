ClassCooker
===========
2017-04-11 -> 2020-08-18


A tool to cook your class: add/remove methods, properties, stuff like that.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/ClassCooker
```

Or just download it and place it where you want otherwise.





Summary
===========
- [ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [About ClassCooker](#about-classcooker)
- [FryingPan conception notes](https://github.com/lingtalfi/ClassCooker/blob/master/doc/pages/frying-pan-conception-notes.md)





About ClassCooker
-----------
2020-07-23



ClassCooker methods are based on tokens rather than php built-in reflection.

Why? Because reflection doesn't handle dynamic file changes, whereas token based methods don't have this problem.

As a result, we can add/remove methods, properties, etc... multiple times during the same script execution.









History Log
------------------

- 1.16.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.16.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.16.0 -- 2020-08-18

    - update MethodIngredient->execute, now accepts the addAsComment option
    
- 1.15.0 -- 2020-08-18

    - update FryingPan, add getFile method
    
- 1.14.0 -- 2020-08-18

    - update ClassCooker->addMethod, add checkDuplicate option
    
- 1.13.0 -- 2020-07-30

    - update ParentIngredient, now also add parent::__construct if necessary
    
- 1.12.0 -- 2020-07-28

    - add ClassCooker->updateClassSignature and addParentClass methods
    
- 1.11.0 -- 2020-07-24

    - add FryingPan class
    
- 1.10.0 -- 2020-07-23

    - update ClassCooker methods to work with tokens instead of reflection
    
- 1.9.0 -- 2020-07-21

    - add ClassCooker->addContent method
    
- 1.8.2 -- 2020-07-17

    - fake test commit to test uni2 (2)
    
- 1.8.1 -- 2020-07-17

    - fake test commit to test uni2
    
- 1.8.0 -- 2020-07-10

    - add ClassCooker->updatePropertyComment methods and some other methods
    
- 1.7.0 -- 2018-03-25

    - add ClassCookerHelper::createSectionComment method
    
- 1.6.0 -- 2018-03-25

    - add ClassCookerHelper::getMethodsBoundaries method
    
- 1.5.0 -- 2018-03-25

    - add ClassCookerHelper class
    
- 1.4.1 -- 2017-04-23

    - fix getMethods returning commented methods
    
- 1.4.0 -- 2017-04-11

    - add getMethodSignature method
    
- 1.3.0 -- 2017-04-11

    - fix addMethod handles the case of an empty class
    
- 1.2.0 -- 2017-04-11

    - fix ignore commented methods
    
- 1.1.0 -- 2017-04-11

    - add includeWrap argument to getMethodContent
    
- 1.0.0 -- 2017-04-11

    - initial commit