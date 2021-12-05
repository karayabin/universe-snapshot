Ling/UniverseTools
================
2019-02-26 --> 2021-07-30




Table of contents
===========

- [AssetsMapTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/AssetsMapTool.md) &ndash; The AssetsMapTool class.
    - [AssetsMapTool::copyAssets](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/AssetsMapTool/copyAssets.md) &ndash; Copies all the asset files found in the given assetsMap directory into the target application dir.
    - [AssetsMapTool::removeAssets](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/AssetsMapTool/removeAssets.md) &ndash; Removes the assets files ("defined" in the assetsMapDir) from the target app dir.
    - [AssetsMapTool::getAssets](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/AssetsMapTool/getAssets.md) &ndash; Returns the list of files found in the given asset/map directory.
    - [AssetsMapTool::getAssetMapDirByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/AssetsMapTool/getAssetMapDirByPlanetDir.md) &ndash; Returns the path to the asset/map directory.
- [BangTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/BangTool.md) &ndash; The BangTool class.
    - [BangTool::bang](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/BangTool/bang.md) &ndash; Bangs the universe directory.
    - [BangTool::bangApp](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/BangTool/bangApp.md) &ndash; Bangs the given application directory.
- [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md) &ndash; The DependencyTool class.
    - [DependencyTool::getDependencyListRecursiveByUniverseDirPlanets](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyListRecursiveByUniverseDirPlanets.md) &ndash; Returns a list of sorted [planet dot names](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) corresponding to all the dependencies listed in the dependencies.byml file for the given planets, recursively.
    - [DependencyTool::parsePlanetDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/parsePlanetDependencies.md) &ndash; Returns the real planet dependencies by scanning the planet folder.
    - [DependencyTool::parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/parseDumpDependencies.md) &ndash; A method to help creating the [dependencies.byml file](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).
    - [DependencyTool::getUniverseAssetDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getUniverseAssetDependencies.md) &ndash; Returns the [universe asset dependencies](https://github.com/lingtalfi/NotationFan/blob/master/universe-assets.md#the-universeassetdependencies-trick) for a given planet directory.
    - [DependencyTool::getDependencyItem](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyItem.md) &ndash; Returns an array of dependency items for the given $planetDir.
    - [DependencyTool::getDependencyArray](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyArray.md) &ndash; Returns the array contained in the dependencies.byml file if found, or an empty array otherwise.
    - [DependencyTool::getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyList.md) &ndash; and return an array of all dependencies found in it.
    - [DependencyTool::getDependencyListByFile](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyListByFile.md) &ndash; Parses the given dependencies.byml file, and returns an array of all dependencies found in it.
    - [DependencyTool::getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyHomeUrl.md) &ndash; Returns the home url (i.e.
    - [DependencyTool::writeDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/writeDependencies.md) &ndash; Writes the dependencies.byml file at the root of the given $planetDir.
- [UniverseToolsException](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Exception/UniverseToolsException.md) &ndash; The base exception class for the UniverseTools planet.
- [GalaxyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/GalaxyTool.md) &ndash; The GalaxyTool class.
    - [GalaxyTool::getKnownGalaxies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/GalaxyTool/getKnownGalaxies.md) &ndash; Returns the array of known galaxies.
- [LocalUniverseTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/LocalUniverseTool.md) &ndash; The LocalUniverseTool class.
    - [LocalUniverseTool::getLocalUniversePath](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/LocalUniverseTool/getLocalUniversePath.md) &ndash; Returns the path to the [local universe](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#local-universe).
    - [LocalUniverseTool::getPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/LocalUniverseTool/getPlanetDir.md) &ndash; Returns the path to the local universe planet dir if it exists, or null otherwise.
- [MachineUniverseTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MachineUniverseTool.md) &ndash; The MachineUniverseTool class.
    - [MachineUniverseTool::getMachineUniversePath](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MachineUniverseTool/getMachineUniversePath.md) &ndash; Returns the path to the [machine universe path](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#machine-universe).
- [MetaInfoTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool.md) &ndash; The MetaInfoTool class.
    - [MetaInfoTool::parseInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/parseInfo.md) &ndash; Returns an array of the meta info found in the given planet.
    - [MetaInfoTool::getVersionByUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/getVersionByUrl.md) &ndash; Returns the current version number of the planet, from the metaInfo url.
    - [MetaInfoTool::getVersion](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/getVersion.md) &ndash; Returns the version number associated with the given planetDir, if found in the meta-info file.
    - [MetaInfoTool::incrementVersion](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/incrementVersion.md) &ndash; Increments the version number found in the meta-info.byml file, and returns that number.
    - [MetaInfoTool::writeInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/writeInfo.md) &ndash; Writes the given meta $info to the meta-info.byml file of the given $planetDir.
- [PlanetTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool.md) &ndash; The PlanetTool class.
    - [PlanetTool::getPlanetDotNamesByWorkingDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDotNamesByWorkingDir.md) &ndash; Returns the list of the planet dot names present in the given working dir.
    - [PlanetTool::getVersionByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getVersionByPlanetDir.md) &ndash; Returns the version number of the planet if found, or null otherwise.
    - [PlanetTool::exists](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/exists.md) &ndash; Returns whether the given planet exists in the given app.
    - [PlanetTool::getPlanetSlashNameByDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetSlashNameByDotName.md) &ndash; Returns the [planet slash name](https://github.com/karayabin/universe-snapshot#the-planet-slash-name) from the given planet dot name.
    - [PlanetTool::getPlanetDirByPlanetDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDirByPlanetDotName.md) &ndash; Returns the location of the planet directory from the given planet dot name and app dir.
    - [PlanetTool::getClassNames](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getClassNames.md) &ndash; Parses the given directory recursively and returns an array containing the names of all [bsr-1](https://github.com/lingtalfi/TheScientist/blob/master/bsr-1.md) classes found.
    - [PlanetTool::getPlanetDirs](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDirs.md) &ndash; Returns the list of planet dirs for a given $universeDir.
    - [PlanetTool::getPlanetDotNames](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDotNames.md) &ndash; Returns the array of planet dot names found in the given universe directory.
    - [PlanetTool::getGalaxyNamePlanetNameByDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyNamePlanetNameByDir.md) &ndash; Returns an array containing the galaxy name and the short planet name extracted from the given $planetDir.
    - [PlanetTool::getPlanetDotNameByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDotNameByPlanetDir.md) &ndash; Returns the planet dot name from the given planet dir.
    - [PlanetTool::getTightPlanetName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getTightPlanetName.md) &ndash; Returns the [tight planet name](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md#tight-planet-name) for a given planet.
    - [PlanetTool::getCompressedPlanetName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getCompressedPlanetName.md) &ndash; Returns the [compressed planet name](https://github.com/karayabin/universe-snapshot#the-compressed-planet-name) for a given planet.
    - [PlanetTool::getGalaxyNamePlanetNameByPlanetName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyNamePlanetNameByPlanetName.md) &ndash; Returns an array containing the galaxy name and the short planet name extracted from the given $planetName.
    - [PlanetTool::extractPlanetId](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/extractPlanetId.md) &ndash; Returns an array containing the galaxy and the planet, based on the given planetId.
    - [PlanetTool::extractPlanetDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/extractPlanetDotName.md) &ndash; Returns an array containing the galaxy and the planet, based on the given [planetDotName](https://github.com/karayabin/universe-snapshot#the-planet-dot-name).
    - [PlanetTool::getGalaxyPlanetByClassName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyPlanetByClassName.md) &ndash; Returns an array containing the galaxy and planet contained in the given class name.
    - [PlanetTool::getPlanetDotNameByClassName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDotNameByClassName.md) &ndash; Returns the page(planet dot name) from the given class name.
    - [PlanetTool::importPlanetByExternalDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/importPlanetByExternalDir.md) &ndash; Imports a planet by copying its given external source dir to the target application.
    - [PlanetTool::installAssetsByPlanetDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/installAssetsByPlanetDotName.md) &ndash; Installs the assets of the given planet.
    - [PlanetTool::removeAssetsByPlanetDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/removeAssetsByPlanetDotName.md) &ndash; Removes the assets for the given planet.
    - [PlanetTool::removePlanet](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/removePlanet.md) &ndash; Removes the given planet from the given app directory.
- [StandardReadmeUtil](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil.md) &ndash; The StandardReadmeUtil class.
    - [StandardReadmeUtil::__construct](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/__construct.md) &ndash; Builds the ReadmeUtil instance.
    - [StandardReadmeUtil::getLatestVersionInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getLatestVersionInfo.md) &ndash; section of the given README file.
    - [StandardReadmeUtil::getErrors](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getErrors.md) &ndash; Returns the errors of this instance.
    - [StandardReadmeUtil::addHistoryLogEntry](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addHistoryLogEntry.md) &ndash; Adds an history entry to the given "read me" file, with the given message, date and version.
    - [StandardReadmeUtil::getPlanetsToCommitListByAppDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getPlanetsToCommitListByAppDir.md) &ndash; Returns the array of the planet dot names to commit.
    - [StandardReadmeUtil::addCommitMessageByUniverseDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addCommitMessageByUniverseDir.md) &ndash; Adds a commit message to the history log section of the README files for each planet in the given universeDir.
    - [StandardReadmeUtil::updateDate](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/updateDate.md) &ndash; Updates the date of the README.md file.
    - [StandardReadmeUtil::addCommitMessageByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addCommitMessageByPlanetDir.md) &ndash; Adds a commit message to the history log section of the README files for the given planet..
    - [StandardReadmeUtil::getReadmeVersionsByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getReadmeVersionsByPlanetDir.md) &ndash; Returns the array of all version numbers found in the README.md of the given planetDir.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [DirScanner](https://github.com/lingtalfi/DirScanner)
- [TokenFun](https://github.com/lingtalfi/TokenFun)


