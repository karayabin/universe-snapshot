UniverseTools
===========
2019-02-08 -> 2020-07-09



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







History Log
==============

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
    
    
    
    