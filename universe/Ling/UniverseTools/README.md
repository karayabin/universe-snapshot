UniverseTools
===========
2019-02-08 -> 2021-02-12



General tools to work with the universe.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/UniverseTools
```

Or just download it and place it where you want otherwise.





Summary
=======
- [UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Nomenclature](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md) 
- [Conception notes](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md) 







History Log
==============

- 1.22.15 -- 2021-02-12

    - add MachineUniverseTool class and machine universe concept
  
- 1.22.14 -- 2021-02-09

    - fix DependencyTool::getDependencyListRecursiveByUniverseDirPlanets returning doublons
  
- 1.22.13 -- 2021-02-09

    - remove dependency to Ling.LingTalfi planet
  
- 1.22.12 -- 2021-02-09

    - add StandardReadmeUtil class
  
- 1.22.11 -- 2021-02-09

    - add DependencyTool::parsePlanetDependencies method
  
- 1.22.10 -- 2021-02-09

    - update DependencyTool::getDependencyListRecursiveByUniverseDirPlanets, add options argument
  
- 1.22.9 -- 2021-01-26

    - fix MetaInfoTool::getVersionByUrl using incorrect function to get url
  
- 1.22.8 -- 2021-01-26

    - fix MetaInfoTool::getVersionByUrl not treating case when the planet does not exist
  
- 1.22.7 -- 2021-01-26

    - add PlanetTool::exists method
  
- 1.22.6 -- 2021-01-25

    - add PlanetTool::importPlanetByExternalDir and removePlanet method, with optional assets/map
  
- 1.22.5 -- 2021-01-22

    - add PlanetTool::getCompressedPlanetName method
  
- 1.22.4 -- 2021-01-22

    - update DependencyTool::getDependencyList and getDependencyListByFile methods, add dotNames option
  
- 1.22.3 -- 2021-01-21

    - update conception notes
  
- 1.22.2 -- 2021-01-19

    - add PlanetTool::getPlanetDirByPlanetDotName method
  
- 1.22.1 -- 2021-01-19

    - add PlanetTool::getPlanetSlashNameByDotName method

- 1.22.0 -- 2021-01-18

    - remove concept of import procedure/remove procedure
    - updated PlanetTool, removed importPlanetByExternalDir and removePlanet, add installAssetsByPlanetDotName and removeAssetsByPlanetDotName
  
- 1.21.15 -- 2021-01-11

    - update conception notes, add remove procedure
  
- 1.21.14 -- 2021-01-11

    - update conception notes
  
- 1.21.13 -- 2021-01-05

    - update DependencyTool::getDependencyListRecursiveByUniverseDirPlanets, now returns a sorted list

- 1.21.12 -- 2021-01-05

    - add DependencyTool::getDependencyListRecursiveByUniverseDirPlanets method
  
- 1.21.11 -- 2020-12-28

    - add DependencyTool::getDependencyListByFile
  
- 1.21.10 -- 2020-12-17

    - add PlanetTool::getVersionByPlanetDir
  
- 1.21.9 -- 2020-12-14

    - fix MetaInfoTool::getVersion not considering the case where the meta info file doesn't exist
  
- 1.21.8 -- 2020-12-08

    - add PlanetTool::importPlanetByExternalDir and removePlanet methods
  
- 1.21.7 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.21.6 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.21.5 -- 2020-12-04

    - update PlanetTool, add extractPlanetDotName method
  
- 1.21.4 -- 2020-12-03

    - update MetaInfoTool, add getVersion method
    
- 1.21.3 -- 2020-11-17

    - update PlanetTool, add extractPlanetId method
    
- 1.21.2 -- 2020-11-17

    - update nomenclature documentation
    
- 1.21.1 -- 2020-08-10

    - add link to nomenclature documentation
    
- 1.21.0 -- 2020-08-07

    - add PlanetTool::getGalaxyPlanetByClassName method
    
- 1.20.1 -- 2020-07-09

    - fix typo
    
- 1.20.0 -- 2020-07-09

    - add PlanetTool::getTightPlanetName method
    
- 1.19.1 -- 2020-06-05

    - fix DependencyTool::parseDumpDependencies trying to instantiate class with not existing parent
    
- 1.19.0 -- 2019-10-08

    - add DependencyTool::parseDumpDependencies ignoreFilesStartingWith option
    
- 1.18.0 -- 2019-10-08

    - add PlanetTool::getClassNames ignoreFilesStartingWith option

- 1.17.0 -- 2019-09-23

    - add DependencyTool::getUniverseAssetDependencies
    - update DependencyTool::parseDumpDependencies, now takes into account the UniverseAssetDependencies trick

- 1.16.4 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.16.3 -- 2019-04-30

    - fix PlanetTool::getClassNames not taking into account interfaces
    - fix DependencyTool::parseDumpDependencies not taking into account interfaces
    
- 1.16.2 -- 2019-04-29

    - fix PlanetTool::getClassNames typo
    
- 1.16.1 -- 2019-04-29

    - fix DependencyTool::parseDumpDependencies parsing template starting with opening php tag as class
    - fix PlanetTool::getClassNames parsing template starting with opening php tag as class
    
- 1.16.0 -- 2019-04-25

    - add DependencyTool::writeDependencies $postInstall parameter
    
- 1.15.1 -- 2019-04-08

    - fix DependencyTool::parseDumpDependencies taking into account non galaxies
    
- 1.15.0 -- 2019-04-08

    - add GalaxyTool class
    
- 1.14.0 -- 2019-04-05

    - update DependencyTool::getDependencyHomeUrl now uses my lingtalfi repository instead of karayabin universe
    
- 1.13.0 -- 2019-04-05

    - update DependencyTool::writeDependencies now keeps existing post_install directives
    
- 1.12.1 -- 2019-04-03

    - fix DependencyTool::parseDumpDependencies considering Traits as Classes.
    
- 1.12.0 -- 2019-04-03

    - update DependencyTool::parseDumpDependencies, add the conf argument.
    
- 1.11.3 -- 2019-03-14

    - fix documentation missing inserts (forgot galaxy prefix)

- 1.11.2 -- 2019-03-14

    - fix documentation missing inserts

- 1.11.1 -- 2019-03-14

    - fix PlanetTool::getClassNames parsing scripts as classes

- 1.11.0 -- 2019-03-13

    - add MetaInfoTool::writeInfo method
    - add DependencyTool::writeDependencies method

- 1.10.1 -- 2019-03-07

    - fix DependencyTool::parseDumpDependencies returning the current planet as a dependency

- 1.10.0 -- 2019-03-07

    - update DependencyTool::parseDumpDependencies, now returns the dependency.byml content as a string
    - fix PlanetTool::getClassNames to read bsr-1 classes

- 1.9.0 -- 2019-03-06

    - update tools to be compliant with new bsr-1 system

- 1.8.0 -- 2019-03-05

    - fix DependencyTool::parseDumpDependencies parsing scripts when it should not
    
- 1.7.0 -- 2019-02-27

    - add PlanetTool::getPlanetDirs method
    
- 1.6.0 -- 2019-02-27

    - undo last commit
    - add DependencyTool::getDependencyItem method
    
- 1.5.0 -- 2019-02-27

    - update DependencyTool::getDependencyList, the returned array now contains the post_install directives
    
- 1.4.0 -- 2019-02-26

    - fix DependencyTool class to be compliant with the [new universe dependency system](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md)
    
- 1.3.0 -- 2019-02-26

    - add UniverseTools\MetaInfoTool class
    
- 1.2.0 -- 2019-02-12

    - add UniverseTools\PlanetTool class

- 1.1.0 -- 2019-02-12

    - add UniverseTools\DependencyTool::parseDumpDependencies method

- 1.0.0 -- 2019-02-08

    - initial commit
    
    
    
    