[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The UniToolApplication class
================
2019-03-12 --> 2019-03-21






Introduction
============

The UniToolApplication class.
This is the console [Application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md) of the uni tool.


It has the following commands:

- listplanet: lists the planets in the current application, optionally with their version number.
- version: shows the current version of this Uni2 planet.
- conf: displays the uni tool configuration, or updates the configuration values.
- confpath: displays the uni tool's configuration path



The following options apply at this application level and can be passed via the [command-line](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md):

Options:
- --application-dir: the path to the application dir to use. The default value is the current directory.




The uni-tool info file
-----------------------
The uni-tool info file contains internal information about the uni-tool state.
It contains the following data:

- last_update: string|null. The date (mysql format) when the uni tool was last updated (with the upgrade command).


This information is used internally and shouldn't be edited manually (unless you do exactly what you are doing).



Class synopsis
==============


class <span class="pl-k">UniToolApplication</span> extends [Application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md) implements [ProgramInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface.md) {

- Properties
    - protected string [$currentDirectory](#property-currentDirectory) ;
    - private string [$applicationDir](#property-applicationDir) ;
    - private string [$confFile](#property-confFile) ;
    - private string [$infoFile](#property-infoFile) ;
    - private array [$dependencyMasterConf](#property-dependencyMasterConf) ;
    - private [Ling\Uni2\DependencySystemImporter\DependencySystemImporterInterface[]](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface.md) [$importers](#property-importers) ;
    - private [Ling\Uni2\LocalServer\LocalServer](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md) [$localServer](#property-localServer) ;
    - private int [$baseIndent](#property-baseIndent) ;
    - private [Ling\Octopus\ServiceContainer\OctopusServiceContainerInterface](https://github.com/lingtalfi/Octopus/blob/master/ServiceContainer/OctopusServiceContainerInterface.php) [$container](#property-container) ;

- Inherited properties
    - protected array [Application::$commands](#property-commands) ;
    - protected [Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger/blob/master/UniversalLoggerInterface.php) [AbstractProgram::$logger](#property-logger) ;
    - protected string [AbstractProgram::$loggerChannel](#property-loggerChannel) ;
    - protected bool [AbstractProgram::$errorIsVerbose](#property-errorIsVerbose) ;
    - protected bool [AbstractProgram::$useExitStatus](#property-useExitStatus) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/__construct.md)() : void
    - public [getApplicationDir](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getApplicationDir.md)() : string
    - public [getUniverseDependenciesDir](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getUniverseDependenciesDir.md)() : string
    - public [getImporter](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getImporter.md)(string $dependencySystemName) : null | object
    - public [getUniverseDirectory](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getUniverseDirectory.md)() : string
    - public [checkApplicationDir](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/checkApplicationDir.md)() : string
    - public [checkUniverseDirectory](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/checkUniverseDirectory.md)() : string
    - public [bootUniverse](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/bootUniverse.md)(Ling\CliTools\Output\OutputInterface $output) : void
    - public [getConfFile](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getConfFile.md)() : string
    - public [getConf](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getConf.md)() : array
    - public [getConfValue](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getConfValue.md)(string $key, $default = null) : mixed
    - public [getLocalServer](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getLocalServer.md)() : [LocalServer](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md)
    - public [copyDependencyMasterFileFromWeb](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/copyDependencyMasterFileFromWeb.md)() : bool
    - public [getDependencyMasterConf](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getDependencyMasterConf.md)() : array
    - public [getKnownGalaxies](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getKnownGalaxies.md)() : array
    - public [getUniToolWebVersionNumber](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getUniToolWebVersionNumber.md)() : string
    - public [getUniToolLocalVersionNumber](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getUniToolLocalVersionNumber.md)() : string
    - public [isUniToolOutdated](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/isUniToolOutdated.md)() : bool
    - public [getLocalDependencyMasterPath](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getLocalDependencyMasterPath.md)() : string
    - public [getBaseIndent](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getBaseIndent.md)() : int
    - public [updateUniToolInfo](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/updateUniToolInfo.md)(array $values) : void
    - public [checkUpgrade](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/checkUpgrade.md)(Ling\CliTools\Output\OutputInterface $output) : void
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void
    - protected [onCommandInstantiated](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/onCommandInstantiated.md)([Ling\CliTools\Command\CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) $command) : void
    - protected [getUniToolInfo](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getUniToolInfo.md)() : array

- Inherited methods
    - public [Application::registerCommand](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/registerCommand.md)(string $commandClassName, ?$aliases) : void
    - protected [Application::runProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/runProgram.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int | null
    - public [AbstractProgram::setLogger](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLogger.md)([Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger/blob/master/UniversalLoggerInterface.php) $logger) : void
    - public [AbstractProgram::setLoggerChannel](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLoggerChannel.md)(string $loggerChannel) : void
    - public [AbstractProgram::setErrorIsVerbose](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setErrorIsVerbose.md)(bool $errorIsVerbose) : void
    - public AbstractProgram::setUseExitStatus(bool $useExitStatus) : void

}




Properties
=============

- <span id="property-currentDirectory"><b>currentDirectory</b></span>

    This property holds the currentDirectory for this instance.
    This is the path of the script calling this class.
    
    By default, it's also the application directory,
    unless the application directory is passed explicitly as a [command line option](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md).
    
    

- <span id="property-applicationDir"><b>applicationDir</b></span>

    This property holds the application directory.
    It must be set via the --application-dir option.
    If not set, this will default to the current directory (see $currentDirectory property).
    
    

- <span id="property-confFile"><b>confFile</b></span>

    This property holds the path to the configuration file.
    See the [configuration command](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ConfCommand.md) for more info.
    
    Note: there should be only one configuration file per machine, since there should be only uni tool per machine.
    
    

- <span id="property-infoFile"><b>infoFile</b></span>

    This property holds the path to the uni-tool info file.
    
    

- <span id="property-dependencyMasterConf"><b>dependencyMasterConf</b></span>

    This property holds the dependencyMasterConf for this instance.
    This is a cache for the dependency master array.
    
    

- <span id="property-importers"><b>importers</b></span>

    This property holds an array of the available importers for this instance.
    It's an array of dependencySystemName => DependencySystemImporterInterface.
    
    

- <span id="property-localServer"><b>localServer</b></span>

    This property holds the localServer for this instance.
    It's used as a cache value.
    
    

- <span id="property-baseIndent"><b>baseIndent</b></span>

    This property holds the baseIndent for this instance.
    The base indent is potentially used by all commands which output something to the screen.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    It is used to load importers.
    
    

- <span id="property-commands"><b>commands</b></span>

    This property holds the array of commands for this instance.
    
    It's an array of command alias => command class name.
    
    Note: multiple aliases can reference the same command class name.
    
    

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

- [UniToolApplication::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/__construct.md) &ndash; Builds the UniToolApplication instance.
- [UniToolApplication::getApplicationDir](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getApplicationDir.md) &ndash; Returns a valid application directory.
- [UniToolApplication::getUniverseDependenciesDir](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getUniverseDependenciesDir.md) &ndash; Returns the universe dependencies directory.
- [UniToolApplication::getImporter](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getImporter.md) &ndash; or null if not defined.
- [UniToolApplication::getUniverseDirectory](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getUniverseDirectory.md) &ndash; Returns the location of a valid universe directory.
- [UniToolApplication::checkApplicationDir](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/checkApplicationDir.md) &ndash; Returns the application directory if it actually exists.
- [UniToolApplication::checkUniverseDirectory](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/checkUniverseDirectory.md) &ndash; Returns the universe directory if it actually exists.
- [UniToolApplication::bootUniverse](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/bootUniverse.md) &ndash; Ensure that the universe exists under the current application directory.
- [UniToolApplication::getConfFile](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getConfFile.md) &ndash; Returns the confFile of this instance.
- [UniToolApplication::getConf](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getConf.md) &ndash; Returns the [Uni2 configuration](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-uni2-configuration).
- [UniToolApplication::getConfValue](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getConfValue.md) &ndash; Returns a value from the uni-tool configuration.
- [UniToolApplication::getLocalServer](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getLocalServer.md) &ndash; Returns an instance of the local server.
- [UniToolApplication::copyDependencyMasterFileFromWeb](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/copyDependencyMasterFileFromWeb.md) &ndash; Copies the dependency-master file on the web to the local uni-tool copy's root directory.
- [UniToolApplication::getDependencyMasterConf](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getDependencyMasterConf.md) &ndash; Returns the dependency master array.
- [UniToolApplication::getKnownGalaxies](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getKnownGalaxies.md) &ndash; Returns the galaxies known to the local dependency master array.
- [UniToolApplication::getUniToolWebVersionNumber](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getUniToolWebVersionNumber.md) &ndash; Returns the version number of the uni-tool on the web.
- [UniToolApplication::getUniToolLocalVersionNumber](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getUniToolLocalVersionNumber.md) &ndash; Returns the version number of the uni-tool on this local machine.
- [UniToolApplication::isUniToolOutdated](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/isUniToolOutdated.md) &ndash; Returns whether this uni-tool version is outdated.
- [UniToolApplication::getLocalDependencyMasterPath](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getLocalDependencyMasterPath.md) &ndash; Returns the path to the local dependency-master file.
- [UniToolApplication::getBaseIndent](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getBaseIndent.md) &ndash; Returns the baseIndent of this instance.
- [UniToolApplication::updateUniToolInfo](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/updateUniToolInfo.md) &ndash; Updates the uni tool info with the given $values.
- [UniToolApplication::checkUpgrade](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/checkUpgrade.md) &ndash; and executes the upgrade if this is the case.
- [UniToolApplication::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/run.md) &ndash; Parses general options.
- [UniToolApplication::onCommandInstantiated](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/onCommandInstantiated.md) &ndash; Can decorate the command after it has just been instantiated.
- [UniToolApplication::getUniToolInfo](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getUniToolInfo.md) &ndash; - last_update: the last (mysql) datetime the uni-tool the upgrade command was called.
- [Application::registerCommand](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/registerCommand.md) &ndash; Registers a command with the given aliases.
- [Application::runProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/runProgram.md) &ndash; Runs the program, and returns the exit status.
- [AbstractProgram::setLogger](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLogger.md) &ndash; Sets the logger.
- [AbstractProgram::setLoggerChannel](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLoggerChannel.md) &ndash; Sets the loggerChannel.
- [AbstractProgram::setErrorIsVerbose](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setErrorIsVerbose.md) &ndash; Sets the errorIsVerbose.
- AbstractProgram::setUseExitStatus &ndash; Sets the useExitStatus.





Location
=============
Ling\Uni2\Application\UniToolApplication


SeeAlso
==============
Next class: [CheckCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/CheckCommand.md)<br>
