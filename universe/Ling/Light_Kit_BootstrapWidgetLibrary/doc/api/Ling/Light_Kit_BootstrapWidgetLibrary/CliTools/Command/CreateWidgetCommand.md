[Back to the Ling/Light_Kit_BootstrapWidgetLibrary api](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary.md)



The CreateWidgetCommand class
================
2019-04-26 --> 2021-06-28






Introduction
============

The CreateWidgetCommand class.



Class synopsis
==============


class <span class="pl-k">CreateWidgetCommand</span> extends [LightKitBootstrapWidgetLibraryBaseCommand](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightCliCommandInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface.md), [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Program\LightKitBootstrapWidgetLibraryApplication](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Program/LightKitBootstrapWidgetLibraryApplication.md) [LightKitBootstrapWidgetLibraryBaseCommand::$application](#property-application) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitBootstrapWidgetLibraryBaseCommand::$container](#property-container) ;

- Methods
    - protected [doRun](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/CreateWidgetCommand/doRun.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [getDescription](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/CreateWidgetCommand/getDescription.md)() : string
    - public [getParameters](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/CreateWidgetCommand/getParameters.md)() : array
    - public [getAliases](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/CreateWidgetCommand/getAliases.md)() : array

- Inherited methods
    - public [LightKitBootstrapWidgetLibraryBaseCommand::__construct](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/__construct.md)() : void
    - public [LightKitBootstrapWidgetLibraryBaseCommand::setContainer](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [LightKitBootstrapWidgetLibraryBaseCommand::run](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed
    - public [LightKitBootstrapWidgetLibraryBaseCommand::getName](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getName.md)() : string
    - public [LightKitBootstrapWidgetLibraryBaseCommand::getFlags](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getFlags.md)() : array
    - public [LightKitBootstrapWidgetLibraryBaseCommand::getOptions](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getOptions.md)() : array
    - public [LightKitBootstrapWidgetLibraryBaseCommand::write](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/write.md)(string $message) : void
    - public [LightKitBootstrapWidgetLibraryBaseCommand::setApplication](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/setApplication.md)([Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Program\LightKitBootstrapWidgetLibraryApplication](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Program/LightKitBootstrapWidgetLibraryApplication.md) $application) : void
    - protected [LightKitBootstrapWidgetLibraryBaseCommand::checkInsideAppDir](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/checkInsideAppDir.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : bool
    - protected [LightKitBootstrapWidgetLibraryBaseCommand::writeError](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/writeError.md)(string $message) : void
    - protected [LightKitBootstrapWidgetLibraryBaseCommand::error](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/error.md)(string $msg, ?int $code = null) : void

}






Methods
==============

- [CreateWidgetCommand::doRun](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/CreateWidgetCommand/doRun.md) &ndash; Runs the command.
- [CreateWidgetCommand::getDescription](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/CreateWidgetCommand/getDescription.md) &ndash; Returns the description of the command.
- [CreateWidgetCommand::getParameters](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/CreateWidgetCommand/getParameters.md) &ndash; Returns the parameters available for this command.
- [CreateWidgetCommand::getAliases](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/CreateWidgetCommand/getAliases.md) &ndash; Returns the aliases used by this command.
- [LightKitBootstrapWidgetLibraryBaseCommand::__construct](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/__construct.md) &ndash; Builds the LightKitBootstrapWidgetLibraryBaseCommand instance.
- [LightKitBootstrapWidgetLibraryBaseCommand::setContainer](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/setContainer.md) &ndash; Sets the light service container interface.
- [LightKitBootstrapWidgetLibraryBaseCommand::run](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/run.md) &ndash; Runs the command.
- [LightKitBootstrapWidgetLibraryBaseCommand::getName](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getName.md) &ndash; Returns the name of the command.
- [LightKitBootstrapWidgetLibraryBaseCommand::getFlags](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getFlags.md) &ndash; Returns the array of flags available for this command, which form is name => description.
- [LightKitBootstrapWidgetLibraryBaseCommand::getOptions](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getOptions.md) &ndash; Returns the array of available options for this command, which form is name => optionItem.
- [LightKitBootstrapWidgetLibraryBaseCommand::write](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/write.md) &ndash; Writes a message to the output.
- [LightKitBootstrapWidgetLibraryBaseCommand::setApplication](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/setApplication.md) &ndash; Sets the application.
- [LightKitBootstrapWidgetLibraryBaseCommand::checkInsideAppDir](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/checkInsideAppDir.md) &ndash; Returns whether the current working directory is a correct universe application (i.e.
- [LightKitBootstrapWidgetLibraryBaseCommand::writeError](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/writeError.md) &ndash; Writes an error message to the output.
- [LightKitBootstrapWidgetLibraryBaseCommand::error](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Command\CreateWidgetCommand<br>
See the source code of [Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Command\CreateWidgetCommand](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/CliTools/Command/CreateWidgetCommand.php)



SeeAlso
==============
Next class: [HelpCommand](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/HelpCommand.md)<br>
