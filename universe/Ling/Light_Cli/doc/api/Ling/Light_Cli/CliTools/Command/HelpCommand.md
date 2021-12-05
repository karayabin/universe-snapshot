[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)



The HelpCommand class
================
2021-01-07 --> 2021-05-31






Introduction
============

The HelpCommand class.
This command will display the help to the user.



Class synopsis
==============


class <span class="pl-k">HelpCommand</span> extends [LightCliDocCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand.md) implements [LightCliCommandInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightCliDocCommand::$container](#property-container) ;
    - protected [Ling\Light_Cli\CliTools\Program\LightCliApplication](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication.md) [LightCliDocCommand::$application](#property-application) ;
    - protected [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) [LightCliDocCommand::$output](#property-output) ;

- Methods
    - protected [doRun](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/HelpCommand/doRun.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [getDescription](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/HelpCommand/getDescription.md)() : string

- Inherited methods
    - public [LightCliDocCommand::__construct](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/__construct.md)() : void
    - public [LightCliDocCommand::setContainer](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [LightCliDocCommand::run](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/run.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed
    - public [LightCliDocCommand::getName](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getName.md)() : string
    - public [LightCliDocCommand::getAliases](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getAliases.md)() : array
    - public [LightCliDocCommand::getFlags](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getFlags.md)() : array
    - public [LightCliDocCommand::getOptions](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getOptions.md)() : array
    - public [LightCliDocCommand::getParameters](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getParameters.md)() : array
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

- [HelpCommand::doRun](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/HelpCommand/doRun.md) &ndash; Runs the command.
- [HelpCommand::getDescription](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/HelpCommand/getDescription.md) &ndash; Returns the description of the command.
- [LightCliDocCommand::__construct](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/__construct.md) &ndash; Builds the LightCliBaseCommand instance.
- [LightCliDocCommand::setContainer](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/setContainer.md) &ndash; Sets the light service container interface.
- [LightCliDocCommand::run](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/run.md) &ndash; Runs the command.
- [LightCliDocCommand::getName](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getName.md) &ndash; Returns the name of the command.
- [LightCliDocCommand::getAliases](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getAliases.md) &ndash; Returns the aliases used by this command.
- [LightCliDocCommand::getFlags](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getFlags.md) &ndash; Returns the array of flags available for this command, which form is name => description.
- [LightCliDocCommand::getOptions](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getOptions.md) &ndash; Returns the array of available options for this command, which form is name => optionItem.
- [LightCliDocCommand::getParameters](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getParameters.md) &ndash; Returns the parameters available for this command.
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
Ling\Light_Cli\CliTools\Command\HelpCommand<br>
See the source code of [Ling\Light_Cli\CliTools\Command\HelpCommand](https://github.com/lingtalfi/Light_Cli/blob/master/CliTools/Command/HelpCommand.php)



SeeAlso
==============
Previous class: [EnableServiceCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/EnableServiceCommand.md)<br>Next class: [LightCliBaseCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand.md)<br>
