[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\PlanetTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool.md)


PlanetTool::removePlanet
================



PlanetTool::removePlanet — Removes the given planet from the given app directory.




Description
================


public static [PlanetTool::removePlanet](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/removePlanet.md)(string $planetDot, string $appDir, ?array $options = []) : void




Removes the given planet from the given app directory.
Optionally, the assets/map files are also removed.

Available options are:
- assets: bool=false, if true, the assets/map will be removed from the application.

See more details in the [import install discussion](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Parameters
================


- planetDot

    

- appDir

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [PlanetTool::removePlanet](https://github.com/lingtalfi/UniverseTools/blob/master/PlanetTool.php#L543-L560)


See Also
================

The [PlanetTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool.md) class.

Previous method: [removeAssetsByPlanetDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/removeAssetsByPlanetDotName.md)<br>

