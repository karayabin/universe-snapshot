[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)



The ListCommand class
================
2021-01-07 --> 2021-02-15






Introduction
============

The ListCommand class.
This command will display the list of all registered appId-command and/or aliases.



Class synopsis
==============


class <span class="pl-k">ListCommand</span> extends [LightCliBaseCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightCliBaseCommand::$container](#property-container) ;
    - protected [Ling\Light_Cli\CliTools\Program\LightCliApplication](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication.md) [LightCliBaseCommand::$application](#property-application) ;
    - protected [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) [LightCliBaseCommand::$output](#property-output) ;

- Methods
    - protected [doRun](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/ListCommand/doRun.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void

- Inherited methods
    - public [LightCliBaseCommand::__construct](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/__construct.md)() : void
    - public [LightCliBaseCommand::setContainer](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [LightCliBaseCommand::run](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed
    - public [LightCliBaseCommand::setApplication](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/setApplication.md)([Ling\Light_Cli\CliTools\Program\LightCliApplication](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication.md) $application) : void
    - protected [LightCliBaseCommand::debugMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/debugMsg.md)(string $msg) : void
    - protected [LightCliBaseCommand::warningMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/warningMsg.md)(string $msg) : void
    - protected [LightCliBaseCommand::infoMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/infoMsg.md)(string $msg) : void
    - protected [LightCliBaseCommand::successMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/successMsg.md)(string $msg) : void
    - protected [LightCliBaseCommand::errorMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/errorMsg.md)(string $msg) : void
    - protected [LightCliBaseCommand::msg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/msg.md)(string $msg) : void
    - protected [LightCliBaseCommand::error](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/error.md)(string $msg) : void

}






Methods
==============

- [ListCommand::doRun](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/ListCommand/doRun.md) &ndash; Runs the command.
- [LightCliBaseCommand::__construct](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/__construct.md) &ndash; Builds the LightCliBaseCommand instance.
- [LightCliBaseCommand::setContainer](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/setContainer.md) &ndash; Sets the light service container interface.
- [LightCliBaseCommand::run](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/run.md) &ndash; Runs the command.
- [LightCliBaseCommand::setApplication](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/setApplication.md) &ndash; Sets the application.
- [LightCliBaseCommand::debugMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/debugMsg.md) &ndash; Writes a debug message to the current output.
- [LightCliBaseCommand::warningMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/warningMsg.md) &ndash; Writes a warning message to the current output.
- [LightCliBaseCommand::infoMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/infoMsg.md) &ndash; Writes an info message to the current output.
- [LightCliBaseCommand::successMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/successMsg.md) &ndash; Writes a success message to the current output.
- [LightCliBaseCommand::errorMsg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/errorMsg.md) &ndash; Writes an error message to the current output.
- [LightCliBaseCommand::msg](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/msg.md) &ndash; Writes the given message to the current output.
- [LightCliBaseCommand::error](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Cli\CliTools\Command\ListCommand<br>
See the source code of [Ling\Light_Cli\CliTools\Command\ListCommand](https://github.com/lingtalfi/Light_Cli/blob/master/CliTools/Command/ListCommand.php)



SeeAlso
==============
Previous class: [LightCliBaseCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliBaseCommand.md)<br>Next class: [RoutesCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/RoutesCommand.md)<br>
