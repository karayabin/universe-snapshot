[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The PlanetInfo class
================
2019-02-21 --> 2019-09-05






Introduction
============

The PlanetInfo class.
Contains information at the planet level, including the classes it contains, and the dependencies it uses.



Class synopsis
==============


class <span class="pl-k">PlanetInfo</span> implements [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/InfoInterface.md) {

- Properties
    - protected array [$dependencies](#property-dependencies) ;
    - protected [Ling\DocTools\Info\ClassInfo[]](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) [$classes](#property-classes) ;
    - protected null [$name](#property-name) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/__construct.md)() : void
    - public [getDependencies](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/getDependencies.md)() : array
    - public [setDependencies](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/setDependencies.md)(array $dependencies) : [PlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo.md)
    - public [getClasses](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/getClasses.md)() : [ClassInfo[]](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md)
    - public [addClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/addClass.md)([Ling\DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) $class) : [PlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo.md)
    - public [getClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/getClass.md)(?$className) : [ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) | null
    - public [getName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/getName.md)() : string
    - public [setName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/setName.md)(?$name) : [PlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo.md)

}




Properties
=============

- <span id="property-dependencies"><b>dependencies</b></span>

    This property holds the dependencies for this instance.
    It's an array of strings.
    
    See more about dependencies in the [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/DependencyTool.md#getdependencylist) documentation.
    
    

- <span id="property-classes"><b>classes</b></span>

    This property holds an array of [ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) instances.
    
    

- <span id="property-name"><b>name</b></span>

    This property holds the name of the planet.
    
    



Methods
==============

- [PlanetInfo::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/__construct.md) &ndash; Builds the PlanetInfo instance.
- [PlanetInfo::getDependencies](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/getDependencies.md) &ndash; Returns the array of dependencies to other planets.
- [PlanetInfo::setDependencies](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/setDependencies.md) &ndash; Sets the dependencies for this instance.
- [PlanetInfo::getClasses](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/getClasses.md) &ndash; Returns the array of [ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) instances found in this planet.
- [PlanetInfo::addClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/addClass.md) &ndash; Adds a class to this instance.
- [PlanetInfo::getClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/getClass.md) &ndash; or null otherwise.
- [PlanetInfo::getName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/getName.md) &ndash; Returns the name of the planet.
- [PlanetInfo::setName](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo/setName.md) &ndash; Sets the name of this planet.





Location
=============
Ling\DocTools\Info\PlanetInfo<br>
See the source code of [Ling\DocTools\Info\PlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/Info/PlanetInfo.php)



SeeAlso
==============
Previous class: [ParameterInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ParameterInfo.md)<br>Next class: [PropertyInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PropertyInfo.md)<br>
