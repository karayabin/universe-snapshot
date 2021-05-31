[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\PlanetTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool.md)


PlanetTool::importPlanetByExternalDir
================



PlanetTool::importPlanetByExternalDir — Imports a planet by copying its given external source dir to the target application.




Description
================


public static [PlanetTool::importPlanetByExternalDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/importPlanetByExternalDir.md)(string $planetDot, string $extPlanetDir, string $appDir, ?array $options = []) : void




Imports a planet by copying its given external source dir to the target application.
Optionally, the assets/map can be copied into the app.

Available options are:
- assets: bool=false, if true, the assets/map will be copied to the application.
- symlinks: bool=false, if true, symlinks to the local universe will be created (if available) instead of copying
     the whole planet dirs.

See more details in the [import install discussion](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Parameters
================


- planetDot

    

- extPlanetDir

    

- appDir

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [PlanetTool::importPlanetByExternalDir](https://github.com/lingtalfi/UniverseTools/blob/master/PlanetTool.php#L452-L491)


See Also
================

The [PlanetTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool.md) class.

Previous method: [getPlanetDotNameByClassName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDotNameByClassName.md)<br>Next method: [installAssetsByPlanetDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/installAssetsByPlanetDotName.md)<br>

