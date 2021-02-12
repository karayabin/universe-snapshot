[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LightPlanetInstallerApplication class
================
2020-12-08 --> 2021-02-11






Introduction
============

The LightPlanetInstallerApplication class.


Nomenclature
----------------

### planetInfo
The planetInfo array is an array with the following structure:

- 0: planet path     (string)
- 1: galaxy name     (string)
- 2: planet name     (string)
- 3: real version number  (string)



Class synopsis
==============


class <span class="pl-k">LightPlanetInstallerApplication</span> extends [LightCliBaseApplication](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliBaseApplication.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightCliApplicationInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplicationInterface.md), [ProgramInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface.md) {

- Properties
    - protected string [$currentDirectory](#property-currentDirectory) ;
    - protected [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) [$currentOutput](#property-currentOutput) ;
    - protected bool [$devMode](#property-devMode) ;
    - protected array [$notFoundPlanets](#property-notFoundPlanets) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightCliBaseApplication::$container](#property-container) ;
    - protected array [Application::$commands](#property-commands) ;
    - protected string [Application::$defaultCommandAlias](#property-defaultCommandAlias) ;
    - protected [Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger/blob/master/doc/api/Ling/UniversalLogger/UniversalLoggerInterface.md) [AbstractProgram::$logger](#property-logger) ;
    - protected string [AbstractProgram::$loggerChannel](#property-loggerChannel) ;
    - protected bool [AbstractProgram::$errorIsVerbose](#property-errorIsVerbose) ;
    - protected bool [AbstractProgram::$useExitStatus](#property-useExitStatus) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/__construct.md)() : void
    - public [getAppId](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getAppId.md)() : string
    - protected [runProgram](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/runProgram.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed
    - public [hasLpiFile](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/hasLpiFile.md)(?array $options = []) : bool
    - public [setCurrentOutput](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/setCurrentOutput.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $currentOutput) : void
    - public [addPlanetListToLpiFile](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/addPlanetListToLpiFile.md)(array $planetList) : void
    - public [removePlanetFromLpiFile](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/removePlanetFromLpiFile.md)(string $planetDotName) : void
    - public [createLpiFile](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/createLpiFile.md)(?array $options = []) : void
    - public [getLpiPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getLpiPath.md)(?array $options = []) : string
    - public [getUniversePath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getUniversePath.md)() : string
    - public [getCurrentDirectory](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getCurrentDirectory.md)() : string
    - public [getApplicationDirectory](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getApplicationDirectory.md)() : string
    - public [copyToGlobalDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/copyToGlobalDir.md)(string $planetPath, string $galaxy, string $planet, string $version) : void
    - public [lpiDiff](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/lpiDiff.md)(?array $options = []) : array
    - public [updateApplicationByWishlist](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/updateApplicationByWishlist.md)(?array $options = [], ?array &$virtualBin = []) : void
    - public [logError](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/logError.md)($error) : void
    - protected [onCommandInstantiated](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/onCommandInstantiated.md)([Ling\CliTools\Command\CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) $command) : void
    - private [error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/error.md)(string $msg, ?int $code = null) : void
    - private [getPlanetsInfo](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getPlanetsInfo.md)(?array $options = []) : array
    - private [getPlanetsInfoFromLpi](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getPlanetsInfoFromLpi.md)(?array $options = []) : array
    - private [countPlanetsFromLpi](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/countPlanetsFromLpi.md)() : int
    - private [useNotFoundPlanets](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/useNotFoundPlanets.md)() : void
    - private [addNotFoundPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/addNotFoundPlanet.md)(string $planetDot, string $versionExpr) : void
    - private [displayNotFoundPlanetList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/displayNotFoundPlanetList.md)() : void

- Inherited methods
    - public LightCliBaseApplication::getCommands() : [LightCliCommandInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface.md)
    - public LightCliBaseApplication::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public Application::registerCommand(string $commandClassName, $aliases) : void
    - protected Application::onCommandNotFound(string $commandAlias, Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public AbstractProgram::setLogger([Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger/blob/master/doc/api/Ling/UniversalLogger/UniversalLoggerInterface.md) $logger) : void
    - public AbstractProgram::setLoggerChannel(string $loggerChannel) : void
    - public AbstractProgram::setErrorIsVerbose(bool $errorIsVerbose) : void
    - public AbstractProgram::setUseExitStatus(bool $useExitStatus) : void
    - public AbstractProgram::run(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void

}




Properties
=============

- <span id="property-currentDirectory"><b>currentDirectory</b></span>

    This property holds the currentDirectory when this instance was first instantiated.
    
    

- <span id="property-currentOutput"><b>currentOutput</b></span>

    This property holds the current output for this instance.
    
    It's set by a command when the command is executed.
    
    

- <span id="property-devMode"><b>devMode</b></span>

    This property holds the devMode for this instance.
    In dev mode, exceptions trace are displayed directly in the console output.
    
    

- <span id="property-notFoundPlanets"><b>notFoundPlanets</b></span>

    This property holds the notFoundPlanets for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-commands"><b>commands</b></span>

    This property holds the array of commands for this instance.
    
    It's an array of command alias => command class name.
    
    Note: multiple aliases can reference the same command class name.
    
    

- <span id="property-defaultCommandAlias"><b>defaultCommandAlias</b></span>

    This property holds the defaultCommandAlias for this instance.
    
    

- <span id="property-logger"><b>logger</b></span>

    This property holds the logger for this instance.
    If no instance is set (by default), no message will be logged.
    
    If an instance is set, log messages will be sent when an exception is intercepted.
    The channel the log message is sent to is error by default, and can be changed using the loggerChannel property.
    
    

- <span id="property-loggerChannel"><b>loggerChannel</b></span>

    This property holds the channel the log messages will be sent to.
    See the $logger property for more details.
    
    

- <span id="property-errorIsVerbose"><b>errorIsVerbose</b></span>

    This property holds the error verbosity for this instance.
    It controls the verbosity of the error messages displayed to the user when an exception is caught at the program
    level.
    
    
    If true:
         - the error message displayed to the console screen is the traceAsString of the exception.
         - the message sent to the log is also the traceAsString of the exception.
    if false:
         - the error message displayed to the console screen is the exception message.
         - the message sent to the log is also the exception message.
    
    

- <span id="property-useExitStatus"><b>useExitStatus</b></span>

    This property holds the useExitStatus for this instance.
    
    If true, the run command will call the php exit function with the exit code returned by the runProgram method,
    or 1 if an error occurred (an exception was thrown).
    If false, the exit function will not be called.
    
    



Methods
==============

- [LightPlanetInstallerApplication::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/__construct.md) &ndash; Builds the Application instance.
- [LightPlanetInstallerApplication::getAppId](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getAppId.md) &ndash; Returns the appId of the application.
- [LightPlanetInstallerApplication::runProgram](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/runProgram.md) &ndash; Runs the program, and returns the exit status.
- [LightPlanetInstallerApplication::hasLpiFile](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/hasLpiFile.md) &ndash; Returns whether there is a lpi file in the current application.
- [LightPlanetInstallerApplication::setCurrentOutput](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/setCurrentOutput.md) &ndash; Sets the currentOutput.
- [LightPlanetInstallerApplication::addPlanetListToLpiFile](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/addPlanetListToLpiFile.md) &ndash; Adds/replaces the planets of the given list to the lpi file.
- [LightPlanetInstallerApplication::removePlanetFromLpiFile](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/removePlanetFromLpiFile.md) &ndash; Removes a planet from the lpi file.
- [LightPlanetInstallerApplication::createLpiFile](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/createLpiFile.md) &ndash; Creates the lpi file for this application if it doesn't exist yet.
- [LightPlanetInstallerApplication::getLpiPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getLpiPath.md) &ndash; Returns the path where the lpi file is supposed to be.
- [LightPlanetInstallerApplication::getUniversePath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getUniversePath.md) &ndash; 
- [LightPlanetInstallerApplication::getCurrentDirectory](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getCurrentDirectory.md) &ndash; Returns the currentDirectory of this instance.
- [LightPlanetInstallerApplication::getApplicationDirectory](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getApplicationDirectory.md) &ndash; Returns the application directory, which should be the current directory.
- [LightPlanetInstallerApplication::copyToGlobalDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/copyToGlobalDir.md) &ndash; Copies the given planet directory and its content to the global directory, in a directory named after the given $galaxy, $planet and $version.
- [LightPlanetInstallerApplication::lpiDiff](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/lpiDiff.md) &ndash; Returns the list of elements to update in the current app, based on their definition in the lpi file.
- [LightPlanetInstallerApplication::updateApplicationByWishlist](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/updateApplicationByWishlist.md) &ndash; Updates the application planets using the lpi file as a reference, and fills the virtualBin array.
- [LightPlanetInstallerApplication::logError](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/logError.md) &ndash; Writes an error message to the log, and prints it to the output too.
- [LightPlanetInstallerApplication::onCommandInstantiated](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/onCommandInstantiated.md) &ndash; Can decorate the command after it has just been instantiated.
- [LightPlanetInstallerApplication::error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/error.md) &ndash; Throws an exception.
- [LightPlanetInstallerApplication::getPlanetsInfo](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getPlanetsInfo.md) &ndash; Returns an array of items containing information about the planets of the current app.
- [LightPlanetInstallerApplication::getPlanetsInfoFromLpi](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getPlanetsInfoFromLpi.md) &ndash; Returns an array of [planet dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) => versionExpression contained in the lpi.byml file.
- [LightPlanetInstallerApplication::countPlanetsFromLpi](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/countPlanetsFromLpi.md) &ndash; Returns the number of items defined in the planets section of the lpi file.
- [LightPlanetInstallerApplication::useNotFoundPlanets](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/useNotFoundPlanets.md) &ndash; 
- [LightPlanetInstallerApplication::addNotFoundPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/addNotFoundPlanet.md) &ndash; Adds the given planet to the list of not found planets.
- [LightPlanetInstallerApplication::displayNotFoundPlanetList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/displayNotFoundPlanetList.md) &ndash; Outputs the list of not found planets.
- LightCliBaseApplication::getCommands &ndash; Returns the array of commands provided by the application.
- LightCliBaseApplication::setContainer &ndash; Sets the light service container interface.
- Application::registerCommand &ndash; Registers a command with the given aliases.
- Application::onCommandNotFound &ndash; Hook called if a command was not found.
- AbstractProgram::setLogger &ndash; Sets the logger.
- AbstractProgram::setLoggerChannel &ndash; Sets the loggerChannel.
- AbstractProgram::setErrorIsVerbose &ndash; Sets the errorIsVerbose.
- AbstractProgram::setUseExitStatus &ndash; Sets the useExitStatus.
- AbstractProgram::run &ndash; Starts the interactive program.





Location
=============
Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication<br>
See the source code of [Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Program/LightPlanetInstallerApplication.php)



SeeAlso
==============
Previous class: [UninstallCommand](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/UninstallCommand.md)<br>Next class: [LightPlanetInstallerException](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Exception/LightPlanetInstallerException.md)<br>
