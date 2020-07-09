Conventions
===============
2020-07-09




Here are some conventions used by the developer wizard.


- [Basic service class](#basic-service-class)



Basic service class
------------
2020-07-09



The path to the service class is: 

- ${planetDir}/Service/${tightPlanetName}Service.php

With:

- planetDir, the path to the planet directory
- tightPlanetName, the planet name, with underscores removed

The [bsr-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) class naming convention is used.


The generated class has the following:


### properties

- protected container
- protected options

### methods

- public setContainer
- public setOptions







