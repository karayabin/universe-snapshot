[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiDepsFileHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper.md)


LpiDepsFileHelper::getDependencyListByPlanetDir
================



LpiDepsFileHelper::getDependencyListByPlanetDir — Builds and returns an array of items representing the dependencies in their latest version for the planet which dir is given.




Description
================


private static [LpiDepsFileHelper::getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getDependencyListByPlanetDir.md)(string $planetDir, ?array $options = []) : array




Builds and returns an array of items representing the dependencies in their latest version for the planet which dir is given.
It's mainly used to create the lpi-deps file for the planet if it has not one already.


Each item has the following format:
- $galaxy:$planet:$version

Available options are:
- universeDir: string, the location of the universe directory. This is where the dependencies are searched for.
     By default it's the directory two parents above the given planet directory.




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
See the source code for method [LpiDepsFileHelper::getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiDepsFileHelper.php#L102-L121)


See Also
================

The [LpiDepsFileHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper.md) class.

Previous method: [updateLpiDepsByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/updateLpiDepsByPlanetDir.md)<br>Next method: [createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/createLpiDepsFileByPlanetDir.md)<br>

