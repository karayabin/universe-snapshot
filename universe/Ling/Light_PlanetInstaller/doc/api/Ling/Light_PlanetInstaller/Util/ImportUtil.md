[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The ImportUtil class
================
2020-12-08 --> 2021-05-31






Introduction
============

The ImportUtil class.



Class synopsis
==============


class <span class="pl-k">ImportUtil</span>  {

- Properties
    - private array [$warnings](#property-warnings) ;
    - private array [$conflicts](#property-conflicts) ;
    - private array [$defaultOptions](#property-defaultOptions) ;
    - private [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md)|null [$output](#property-output) ;
    - private string|null [$userCrmChoice](#property-userCrmChoice) ;
    - private bool [$useDebug](#property-useDebug) ;
    - private string [$debugFmt](#property-debugFmt) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/__construct.md)() : void
    - public [setOutput](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/setOutput.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [setDebug](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/setDebug.md)(bool $debug) : void
    - public [import](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/import.md)(string $planetDotName, ?array $options = []) : string | false
    - public [moveBuildDirToTargetApp](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/moveBuildDirToTargetApp.md)(string $buildDir, string $appDir) : void
    - public [getWarnings](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getWarnings.md)() : array
    - public [getConflicts](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getConflicts.md)() : array
    - private [init](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/init.md)() : void
    - private [translateTheoreticalToConcrete](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/translateTheoreticalToConcrete.md)(array $theoreticalImportMap) : array
    - private [stripConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/stripConcreteImportMap.md)(array $concreteImportMap) : array
    - private [importPlanetsToDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/importPlanetsToDir.md)(array $planets, string $dstDir, ?array $options = []) : void
    - private [smartCopy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/smartCopy.md)(string $planetPath, string $dstPlanetDir, bool $sym) : void
    - private [getLoader](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getLoader.md)(int $nbItems, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : [LoaderUtil](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil.md)
    - private [getPreConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getPreConcreteImportMap.md)(string $appDir, array $theoreticalMap, ?int &$nbAppConflicts = 0) : array
    - private [resolvePreConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/resolvePreConcreteImportMap.md)(array $preConcreteImportMap, ?array $options = []) : array
    - private [doResolvePreConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/doResolvePreConcreteImportMap.md)(array $preConcreteImportMap) : array
    - private [getConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getConcreteImportMap.md)(string $appDir, array $theoreticalMap, ?array $options = []) : array
    - private [getTheoreticalImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getTheoreticalImportMap.md)(string $planetDotName, ?string $version = null, ?array $options = []) : array
    - private [getTheoreticalImportMapWithSpecificVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getTheoreticalImportMapWithSpecificVersion.md)(string $planetDotName, string $version, ?array $options = []) : array
    - private [collectVersionedDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/collectVersionedDependencies.md)(string $planetDotName, string $version, ?array $options = [], ?array &$ret = [], ?array &$parentChain = [], ?array &$found = []) : void
    - private [processLpiDepsArray](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/processLpiDepsArray.md)(array $arr, string $planetDotName, string $version, array $options, array &$ret, array &$parentChain, array &$found) : bool
    - private [addConflict](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/addConflict.md)(string $planetDotName, string $version, array $parentChain) : void
    - private [addWarning](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/addWarning.md)(string $message) : void
    - private [write](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/write.md)(string $msg) : void
    - private [debug](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/debug.md)(string $msg) : void
    - private [getUniStyleImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getUniStyleImportMap.md)(string $planetDotName, ?array $options = []) : array
    - private [getTheoreticalImportMapFromUniDependencyMaster](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getTheoreticalImportMapFromUniDependencyMaster.md)(string $planetDotName, array $conf) : array
    - private [collectUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/collectUniDependencies.md)(string $planetDotName, array $planets, array &$ret, ?array &$found = []) : void
    - private [error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-warnings"><b>warnings</b></span>

    This property holds the warnings for this instance.
    
    

- <span id="property-conflicts"><b>conflicts</b></span>

    This property holds the conflicts for this instance.
    It's an array of items, each of which:
    - 0: planetDotName of the conflictual planet
    - 1: version of the conflictual planet
    - 2: the parent chain of the planet which led to this conflict, it's an array of items with the format:
             - $planetDotName:$version
         The first item is the oldest ancestor, and the last item is the direct parent of the conflictual planet.
    
    

- <span id="property-defaultOptions"><b>defaultOptions</b></span>

    This property holds the defaultOptions for this instance.
    
    

- <span id="property-output"><b>output</b></span>

    This property holds the output for this instance.
    
    

- <span id="property-userCrmChoice"><b>userCrmChoice</b></span>

    This property holds the userCrmChoice for this instance.
    
    

- <span id="property-useDebug"><b>useDebug</b></span>

    Whether to use debug mode.
    
    

- <span id="property-debugFmt"><b>debugFmt</b></span>

    The bashtml format to use to prefix a debug message.
    
    



Methods
==============

- [ImportUtil::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/__construct.md) &ndash; Builds the ImportUtil instance.
- [ImportUtil::setOutput](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/setOutput.md) &ndash; Sets the output.
- [ImportUtil::setDebug](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/setDebug.md) &ndash; Sets the debug.
- [ImportUtil::import](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/import.md) &ndash; Tries to import the given planet into the current application, and returns the "session dir" path, where information data is stored.
- [ImportUtil::moveBuildDirToTargetApp](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/moveBuildDirToTargetApp.md) &ndash; Moves the build dir to the app dir.
- [ImportUtil::getWarnings](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getWarnings.md) &ndash; Returns the warnings of this instance.
- [ImportUtil::getConflicts](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getConflicts.md) &ndash; Returns the conflicts of this instance.
- [ImportUtil::init](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/init.md) &ndash; Initializes the class before a public method is executed.
- [ImportUtil::translateTheoreticalToConcrete](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/translateTheoreticalToConcrete.md) &ndash; Returns a **concrete import map**, assuming no **application conflicts** at all.
- [ImportUtil::stripConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/stripConcreteImportMap.md) &ndash; Returns a stripped down version of the given concrete import map.
- [ImportUtil::importPlanetsToDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/importPlanetsToDir.md) &ndash; Imports the given planets to the given dir, and returns whether the program should continue.
- [ImportUtil::smartCopy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/smartCopy.md) &ndash; Copies or creates a symlink of the planet to the given destination.
- [ImportUtil::getLoader](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getLoader.md) &ndash; Returns a prepared loader instance.
- [ImportUtil::getPreConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getPreConcreteImportMap.md) &ndash; Returns a preconcrete import map, used internally to prepare the concrete import map.
- [ImportUtil::resolvePreConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/resolvePreConcreteImportMap.md) &ndash; Returns a **concrete import map**, based on the given **preconcrete import map**.
- [ImportUtil::doResolvePreConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/doResolvePreConcreteImportMap.md) &ndash; Returns the concrete import map from the given preconcrete import map.
- [ImportUtil::getConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getConcreteImportMap.md) &ndash; Returns the [concrete import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map).
- [ImportUtil::getTheoreticalImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getTheoreticalImportMap.md) &ndash; Returns the [theoretical import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map) for the given planet.
- [ImportUtil::getTheoreticalImportMapWithSpecificVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getTheoreticalImportMapWithSpecificVersion.md) &ndash; Returns the dependencies for with specific version numbers.
- [ImportUtil::collectVersionedDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/collectVersionedDependencies.md) &ndash; Collects the dependencies for with specific version numbers.
- [ImportUtil::processLpiDepsArray](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/processLpiDepsArray.md) &ndash; A factorized snippet used by the collectVersionedDependencies method.
- [ImportUtil::addConflict](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/addConflict.md) &ndash; Adds information about a dependency conflict that potentially occurs with the versioned system (i.e.
- [ImportUtil::addWarning](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/addWarning.md) &ndash; Adds a warning message.
- [ImportUtil::write](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/write.md) &ndash; Writes a message to the output.
- [ImportUtil::debug](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/debug.md) &ndash; Adds a message to the debug stream.
- [ImportUtil::getUniStyleImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getUniStyleImportMap.md) &ndash; Returns the [import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map) for the given planet, in uni style (i.e.
- [ImportUtil::getTheoreticalImportMapFromUniDependencyMaster](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getTheoreticalImportMapFromUniDependencyMaster.md) &ndash; Returns the [import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map) from the given uni dependency master content, for the given planet.
- [ImportUtil::collectUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/collectUniDependencies.md) &ndash; Collects the uni dependencies for the given planet, recursively.
- [ImportUtil::error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_PlanetInstaller\Util\ImportUtil<br>
See the source code of [Ling\Light_PlanetInstaller\Util\ImportUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/ImportUtil.php)



SeeAlso
==============
Previous class: [LightPlanetInstallerService](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Service/LightPlanetInstallerService.md)<br>Next class: [InstallInitUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/InstallInitUtil.md)<br>
