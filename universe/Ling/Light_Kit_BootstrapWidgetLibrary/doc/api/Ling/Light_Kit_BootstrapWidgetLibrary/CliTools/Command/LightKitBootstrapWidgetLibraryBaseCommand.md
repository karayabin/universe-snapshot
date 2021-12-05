[Back to the Ling/Light_Kit_BootstrapWidgetLibrary api](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary.md)



The LightKitBootstrapWidgetLibraryBaseCommand class
================
2019-04-26 --> 2021-06-28






Introduction
============

The LightKitBootstrapWidgetLibraryBaseCommand class.



Class synopsis
==============


abstract class <span class="pl-k">LightKitBootstrapWidgetLibraryBaseCommand</span> implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md), [LightCliCommandInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Program\LightKitBootstrapWidgetLibraryApplication](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Program/LightKitBootstrapWidgetLibraryApplication.md) [$application](#property-application) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - private [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) [$output](#property-output) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/__construct.md)() : void
    - abstract protected [doRun](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/doRun.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [run](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed
    - public [getName](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getName.md)() : string
    - public [getDescription](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getDescription.md)() : string
    - public [getAliases](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getAliases.md)() : array
    - public [getFlags](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getFlags.md)() : array
    - public [getOptions](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getOptions.md)() : array
    - public [getParameters](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getParameters.md)() : array
    - public [write](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/write.md)(string $message) : void
    - public [setApplication](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/setApplication.md)([Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Program\LightKitBootstrapWidgetLibraryApplication](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Program/LightKitBootstrapWidgetLibraryApplication.md) $application) : void
    - protected [checkInsideAppDir](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/checkInsideAppDir.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : bool
    - protected [writeError](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/writeError.md)(string $message) : void
    - protected [error](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-application"><b>application</b></span>

    This property holds the LightKitBootstrapWidgetLibraryApplication instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-output"><b>output</b></span>

    This property holds the output for this instance.
    
    



Methods
==============

- [LightKitBootstrapWidgetLibraryBaseCommand::__construct](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/__construct.md) &ndash; Builds the LightKitBootstrapWidgetLibraryBaseCommand instance.
- [LightKitBootstrapWidgetLibraryBaseCommand::doRun](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/doRun.md) &ndash; Runs the command.
- [LightKitBootstrapWidgetLibraryBaseCommand::setContainer](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/setContainer.md) &ndash; Sets the light service container interface.
- [LightKitBootstrapWidgetLibraryBaseCommand::run](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/run.md) &ndash; Runs the command.
- [LightKitBootstrapWidgetLibraryBaseCommand::getName](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getName.md) &ndash; Returns the name of the command.
- [LightKitBootstrapWidgetLibraryBaseCommand::getDescription](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getDescription.md) &ndash; Returns the description of the command.
- [LightKitBootstrapWidgetLibraryBaseCommand::getAliases](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getAliases.md) &ndash; Returns the aliases used by this command.
- [LightKitBootstrapWidgetLibraryBaseCommand::getFlags](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getFlags.md) &ndash; Returns the array of flags available for this command, which form is name => description.
- [LightKitBootstrapWidgetLibraryBaseCommand::getOptions](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getOptions.md) &ndash; Returns the array of available options for this command, which form is name => optionItem.
- [LightKitBootstrapWidgetLibraryBaseCommand::getParameters](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getParameters.md) &ndash; Returns the parameters available for this command.
- [LightKitBootstrapWidgetLibraryBaseCommand::write](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/write.md) &ndash; Writes a message to the output.
- [LightKitBootstrapWidgetLibraryBaseCommand::setApplication](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/setApplication.md) &ndash; Sets the application.
- [LightKitBootstrapWidgetLibraryBaseCommand::checkInsideAppDir](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/checkInsideAppDir.md) &ndash; Returns whether the current working directory is a correct universe application (i.e.
- [LightKitBootstrapWidgetLibraryBaseCommand::writeError](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/writeError.md) &ndash; Writes an error message to the output.
- [LightKitBootstrapWidgetLibraryBaseCommand::error](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Command\LightKitBootstrapWidgetLibraryBaseCommand<br>
See the source code of [Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Command\LightKitBootstrapWidgetLibraryBaseCommand](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand.php)



SeeAlso
==============
Previous class: [HelpCommand](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/HelpCommand.md)<br>Next class: [LightKitBootstrapWidgetLibraryApplication](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Program/LightKitBootstrapWidgetLibraryApplication.md)<br>
