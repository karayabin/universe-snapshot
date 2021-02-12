[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LightPlanetInstallerHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LightPlanetInstallerHelper.md)


LightPlanetInstallerHelper::getDependencyListByPlanetDir
================



LightPlanetInstallerHelper::getDependencyListByPlanetDir — Returns an array of items representing the dependencies of the planet which dir is given.




Description
================


public static [LightPlanetInstallerHelper::getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LightPlanetInstallerHelper/getDependencyListByPlanetDir.md)(string $planetDir, ?array $options = []) : array




Returns an array of items representing the dependencies of the planet which dir is given.
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
See the source code for method [LightPlanetInstallerHelper::getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LightPlanetInstallerHelper.php#L34-L53)


See Also
================

The [LightPlanetInstallerHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LightPlanetInstallerHelper.md) class.

Next method: [updateLpiDepsByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LightPlanetInstallerHelper/updateLpiDepsByPlanetDir.md)<br>

