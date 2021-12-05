[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The ExploreConflictsCommand class
================
2020-12-08 --> 2021-07-08






Introduction
============

The ExploreConflictsCommand class.



Class synopsis
==============


class <span class="pl-k">ExploreConflictsCommand</span> extends [LightPlanetInstallerBaseCommand](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightCliCommandInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface.md), [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - private [Ling\Light_PlanetInstaller\Util\TimConflictsReader](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/TimConflictsReader.md) [$reader](#property-reader) ;

- Inherited properties
    - protected [Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md) [LightPlanetInstallerBaseCommand::$application](#property-application) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightPlanetInstallerBaseCommand::$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/__construct.md)() : void
    - protected [doRun](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/doRun.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [getDescription](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/getDescription.md)() : string
    - public [getParameters](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/getParameters.md)() : array
    - private [stepMain](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/stepMain.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void
    - private [stepConflictDetail](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/stepConflictDetail.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, string $planetDotName, ?array $options = []) : void
    - private [stepQuit](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/stepQuit.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - private [banner](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/banner.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void

- Inherited methods
    - public [LightPlanetInstallerBaseCommand::setContainer](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [LightPlanetInstallerBaseCommand::run](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed
    - public [LightPlanetInstallerBaseCommand::getName](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/getName.md)() : string
    - public [LightPlanetInstallerBaseCommand::getAliases](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/getAliases.md)() : array
    - public [LightPlanetInstallerBaseCommand::getFlags](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/getFlags.md)() : array
    - public [LightPlanetInstallerBaseCommand::getOptions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/getOptions.md)() : array
    - public [LightPlanetInstallerBaseCommand::write](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/write.md)(string $message) : void
    - public [LightPlanetInstallerBaseCommand::setApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/setApplication.md)([Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md) $application) : void
    - protected [LightPlanetInstallerBaseCommand::checkInsideAppDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/checkInsideAppDir.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : bool
    - protected [LightPlanetInstallerBaseCommand::writeError](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/writeError.md)(string $message) : void
    - protected [LightPlanetInstallerBaseCommand::error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-reader"><b>reader</b></span>

    This property holds the reader for this instance.
    
    

- <span id="property-application"><b>application</b></span>

    This property holds the LightPlanetInstallerApplication instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [ExploreConflictsCommand::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/__construct.md) &ndash; Builds the ExploreConflictsCommand instance.
- [ExploreConflictsCommand::doRun](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/doRun.md) &ndash; Runs the command.
- [ExploreConflictsCommand::getDescription](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/getDescription.md) &ndash; Returns the description of the command.
- [ExploreConflictsCommand::getParameters](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/getParameters.md) &ndash; Returns the parameters available for this command.
- [ExploreConflictsCommand::stepMain](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/stepMain.md) &ndash; Prints the main step gui.
- [ExploreConflictsCommand::stepConflictDetail](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/stepConflictDetail.md) &ndash; Prints the details of a conflictual step.
- [ExploreConflictsCommand::stepQuit](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/stepQuit.md) &ndash; Prints a quit message.
- [ExploreConflictsCommand::banner](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ExploreConflictsCommand/banner.md) &ndash; Prints a banner to the output.
- [LightPlanetInstallerBaseCommand::setContainer](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/setContainer.md) &ndash; Sets the light service container interface.
- [LightPlanetInstallerBaseCommand::run](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/run.md) &ndash; Runs the command.
- [LightPlanetInstallerBaseCommand::getName](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/getName.md) &ndash; Returns the name of the command.
- [LightPlanetInstallerBaseCommand::getAliases](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/getAliases.md) &ndash; Returns the aliases used by this command.
- [LightPlanetInstallerBaseCommand::getFlags](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/getFlags.md) &ndash; Returns the array of flags available for this command, which form is name => description.
- [LightPlanetInstallerBaseCommand::getOptions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/getOptions.md) &ndash; Returns the array of available options for this command, which form is name => optionItem.
- [LightPlanetInstallerBaseCommand::write](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/write.md) &ndash; Writes a message to the output.
- [LightPlanetInstallerBaseCommand::setApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/setApplication.md) &ndash; Sets the application.
- [LightPlanetInstallerBaseCommand::checkInsideAppDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/checkInsideAppDir.md) &ndash; Returns whether the current working directory is a correct universe application (i.e.
- [LightPlanetInstallerBaseCommand::writeError](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/writeError.md) &ndash; Writes an error message to the output.
- [LightPlanetInstallerBaseCommand::error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_PlanetInstaller\CliTools\Command\ExploreConflictsCommand<br>
See the source code of [Ling\Light_PlanetInstaller\CliTools\Command\ExploreConflictsCommand](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Command/ExploreConflictsCommand.php)



SeeAlso
==============
Previous class: [DebugSessionDirCommand](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/DebugSessionDirCommand.md)<br>Next class: [HelpCommand](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/HelpCommand.md)<br>
