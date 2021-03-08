[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)



The CreateAppCommand class
================
2021-01-07 --> 2021-03-05






Introduction
============

The CreateAppCommand



Class synopsis
==============


class <span class="pl-k">CreateAppCommand</span> extends [LightCliDocCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand.md) implements [LightCliCommandInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightCliDocCommand::$container](#property-container) ;
    - protected [Ling\Light_Cli\CliTools\Program\LightCliApplication](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication.md) [LightCliDocCommand::$application](#property-application) ;
    - protected [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) [LightCliDocCommand::$output](#property-output) ;

- Methods
    - protected [doRun](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/CreateAppCommand/doRun.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [getDescription](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/CreateAppCommand/getDescription.md)() : string
    - public [getParameters](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/CreateAppCommand/getParameters.md)() : array
    - public [getFlags](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/CreateAppCommand/getFlags.md)() : array
    - public [getAliases](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/CreateAppCommand/getAliases.md)() : array

- Inherited methods
    - public [LightCliDocCommand::__construct](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/__construct.md)() : void
    - public [LightCliDocCommand::setContainer](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [LightCliDocCommand::run](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/run.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed
    - public [LightCliDocCommand::getName](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getName.md)() : string
    - public [LightCliDocCommand::getOptions](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getOptions.md)() : array
    - public [LightCliDocCommand::setApplication](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/setApplication.md)([Ling\Light_Cli\CliTools\Program\LightCliApplication](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication.md) $application) : void
    - protected [LightCliDocCommand::debugMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/debugMsg.md)(string $msg) : void
    - protected [LightCliDocCommand::warningMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/warningMsg.md)(string $msg) : void
    - protected [LightCliDocCommand::infoMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/infoMsg.md)(string $msg) : void
    - protected [LightCliDocCommand::successMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/successMsg.md)(string $msg) : void
    - protected [LightCliDocCommand::errorMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/errorMsg.md)(string $msg) : void
    - protected [LightCliDocCommand::msg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/msg.md)(string $msg) : void
    - protected [LightCliDocCommand::error](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/error.md)(string $msg) : void

}






Methods
==============

- [CreateAppCommand::doRun](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/CreateAppCommand/doRun.md) &ndash; Runs the command.
- [CreateAppCommand::getDescription](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/CreateAppCommand/getDescription.md) &ndash; Returns the description of the command.
- [CreateAppCommand::getParameters](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/CreateAppCommand/getParameters.md) &ndash; Returns the parameters available for this command.
- [CreateAppCommand::getFlags](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/CreateAppCommand/getFlags.md) &ndash; Returns the array of flags available for this command, which form is name => description.
- [CreateAppCommand::getAliases](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/CreateAppCommand/getAliases.md) &ndash; Returns the aliases used by this command.
- [LightCliDocCommand::__construct](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/__construct.md) &ndash; Builds the LightCliBaseCommand instance.
- [LightCliDocCommand::setContainer](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/setContainer.md) &ndash; Sets the light service container interface.
- [LightCliDocCommand::run](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/run.md) &ndash; Runs the command.
- [LightCliDocCommand::getName](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getName.md) &ndash; Returns the name of the command.
- [LightCliDocCommand::getOptions](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getOptions.md) &ndash; Returns the array of available options for this command, which form is name => optionItem.
- [LightCliDocCommand::setApplication](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/setApplication.md) &ndash; Sets the application.
- [LightCliDocCommand::debugMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/debugMsg.md) &ndash; Writes a debug message to the current output.
- [LightCliDocCommand::warningMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/warningMsg.md) &ndash; Writes a warning message to the current output.
- [LightCliDocCommand::infoMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/infoMsg.md) &ndash; Writes an info message to the current output.
- [LightCliDocCommand::successMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/successMsg.md) &ndash; Writes a success message to the current output.
- [LightCliDocCommand::errorMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/errorMsg.md) &ndash; Writes an error message to the current output.
- [LightCliDocCommand::msg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/msg.md) &ndash; Writes the given message to the current output.
- [LightCliDocCommand::error](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Cli\CliTools\Command\CreateAppCommand<br>
See the source code of [Ling\Light_Cli\CliTools\Command\CreateAppCommand](https://github.com/lingtalfi/Light_Cli/blob/master/CliTools/Command/CreateAppCommand.php)



SeeAlso
==============
Previous class: [CommandsCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/CommandsCommand.md)<br>Next class: [HelpCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/HelpCommand.md)<br>
