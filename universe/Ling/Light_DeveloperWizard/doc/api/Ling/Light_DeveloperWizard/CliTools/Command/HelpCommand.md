[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)



The HelpCommand class
================
2020-06-30 --> 2021-08-17






Introduction
============

The HelpCommand class.
This command will display the help to the user.



Class synopsis
==============


class <span class="pl-k">HelpCommand</span> extends [LightDeveloperWizardBaseCommand](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightCliCommandInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface.md), [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Light_DeveloperWizard\CliTools\Program\LightDeveloperWizardApplication](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Program/LightDeveloperWizardApplication.md) [LightDeveloperWizardBaseCommand::$application](#property-application) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightDeveloperWizardBaseCommand::$container](#property-container) ;

- Methods
    - protected [doRun](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/HelpCommand/doRun.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [getDescription](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/HelpCommand/getDescription.md)() : string
    - public [getFlags](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/HelpCommand/getFlags.md)() : array

- Inherited methods
    - public [LightDeveloperWizardBaseCommand::__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/__construct.md)() : void
    - public [LightDeveloperWizardBaseCommand::setContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [LightDeveloperWizardBaseCommand::run](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed
    - public [LightDeveloperWizardBaseCommand::getName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getName.md)() : string
    - public [LightDeveloperWizardBaseCommand::getAliases](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getAliases.md)() : array
    - public [LightDeveloperWizardBaseCommand::getOptions](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getOptions.md)() : array
    - public [LightDeveloperWizardBaseCommand::getParameters](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getParameters.md)() : array
    - public [LightDeveloperWizardBaseCommand::write](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/write.md)(string $message) : void
    - public [LightDeveloperWizardBaseCommand::setApplication](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/setApplication.md)([Ling\Light_DeveloperWizard\CliTools\Program\LightDeveloperWizardApplication](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Program/LightDeveloperWizardApplication.md) $application) : void
    - protected [LightDeveloperWizardBaseCommand::checkInsideAppDir](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/checkInsideAppDir.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : bool
    - protected [LightDeveloperWizardBaseCommand::writeError](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/writeError.md)(string $message) : void
    - protected [LightDeveloperWizardBaseCommand::error](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/error.md)(string $msg, ?int $code = null) : void

}






Methods
==============

- [HelpCommand::doRun](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/HelpCommand/doRun.md) &ndash; Runs the command.
- [HelpCommand::getDescription](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/HelpCommand/getDescription.md) &ndash; Returns the description of the command.
- [HelpCommand::getFlags](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/HelpCommand/getFlags.md) &ndash; Returns the array of flags available for this command, which form is name => description.
- [LightDeveloperWizardBaseCommand::__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/__construct.md) &ndash; Builds the LightDeveloperWizardBaseCommand instance.
- [LightDeveloperWizardBaseCommand::setContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/setContainer.md) &ndash; Sets the light service container interface.
- [LightDeveloperWizardBaseCommand::run](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/run.md) &ndash; Runs the command.
- [LightDeveloperWizardBaseCommand::getName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getName.md) &ndash; Returns the name of the command.
- [LightDeveloperWizardBaseCommand::getAliases](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getAliases.md) &ndash; Returns the aliases used by this command.
- [LightDeveloperWizardBaseCommand::getOptions](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getOptions.md) &ndash; Returns the array of available options for this command, which form is name => optionItem.
- [LightDeveloperWizardBaseCommand::getParameters](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getParameters.md) &ndash; Returns the parameters available for this command.
- [LightDeveloperWizardBaseCommand::write](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/write.md) &ndash; Writes a message to the output.
- [LightDeveloperWizardBaseCommand::setApplication](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/setApplication.md) &ndash; Sets the application.
- [LightDeveloperWizardBaseCommand::checkInsideAppDir](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/checkInsideAppDir.md) &ndash; Returns whether the current working directory is a correct universe application (i.e.
- [LightDeveloperWizardBaseCommand::writeError](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/writeError.md) &ndash; Writes an error message to the output.
- [LightDeveloperWizardBaseCommand::error](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_DeveloperWizard\CliTools\Command\HelpCommand<br>
See the source code of [Ling\Light_DeveloperWizard\CliTools\Command\HelpCommand](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/CliTools/Command/HelpCommand.php)



SeeAlso
==============
Previous class: [CreateControllerCommand](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/CreateControllerCommand.md)<br>Next class: [LightDeveloperWizardBaseCommand](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand.md)<br>
