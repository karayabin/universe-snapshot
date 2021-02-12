[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The PlanetImportProcessUtil class
================
2020-12-08 --> 2021-02-11






Introduction
============

The PlanetImportProcessUtil class.



Class synopsis
==============


class <span class="pl-k">PlanetImportProcessUtil</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) [$output](#property-output) ;
    - private string [$applicationDir](#property-applicationDir) ;
    - private string [$buildDir](#property-buildDir) ;
    - private array [$applicationPlanets](#property-applicationPlanets) ;
    - private [Ling\Light_PlanetInstaller\Util\array array](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/array array.md) [$virtualBin](#property-virtualBin) ;
    - private array [$lastPlanets](#property-lastPlanets) ;
    - private string [$bernoniMode](#property-bernoniMode) ;
    - private array [$planetDependencies](#property-planetDependencies) ;
    - private int [$indentLevel](#property-indentLevel) ;
    - private string [$indentSymbol](#property-indentSymbol) ;
    - private array [$bernoniMemory](#property-bernoniMemory) ;
    - private array [$logLevels](#property-logLevels) ;
    - private array [$sessionErrors](#property-sessionErrors) ;
    - private array [$wishList](#property-wishList) ;
    - private bool [$keepBuild](#property-keepBuild) ;
    - private bool [$force](#property-force) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOutput](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/setOutput.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [setLogLevels](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/setLogLevels.md)(array $logLevels) : void
    - public [updateApplicationByWishList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/updateApplicationByWishList.md)(string $appDir, array $wishList, ?array $options = []) : void
    - public [getVirtualBin](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getVirtualBin.md)() : array
    - public [getSessionErrors](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getSessionErrors.md)() : array
    - public [getBuildDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getBuildDir.md)() : string
    - public [moveVirtualBinToBuildDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/moveVirtualBinToBuildDir.md)(?array $options = []) : void
    - public [importBuildDirToApp](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/importBuildDirToApp.md)(?array &$errors = [], ?array $options = []) : array
    - private [handleCopyWarnings](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/handleCopyWarnings.md)(array &$warnings) : void
    - public [importToVirtualBin](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/importToVirtualBin.md)(string $planetDot, string $versionExpr, ?array $options = []) : void
    - private [planetExistsInVirtualBin](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/planetExistsInVirtualBin.md)(string $planetDot, ?string $version = null) : bool
    - private [planetExistsInApp](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/planetExistsInApp.md)(string $planetDot, ?string $version = null) : bool
    - private [getPlanetDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getPlanetDependencies.md)(string $planetDot, string $realVersion) : array
    - private [addToVirtualBin](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/addToVirtualBin.md)(string $planetDot, string $realVersion) : bool
    - private [getVersionToInstallFromMiniVersionExpression](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getVersionToInstallFromMiniVersionExpression.md)(string $miniVersionExpression) : string
    - private [adaptToWishlist](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/adaptToWishlist.md)(string $planetDot, string $miniVersionExpr, ?string &$wishMiniVersionExpr = null) : false | string
    - private [hasConflict](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/hasConflict.md)(string $locationId, string $planetDot, string $miniVersionExpr, ?string &$versionToAddToVirtualBin = null) : bool
    - private [getBernoniId](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getBernoniId.md)(string $planetDot, string $v1, string $v2) : string
    - private [toMiniVersionExpression](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/toMiniVersionExpression.md)(string $planetDot, string $versionExpr) : string
    - private [debug](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/debug.md)(string $msg) : void
    - private [trace](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/trace.md)(string $msg) : void
    - private [info](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/info.md)(string $msg) : void
    - private [logError](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/logError.md)(string $msg) : void
    - private [warning](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/warning.md)(string $msg) : void
    - private [write](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/write.md)(string $msg) : void
    - private [prepareWishlist](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/prepareWishlist.md)(array $wishlist) : array
    - private [init](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/init.md)() : void
    - private [error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-output"><b>output</b></span>

    This property holds the output for this instance.
    
    

- <span id="property-applicationDir"><b>applicationDir</b></span>

    This property holds the applicationDir for this instance.
    
    

- <span id="property-buildDir"><b>buildDir</b></span>

    This property holds the buildDir for this instance.
    
    

- <span id="property-applicationPlanets"><b>applicationPlanets</b></span>

    This property holds the applicationPlanets for this instance.
    It's an array of planetDot => (real) version.
    
    

- <span id="property-virtualBin"><b>virtualBin</b></span>

    This property holds the virtualBin for this instance.
    It's an array of planetDot => (real) version.
    
    

- <span id="property-lastPlanets"><b>lastPlanets</b></span>

    This property holds the lastPlanets for this instance.
    
    

- <span id="property-bernoniMode"><b>bernoniMode</b></span>

    This property holds the bernoniMode for this instance.
    
    string(manual|auto)=auto, the bernoni conflict resolution mode.
    If auto, this method will automatically resolve bernoni conflicts as they occur, choosing the latest version (for now).
    If manual, this method will prompt the user to choose which version should be used. Note that the manual mode is only available in a cli environment,
    an exception will be thrown if you try this mode in a web environment.
    
    

- <span id="property-planetDependencies"><b>planetDependencies</b></span>

    This property holds the planetDependencies for this instance.
    Cache for planet dependencies (which are searched from the web because it's has supposedly the most up-to-date info).
    It's an array of planetFullId => dependencyItems, with:
    
    - planetFullId = galaxy.planet.realVersion
    - dependencyItems, an array of dependency items, each of which:
         - 0: planetDot
         - 1: versionExpr
    
    

- <span id="property-indentLevel"><b>indentLevel</b></span>

    This property holds the indentLevel for this instance.
    
    

- <span id="property-indentSymbol"><b>indentSymbol</b></span>

    This property holds the indentSymbol for this instance.
    
    

- <span id="property-bernoniMemory"><b>bernoniMemory</b></span>

    This property holds the bernoniMemory for this instance.
    Array of bernoniId => userChoice,
    with:
    - bernoniId: galaxy.planet:version1:version2
    - userChoice: the real version chosen by the user
    - version1: the first version in a sorted list containing v1 and v2
    - version2: the last version in a sorted list containing v1 and v2
    
    

- <span id="property-logLevels"><b>logLevels</b></span>

    The log levels to display to the output.
    
    We support [classic log levels](https://github.com/lingtalfi/TheBar/blob/master/discussions/classic-log-levels.md).
    
    Choose any options in:
    
    - trace
    - debug
    - info
    - warning
    - error
    
    
    Default is the following array:
    - info
    - warning
    - error
    
    

- <span id="property-sessionErrors"><b>sessionErrors</b></span>

    This property holds the sessionErrors for this instance.
    
    

- <span id="property-wishList"><b>wishList</b></span>

    This property holds the wishList for this instance.
    Array of planetDot => miniVersionExpr (after prepareWishlist is called).
    
    

- <span id="property-keepBuild"><b>keepBuild</b></span>

    This property holds the keepBuild for this instance.
    
    

- <span id="property-force"><b>force</b></span>

    This property holds the force for this instance.
    
    



Methods
==============

- [PlanetImportProcessUtil::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/__construct.md) &ndash; Builds the PlanetInstallerUtil instance.
- [PlanetImportProcessUtil::setContainer](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/setContainer.md) &ndash; Sets the container.
- [PlanetImportProcessUtil::setOutput](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/setOutput.md) &ndash; Sets the output.
- [PlanetImportProcessUtil::setLogLevels](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/setLogLevels.md) &ndash; Sets the logLevels.
- [PlanetImportProcessUtil::updateApplicationByWishList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/updateApplicationByWishList.md) &ndash; Update the given application based on the given wishlist.
- [PlanetImportProcessUtil::getVirtualBin](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getVirtualBin.md) &ndash; Returns the virtualBin of this instance.
- [PlanetImportProcessUtil::getSessionErrors](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getSessionErrors.md) &ndash; Returns the sessionErrors of this instance.
- [PlanetImportProcessUtil::getBuildDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getBuildDir.md) &ndash; Returns the path to the build dir.
- [PlanetImportProcessUtil::moveVirtualBinToBuildDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/moveVirtualBinToBuildDir.md) &ndash; Moves the planets defined in the virtual bin to the build dir.
- [PlanetImportProcessUtil::importBuildDirToApp](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/importBuildDirToApp.md) &ndash; Imports the planets found in the build dir to the application dir, and returns the planet dot names that have been successfully imported.
- [PlanetImportProcessUtil::handleCopyWarnings](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/handleCopyWarnings.md) &ndash; Display all the warnings to the output (if the conf allows it), and empties the warnings array.
- [PlanetImportProcessUtil::importToVirtualBin](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/importToVirtualBin.md) &ndash; Imports the given planet and its dependencies recursively to the virtual bin.
- [PlanetImportProcessUtil::planetExistsInVirtualBin](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/planetExistsInVirtualBin.md) &ndash; Returns whether the given planet dot exists in the virtual bin.
- [PlanetImportProcessUtil::planetExistsInApp](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/planetExistsInApp.md) &ndash; Returns whether the given planet dot exists in the defined app.
- [PlanetImportProcessUtil::getPlanetDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getPlanetDependencies.md) &ndash; Returns the dependencies for the given planet.
- [PlanetImportProcessUtil::addToVirtualBin](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/addToVirtualBin.md) &ndash; Adds the given planet to the virtual bin and returns if the planet was actually added.
- [PlanetImportProcessUtil::getVersionToInstallFromMiniVersionExpression](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getVersionToInstallFromMiniVersionExpression.md) &ndash; Returns the real version equivalent of the given mini version expression.
- [PlanetImportProcessUtil::adaptToWishlist](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/adaptToWishlist.md) &ndash; Tests whether the given mini version expression is defined in the wishlist, and returns either false, or the adapted version.
- [PlanetImportProcessUtil::hasConflict](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/hasConflict.md) &ndash; Returns whether there is a conflict between the given planet and the one in the bin.
- [PlanetImportProcessUtil::getBernoniId](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getBernoniId.md) &ndash; Returns a bernoni id.
- [PlanetImportProcessUtil::toMiniVersionExpression](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/toMiniVersionExpression.md) &ndash; Returns the mini version of the given version expression.
- [PlanetImportProcessUtil::debug](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/debug.md) &ndash; Prints a debug message to the console, if the configuration allows it.
- [PlanetImportProcessUtil::trace](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/trace.md) &ndash; Prints a trace message to the console, if the configuration allows it.
- [PlanetImportProcessUtil::info](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/info.md) &ndash; Prints a info message to the console, if the configuration allows it.
- [PlanetImportProcessUtil::logError](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/logError.md) &ndash; Prints an error message to the console, if the configuration allows it.
- [PlanetImportProcessUtil::warning](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/warning.md) &ndash; Prints a warning message to the console, if the configuration allows it.
- [PlanetImportProcessUtil::write](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/write.md) &ndash; Writes a message to the output.
- [PlanetImportProcessUtil::prepareWishlist](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/prepareWishlist.md) &ndash; Returns the given wishlist, converting version expressions to mini version expressions.
- [PlanetImportProcessUtil::init](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/init.md) &ndash; Initializes the utility before usage.
- [PlanetImportProcessUtil::error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_PlanetInstaller\Util\PlanetImportProcessUtil<br>
See the source code of [Ling\Light_PlanetInstaller\Util\PlanetImportProcessUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/PlanetImportProcessUtil.php)



SeeAlso
==============
Previous class: [LpiRepositoryUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil.md)<br>
