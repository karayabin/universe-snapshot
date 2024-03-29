[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The ImportCommand class
================
2020-12-08 --> 2021-07-08






Introduction
============

The ImportCommand class.



Class synopsis
==============


class <span class="pl-k">ImportCommand</span> extends [LightPlanetInstallerBaseCommand](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightCliCommandInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface.md), [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md) [LightPlanetInstallerBaseCommand::$application](#property-application) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightPlanetInstallerBaseCommand::$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/__construct.md)() : void
    - protected [doRun](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/doRun.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - protected [doTheImport](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/doTheImport.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : string | false
    - public [getDescription](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/getDescription.md)() : string
    - public [getParameters](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/getParameters.md)() : array
    - public [getOptions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/getOptions.md)() : array
    - public [getFlags](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/getFlags.md)() : array
    - public [getAliases](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/getAliases.md)() : array

- Inherited methods
    - public [LightPlanetInstallerBaseCommand::setContainer](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [LightPlanetInstallerBaseCommand::run](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed
    - public [LightPlanetInstallerBaseCommand::getName](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/getName.md)() : string
    - public [LightPlanetInstallerBaseCommand::write](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/write.md)(string $message) : void
    - public [LightPlanetInstallerBaseCommand::setApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/setApplication.md)([Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md) $application) : void
    - protected [LightPlanetInstallerBaseCommand::checkInsideAppDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/checkInsideAppDir.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : bool
    - protected [LightPlanetInstallerBaseCommand::writeError](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/writeError.md)(string $message) : void
    - protected [LightPlanetInstallerBaseCommand::error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/error.md)(string $msg, ?int $code = null) : void

}






Methods
==============

- [ImportCommand::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/__construct.md) &ndash; Builds the ImportCommand instance.
- [ImportCommand::doRun](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/doRun.md) &ndash; Runs the command.
- [ImportCommand::doTheImport](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/doTheImport.md) &ndash; Executes the import algorithm, and returns the "session dir" path.
- [ImportCommand::getDescription](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/getDescription.md) &ndash; Returns the description of the command.
- [ImportCommand::getParameters](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/getParameters.md) &ndash; Returns the parameters available for this command.
- [ImportCommand::getOptions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/getOptions.md) &ndash; Returns the array of available options for this command, which form is name => optionItem.
- [ImportCommand::getFlags](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/getFlags.md) &ndash; Returns the array of flags available for this command, which form is name => description.
- [ImportCommand::getAliases](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportCommand/getAliases.md) &ndash; Returns the aliases used by this command.
- [LightPlanetInstallerBaseCommand::setContainer](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/setContainer.md) &ndash; Sets the light service container interface.
- [LightPlanetInstallerBaseCommand::run](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/run.md) &ndash; Runs the command.
- [LightPlanetInstallerBaseCommand::getName](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/getName.md) &ndash; Returns the name of the command.
- [LightPlanetInstallerBaseCommand::write](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/write.md) &ndash; Writes a message to the output.
- [LightPlanetInstallerBaseCommand::setApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/setApplication.md) &ndash; Sets the application.
- [LightPlanetInstallerBaseCommand::checkInsideAppDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/checkInsideAppDir.md) &ndash; Returns whether the current working directory is a correct universe application (i.e.
- [LightPlanetInstallerBaseCommand::writeError](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/writeError.md) &ndash; Writes an error message to the output.
- [LightPlanetInstallerBaseCommand::error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/LightPlanetInstallerBaseCommand/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_PlanetInstaller\CliTools\Command\ImportCommand<br>
See the source code of [Ling\Light_PlanetInstaller\CliTools\Command\ImportCommand](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Command/ImportCommand.php)



SeeAlso
==============
Previous class: [HelpCommand](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/HelpCommand.md)<br>Next class: [ImportLingUniverseCommand](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/ImportLingUniverseCommand.md)<br>
