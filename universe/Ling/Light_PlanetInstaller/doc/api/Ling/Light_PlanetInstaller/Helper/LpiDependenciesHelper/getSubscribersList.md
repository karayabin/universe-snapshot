[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiDependenciesHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper.md)


LpiDependenciesHelper::getSubscribersList
================



LpiDependenciesHelper::getSubscribersList — Returns an array listing the planets that depend on the given planet, along with the version numbers.




Description
================


public [LpiDependenciesHelper::getSubscribersList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getSubscribersList.md)(string $planetDotName, string $uniDir, ?array &$noLpiFiles = [], ?array $options = []) : array




Returns an array listing the planets that depend on the given planet, along with the version numbers.

It's an array of planetDotName => versionInfo.

With:
- planetDotName: the planet that "subscribes"/depends on the given planet
- versionInfo: an array of versionInfo items, each of which:
     - 0: the subscriber's version
     - 1: the given planet's version the subscribers depends on


The versionInfo items are sorted by ascending subscriber's version.


Available options are:

- lastOnly: bool=false. If true, we only look at the latest subscriber's version.
     The returned array is instead an array of planetDotName => lastVersionInfo,
     with lastVersionInfo:
         - 0: the last subscriber's version
         - 1: the given planet's version the subscribers depends on




Parameters
================


- planetDotName

    

- uniDir

    

- noLpiFiles

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LpiDependenciesHelper::getSubscribersList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiDependenciesHelper.php#L129-L176)


See Also
================

The [LpiDependenciesHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper.md) class.

Previous method: [getLpiDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getLpiDependenciesByPlanetDir.md)<br>Next method: [getLpiDepsFileDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getLpiDepsFileDependenciesByPlanetDir.md)<br>

