[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Repository\LpiLocalUniverseRepository class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository.md)


LpiLocalUniverseRepository::copy
================



LpiLocalUniverseRepository::copy — Make a copy of the given planet so that the copy's path is $dstDir.




Description
================


public [LpiLocalUniverseRepository::copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/copy.md)(string $planetDot, string $realVersion, string $dstDir, ?array &$warnings = []) : void




Make a copy of the given planet so that the copy's path is $dstDir.

If the given planet doesn't exist, or something unexpected occurs, an exception will be thrown.

The warnings array is filled when the method wants to warn the user of something.
It's an array of strings.




Parameters
================


- planetDot

    

- realVersion

    

- dstDir

    

- warnings

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LpiLocalUniverseRepository::copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Repository/LpiLocalUniverseRepository.php#L64-L79)


See Also
================

The [LpiLocalUniverseRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository.md) class.

Previous method: [getFirstVersionWithMinimumNumber](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/getFirstVersionWithMinimumNumber.md)<br>Next method: [getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/getDependencies.md)<br>

