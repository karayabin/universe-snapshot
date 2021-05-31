[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The TimConflictsReader class
================
2020-12-08 --> 2021-05-31






Introduction
============

The TimConflictsReader class.

This class helps read conflicts that might occur during the creation of a theoretical import map.
See the [Light_PlanetInstaller conception notes](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md) for more info.



Class synopsis
==============


class <span class="pl-k">TimConflictsReader</span>  {

- Properties
    - private array [$conflicts](#property-conflicts) ;
    - private string [$conflictsPath](#property-conflictsPath) ;

- Methods
    - public [init](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/TimConflictsReader/init.md)(string $conflictsPath) : void
    - public [getStats](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/TimConflictsReader/getStats.md)() : array
    - public [countConflicts](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/TimConflictsReader/countConflicts.md)() : int
    - public [getConflictsPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/TimConflictsReader/getConflictsPath.md)() : string
    - public [getConflicts](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/TimConflictsReader/getConflicts.md)() : array

}




Properties
=============

- <span id="property-conflicts"><b>conflicts</b></span>

    This property holds the conflicts for this instance.
    
    

- <span id="property-conflictsPath"><b>conflictsPath</b></span>

    This property holds the conflictsPath for this instance.
    
    



Methods
==============

- [TimConflictsReader::init](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/TimConflictsReader/init.md) &ndash; Sets the conflictsPath.
- [TimConflictsReader::getStats](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/TimConflictsReader/getStats.md) &ndash; Returns an array of planetDotName => number of conflicts it is involved in.
- [TimConflictsReader::countConflicts](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/TimConflictsReader/countConflicts.md) &ndash; Returns the number of conflicts found.
- [TimConflictsReader::getConflictsPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/TimConflictsReader/getConflictsPath.md) &ndash; Returns the conflictsPath of this instance.
- [TimConflictsReader::getConflicts](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/TimConflictsReader/getConflicts.md) &ndash; Returns the conflicts of this instance.





Location
=============
Ling\Light_PlanetInstaller\Util\TimConflictsReader<br>
See the source code of [Ling\Light_PlanetInstaller\Util\TimConflictsReader](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/TimConflictsReader.php)



SeeAlso
==============
Previous class: [InstallInitUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/InstallInitUtil.md)<br>Next class: [UninstallUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UninstallUtil.md)<br>
