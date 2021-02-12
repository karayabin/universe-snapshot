[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Repository\LpiApplicationRepository class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository.md)


LpiApplicationRepository::copy
================



LpiApplicationRepository::copy — Make a copy of the given planet so that the copy's path is $dstDir.




Description
================


public [LpiApplicationRepository::copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/copy.md)(string $planetDot, string $realVersion, string $dstDir, ?array &$warnings = []) : void




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
See the source code for method [LpiApplicationRepository::copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Repository/LpiApplicationRepository.php#L88-L91)


See Also
================

The [LpiApplicationRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository.md) class.

Previous method: [getFirstVersionWithMinimumNumber](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/getFirstVersionWithMinimumNumber.md)<br>Next method: [getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/getDependencies.md)<br>

