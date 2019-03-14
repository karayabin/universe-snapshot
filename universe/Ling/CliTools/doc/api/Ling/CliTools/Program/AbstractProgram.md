[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The AbstractProgram class
================
2019-02-26 --> 2019-03-14






Introduction
============

The Program class.
This is my implementation of a base program.

You can reuse it as is, or use it as an inspiration to create your own program instances.

If you use it, you need to override it (because this class is abstract).

This program:

- uses the [bashtml language](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/bashtml.md) internally for all messages intended to be printed.
- Catches all exceptions that might occur and displays them as errors (using the bashtml <error> tag) on the screen.
If a [logger](https://github.com/lingtalfi/UniversalLogger) is set, will also log the exception.

The verbosity of this type of error, as well as the verbosity of the log message is controlled
by the $errorIsVerbose property.

When a log message is sent, the channel used is the one defined with the $loggerChannel property.



Class synopsis
==============


abstract class <span class="pl-k">AbstractProgram</span> implements [ProgramInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface.md) {

- Properties
    - protected [Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger) [$logger](#property-logger) ;
    - protected string [$loggerChannel](#property-loggerChannel) ;
    - protected bool [$errorIsVerbose](#property-errorIsVerbose) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/__construct.md)() : void
    - public [setLogger](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLogger.md)([Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger) $logger) : void
    - public [setLoggerChannel](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLoggerChannel.md)(string $loggerChannel) : void
    - public [setErrorIsVerbose](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setErrorIsVerbose.md)(bool $errorIsVerbose) : void
    - public [run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/run.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - abstract protected [runProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/runProgram.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void

}




Properties
=============

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

- [AbstractProgram::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/__construct.md) &ndash; Builds the AbstractProgram instance.
- [AbstractProgram::setLogger](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLogger.md) &ndash; Sets the logger.
- [AbstractProgram::setLoggerChannel](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLoggerChannel.md) &ndash; Sets the loggerChannel.
- [AbstractProgram::setErrorIsVerbose](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setErrorIsVerbose.md) &ndash; Sets the errorIsVerbose.
- [AbstractProgram::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/run.md) &ndash; Starts the interactive program.
- [AbstractProgram::runProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/runProgram.md) &ndash; Runs the program.





Location
=============
Ling\CliTools\Program\AbstractProgram


SeeAlso
==============
Previous class: [OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md)<br>Next class: [Application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md)<br>
