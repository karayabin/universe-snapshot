[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Repository\LpiRepositoryInterface class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md)


LpiRepositoryInterface::copy
================



LpiRepositoryInterface::copy — Make a copy of the given planet so that the copy's path is $dstDir.




Description
================


abstract public [LpiRepositoryInterface::copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/copy.md)(string $planetDot, string $realVersion, string $dstDir, ?array &$warnings = []) : void




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
See the source code for method [LpiRepositoryInterface::copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Repository/LpiRepositoryInterface.php#L50-L50)


See Also
================

The [LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md) class.

Previous method: [getFirstVersionWithMinimumNumber](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/getFirstVersionWithMinimumNumber.md)<br>Next method: [getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/getDependencies.md)<br>

