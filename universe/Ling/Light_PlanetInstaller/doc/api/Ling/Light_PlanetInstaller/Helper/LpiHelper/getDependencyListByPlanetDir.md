[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper.md)


LpiHelper::getDependencyListByPlanetDir
================



LpiHelper::getDependencyListByPlanetDir — Builds and returns an array of items representing the dependencies in their latest version for the planet which dir is given.




Description
================


public static [LpiHelper::getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getDependencyListByPlanetDir.md)(string $planetDir, ?array $options = []) : array




Builds and returns an array of items representing the dependencies in their latest version for the planet which dir is given.
It's mainly used to create the lpi-deps file for the planet if it has not one already.


Each item has the following format:
- $galaxy:$planet:$version

Available options are:
- universeDir: string, the location of the universe directory. This is where the dependencies are searched for.
     By default it's the directory two parents above the given planet directory.
- versionPlus: bool=true, whether to add the plus symbol at the end of the version number for each item.




Parameters
================


- planetDir

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LpiHelper::getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiHelper.php#L86-L107)


See Also
================

The [LpiHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper.md) class.

Previous method: [createGlobalDirByUniverseDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/createGlobalDirByUniverseDir.md)<br>Next method: [getLatestLpiDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getLatestLpiDependenciesByPlanetDir.md)<br>

