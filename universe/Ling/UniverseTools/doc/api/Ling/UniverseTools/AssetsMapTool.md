[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)



The AssetsMapTool class
================
2019-02-26 --> 2021-07-30






Introduction
============

The AssetsMapTool class.



Class synopsis
==============


class <span class="pl-k">AssetsMapTool</span>  {

- Methods
    - public static [copyAssets](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/AssetsMapTool/copyAssets.md)(string $assetMapDir, string $targetAppDir) : void
    - public static [removeAssets](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/AssetsMapTool/removeAssets.md)(string $assetMapDir, string $targetAppDir) : void
    - public static [getAssets](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/AssetsMapTool/getAssets.md)(string $assetMapDir, ?bool $useRelativePath = true) : array
    - public static [getAssetMapDirByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/AssetsMapTool/getAssetMapDirByPlanetDir.md)(string $planetDir) : string

}






Methods
==============

- [AssetsMapTool::copyAssets](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/AssetsMapTool/copyAssets.md) &ndash; Copies all the asset files found in the given assetsMap directory into the target application dir.
- [AssetsMapTool::removeAssets](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/AssetsMapTool/removeAssets.md) &ndash; Removes the assets files ("defined" in the assetsMapDir) from the target app dir.
- [AssetsMapTool::getAssets](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/AssetsMapTool/getAssets.md) &ndash; Returns the list of files found in the given asset/map directory.
- [AssetsMapTool::getAssetMapDirByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/AssetsMapTool/getAssetMapDirByPlanetDir.md) &ndash; Returns the path to the asset/map directory.





Location
=============
Ling\UniverseTools\AssetsMapTool<br>
See the source code of [Ling\UniverseTools\AssetsMapTool](https://github.com/lingtalfi/UniverseTools/blob/master/AssetsMapTool.php)



SeeAlso
==============
Next class: [BangTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/BangTool.md)<br>
