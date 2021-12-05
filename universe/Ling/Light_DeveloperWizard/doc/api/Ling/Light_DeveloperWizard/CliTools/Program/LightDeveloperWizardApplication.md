[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)



The LightDeveloperWizardApplication class
================
2020-06-30 --> 2021-08-17






Introduction
============

The LightDeveloperWizardApplication class.


Nomenclature
----------------

### planetInfo
The planetInfo array is an array with the following structure:

- 0: planet path     (string)
- 1: galaxy name     (string)
- 2: planet name     (string)
- 3: real version number  (string)



Class synopsis
==============


class <span class="pl-k">LightDeveloperWizardApplication</span> extends [LightCliBaseApplication](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliBaseApplication.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightCliApplicationInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplicationInterface.md), [ProgramInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightCliBaseApplication::$container](#property-container) ;
    - protected array [Application::$commands](#property-commands) ;
    - protected string [Application::$defaultCommandAlias](#property-defaultCommandAlias) ;
    - protected [Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger/blob/master/doc/api/Ling/UniversalLogger/UniversalLoggerInterface.md) [AbstractProgram::$logger](#property-logger) ;
    - protected string [AbstractProgram::$loggerChannel](#property-loggerChannel) ;
    - protected bool [AbstractProgram::$errorIsVerbose](#property-errorIsVerbose) ;
    - protected bool [AbstractProgram::$useExitStatus](#property-useExitStatus) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Program/LightDeveloperWizardApplication/__construct.md)() : void
    - public [getAppId](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Program/LightDeveloperWizardApplication/getAppId.md)() : string
    - protected [onCommandInstantiated](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Program/LightDeveloperWizardApplication/onCommandInstantiated.md)([Ling\CliTools\Command\CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) $command) : void
    - private [error](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Program/LightDeveloperWizardApplication/error.md)(string $msg, ?int $code = null) : void

- Inherited methods
    - public LightCliBaseApplication::getCommands() : [LightCliCommandInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface.md)
    - public LightCliBaseApplication::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public Application::registerCommand(string $commandClassName, $aliases) : void
    - protected Application::runProgram(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed
    - protected Application::onCommandNotFound(string $commandAlias, Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public AbstractProgram::setLogger([Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger/blob/master/doc/api/Ling/UniversalLogger/UniversalLoggerInterface.md) $logger) : void
    - public AbstractProgram::setLoggerChannel(string $loggerChannel) : void
    - public AbstractProgram::setErrorIsVerbose(bool $errorIsVerbose) : void
    - public AbstractProgram::setUseExitStatus(bool $useExitStatus) : void
    - public AbstractProgram::run(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed | void

}






Methods
==============

- [LightDeveloperWizardApplication::__construct](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Program/LightDeveloperWizardApplication/__construct.md) &ndash; Builds the Application instance.
- [LightDeveloperWizardApplication::getAppId](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Program/LightDeveloperWizardApplication/getAppId.md) &ndash; Returns the appId of the application.
- [LightDeveloperWizardApplication::onCommandInstantiated](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Program/LightDeveloperWizardApplication/onCommandInstantiated.md) &ndash; Can decorate the command after it has just been instantiated.
- [LightDeveloperWizardApplication::error](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Program/LightDeveloperWizardApplication/error.md) &ndash; Throws an exception.
- LightCliBaseApplication::getCommands &ndash; Returns the array of commands provided by the application.
- LightCliBaseApplication::setContainer &ndash; Sets the light service container interface.
- Application::registerCommand &ndash; Registers a command with the given aliases.
- Application::runProgram &ndash; Runs the program, and returns the exit status.
- Application::onCommandNotFound &ndash; Hook called if a command was not found.
- AbstractProgram::setLogger &ndash; Sets the logger.
- AbstractProgram::setLoggerChannel &ndash; Sets the loggerChannel.
- AbstractProgram::setErrorIsVerbose &ndash; Sets the errorIsVerbose.
- AbstractProgram::setUseExitStatus &ndash; Sets the useExitStatus.
- AbstractProgram::run &ndash; Executes the program, and returns the exit code, if defined by the concrete class.





Location
=============
Ling\Light_DeveloperWizard\CliTools\Program\LightDeveloperWizardApplication<br>
See the source code of [Ling\Light_DeveloperWizard\CliTools\Program\LightDeveloperWizardApplication](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/CliTools/Program/LightDeveloperWizardApplication.php)



SeeAlso
==============
Previous class: [LightDeveloperWizardBaseCommand](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand.md)<br>Next class: [LightDeveloperWizardException](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Exception/LightDeveloperWizardException.md)<br>
