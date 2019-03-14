[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)



The KaosApplication class
================
2019-03-13 --> 2019-03-14






Introduction
============

The KaosApplication class.

Personal console helper for universe related tasks.



Class synopsis
==============


class <span class="pl-k">KaosApplication</span> extends Application implements ProgramInterface {

- Properties
    - private string [$currentDirectory](#property-currentDirectory) ;
    - private int [$baseIndentLevel](#property-baseIndentLevel) ;

- Inherited properties
    - protected array [Application::$commands](#property-commands) ;
    - protected Ling\UniversalLogger\UniversalLoggerInterface [AbstractProgram::$logger](#property-logger) ;
    - protected string [AbstractProgram::$loggerChannel](#property-loggerChannel) ;
    - protected bool [AbstractProgram::$errorIsVerbose](#property-errorIsVerbose) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication/__construct.md)() : void
    - public [getCurrentDirectory](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication/getCurrentDirectory.md)() : string
    - public [getBaseIndentLevel](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication/getBaseIndentLevel.md)() : int
    - protected [onCommandInstantiated](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication/onCommandInstantiated.md)(Ling\CliTools\Command\CommandInterface $command) : void

- Inherited methods
    - public Application::registerCommand(string $commandClassName, ?$aliases) : void
    - protected Application::runProgram(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void
    - public AbstractProgram::setLogger(Ling\UniversalLogger\UniversalLoggerInterface $logger) : void
    - public AbstractProgram::setLoggerChannel(string $loggerChannel) : void
    - public AbstractProgram::setErrorIsVerbose(bool $errorIsVerbose) : void
    - public AbstractProgram::run(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void

}




Properties
=============

- <span id="property-currentDirectory"><b>currentDirectory</b></span>

    This property holds the currentDirectory when this instance was first instantiated.
    
    

- <span id="property-baseIndentLevel"><b>baseIndentLevel</b></span>

    This property holds the base indent level for this instance.
    
    

- <span id="property-commands"><b>commands</b></span>

    This property holds the array of commands for this instance.
    
    It's an array of command alias => command class name.
    
    Note: multiple aliases can reference the same command class name.
    
    

- <span id="property-logger"><b>logger</b></span>

    This property holds the logger for this instance.
    If no instance is set (by default), no message will be logged.
    
    If an instance is set, log messages will be sent when an exception is intercepted.
    The channel the log message is sent to is error by default, and can be changed using the loggerChannel property.
    
    

- <span id="property-loggerChannel"><b>loggerChannel</b></span>

    This property holds the channel the log messages will be sent to.
    See the $logger property for more details.
    
    

- <span id="property-errorIsVerbose"><b>errorIsVerbose</b></span>

    This property holds the error verbosity for this instance.
    It controls the verbosity of the error messages displayed to the user when an exception is caught at the program
    level.
    
    
    If true:
    - the error message displayed to the console screen is the traceAsString of the exception.
    - the message sent to the log is also the traceAsString of the exception.
    if false:
    - the error message displayed to the console screen is the exception message.
    - the message sent to the log is also the exception message.
    
    



Methods
==============

- [KaosApplication::__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication/__construct.md) &ndash; Builds the UniToolApplication instance.
- [KaosApplication::getCurrentDirectory](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication/getCurrentDirectory.md) &ndash; Returns the current directory when this instance was first instantiated.
- [KaosApplication::getBaseIndentLevel](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication/getBaseIndentLevel.md) &ndash; Returns the baseIndentLevel of this instance.
- [KaosApplication::onCommandInstantiated](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication/onCommandInstantiated.md) &ndash; Can decorate the command after it has just been instantiated.
- Application::registerCommand &ndash; Registers a command with the given aliases.
- Application::runProgram &ndash; Runs the program.
- AbstractProgram::setLogger &ndash; Sets the logger.
- AbstractProgram::setLoggerChannel &ndash; Sets the loggerChannel.
- AbstractProgram::setErrorIsVerbose &ndash; Sets the errorIsVerbose.
- AbstractProgram::run &ndash; Starts the interactive program.





Location
=============
Ling\LingTalfi\Kaos\Application\KaosApplication


SeeAlso
==============
Previous class: [WebBoxDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/WebBox/WebBoxDocBuilder.md)<br>Next class: [KaosGenericCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand.md)<br>
