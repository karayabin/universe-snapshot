[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)



The LightDeveloperWizardBaseCommand class
================
2020-06-30 --> 2021-08-17






Introduction
============

The LightDeveloperWizardBaseCommand class.



Class synopsis
==============


abstract class <span class="pl-k">LightDeveloperWizardBaseCommand</span> implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md), [LightCliCommandInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light_DeveloperWizard\CliTools\Program\LightDeveloperWizardApplication](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Program/LightDeveloperWizardApplication.md) [$application](#property-application) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - private [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) [$output](#property-output) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/__construct.md)() : void
    - abstract protected [doRun](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/doRun.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [setContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [run](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed
    - public [getName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getName.md)() : string
    - public [getDescription](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getDescription.md)() : string
    - public [getAliases](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getAliases.md)() : array
    - public [getFlags](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getFlags.md)() : array
    - public [getOptions](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getOptions.md)() : array
    - public [getParameters](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getParameters.md)() : array
    - public [write](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/write.md)(string $message) : void
    - public [setApplication](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/setApplication.md)([Ling\Light_DeveloperWizard\CliTools\Program\LightDeveloperWizardApplication](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Program/LightDeveloperWizardApplication.md) $application) : void
    - protected [checkInsideAppDir](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/checkInsideAppDir.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : bool
    - protected [writeError](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/writeError.md)(string $message) : void
    - protected [error](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-application"><b>application</b></span>

    This property holds the LightDeveloperWizardApplication instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-output"><b>output</b></span>

    This property holds the output for this instance.
    
    



Methods
==============

- [LightDeveloperWizardBaseCommand::__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/__construct.md) &ndash; Builds the LightDeveloperWizardBaseCommand instance.
- [LightDeveloperWizardBaseCommand::doRun](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/doRun.md) &ndash; Runs the command.
- [LightDeveloperWizardBaseCommand::setContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/setContainer.md) &ndash; Sets the light service container interface.
- [LightDeveloperWizardBaseCommand::run](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/run.md) &ndash; Runs the command.
- [LightDeveloperWizardBaseCommand::getName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getName.md) &ndash; Returns the name of the command.
- [LightDeveloperWizardBaseCommand::getDescription](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getDescription.md) &ndash; Returns the description of the command.
- [LightDeveloperWizardBaseCommand::getAliases](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getAliases.md) &ndash; Returns the aliases used by this command.
- [LightDeveloperWizardBaseCommand::getFlags](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getFlags.md) &ndash; Returns the array of flags available for this command, which form is name => description.
- [LightDeveloperWizardBaseCommand::getOptions](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getOptions.md) &ndash; Returns the array of available options for this command, which form is name => optionItem.
- [LightDeveloperWizardBaseCommand::getParameters](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getParameters.md) &ndash; Returns the parameters available for this command.
- [LightDeveloperWizardBaseCommand::write](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/write.md) &ndash; Writes a message to the output.
- [LightDeveloperWizardBaseCommand::setApplication](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/setApplication.md) &ndash; Sets the application.
- [LightDeveloperWizardBaseCommand::checkInsideAppDir](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/checkInsideAppDir.md) &ndash; Returns whether the current working directory is a correct universe application (i.e.
- [LightDeveloperWizardBaseCommand::writeError](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/writeError.md) &ndash; Writes an error message to the output.
- [LightDeveloperWizardBaseCommand::error](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_DeveloperWizard\CliTools\Command\LightDeveloperWizardBaseCommand<br>
See the source code of [Ling\Light_DeveloperWizard\CliTools\Command\LightDeveloperWizardBaseCommand](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/CliTools/Command/LightDeveloperWizardBaseCommand.php)



SeeAlso
==============
Previous class: [HelpCommand](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/HelpCommand.md)<br>Next class: [LightDeveloperWizardApplication](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Program/LightDeveloperWizardApplication.md)<br>
