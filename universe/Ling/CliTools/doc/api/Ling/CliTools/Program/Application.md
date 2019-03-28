[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The Application class
================
2019-02-26 --> 2019-03-26






Introduction
============

The Application class.
This is my implementation of a base application.

You can reuse it as is, or use it as an inspiration to create your own application instances.

An application is a program composed of multiple commands.
When we call an application via the terminal, the first parameter is always an alias for the command to execute.

If you use this class, it is recommended that your command classes complain by throwing exceptions.
That's because exceptions will be caught by this class for free and will be logged if a logger instance
is attached to the program (see more details in the [AbstractProgram class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram.md)).

And so it's a good idea to re-use what's already in place.



Class synopsis
==============


class <span class="pl-k">Application</span> extends [AbstractProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram.md) implements [ProgramInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface.md) {

- Properties
    - protected array [$commands](#property-commands) ;

- Inherited properties
    - protected [Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger) [AbstractProgram::$logger](#property-logger) ;
    - protected string [AbstractProgram::$loggerChannel](#property-loggerChannel) ;
    - protected bool [AbstractProgram::$errorIsVerbose](#property-errorIsVerbose) ;
    - protected bool [AbstractProgram::$useExitStatus](#property-useExitStatus) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/__construct.md)() : void
    - public [registerCommand](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/registerCommand.md)(string $commandClassName, ?$aliases) : void
    - protected [runProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/runProgram.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : int | null
    - protected [onCommandInstantiated](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/onCommandInstantiated.md)([Ling\CliTools\Command\CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) $command) : void

- Inherited methods
    - public [AbstractProgram::setLogger](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLogger.md)([Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger) $logger) : void
    - public [AbstractProgram::setLoggerChannel](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLoggerChannel.md)(string $loggerChannel) : void
    - public [AbstractProgram::setErrorIsVerbose](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setErrorIsVerbose.md)(bool $errorIsVerbose) : void
    - public [AbstractProgram::setUseExitStatus](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setUseExitStatus.md)(bool $useExitStatus) : void
    - public [AbstractProgram::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/run.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void

}




Properties
=============

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
    
    

- <span id="property-useExitStatus"><b>useExitStatus</b></span>

    This property holds the useExitStatus for this instance.
    
    If true, the run command will call the php exit function with the exit code returned by the runProgram method,
    or 1 if an error occurred (an exception was thrown).
    If false, the exit function will not be called.
    
    



Methods
==============

- [Application::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/__construct.md) &ndash; Builds the Application instance.
- [Application::registerCommand](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/registerCommand.md) &ndash; Registers a command with the given aliases.
- [Application::runProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/runProgram.md) &ndash; Runs the program, and returns the exit status.
- [Application::onCommandInstantiated](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/onCommandInstantiated.md) &ndash; Can decorate the command after it has just been instantiated.
- [AbstractProgram::setLogger](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLogger.md) &ndash; Sets the logger.
- [AbstractProgram::setLoggerChannel](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLoggerChannel.md) &ndash; Sets the loggerChannel.
- [AbstractProgram::setErrorIsVerbose](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setErrorIsVerbose.md) &ndash; Sets the errorIsVerbose.
- [AbstractProgram::setUseExitStatus](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setUseExitStatus.md) &ndash; Sets the useExitStatus.
- [AbstractProgram::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/run.md) &ndash; Starts the interactive program.


Examples
==========

Example 1: a simple application example
-------------------


```php
#!/usr/bin/env php
<?php


use Ling\CliTools\Command\CommandInterface;
use Ling\CliTools\Input\ArrayInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\Output;
use Ling\CliTools\Output\OutputInterface;
use Ling\CliTools\Program\Application;

require_once __DIR__ . "/../universe/bigbang.php"; // activate universe


class MakeSomeCoffeeCommand implements CommandInterface
{
    public function run(InputInterface $input, OutputInterface $output)
    {
        $output->write("I'm making some coffee" . PHP_EOL);
    }

}


class MakeSomeTeaCommand implements CommandInterface
{
    public function run(InputInterface $input, OutputInterface $output)
    {
        $output->write("I'm making some tea" . PHP_EOL);
    }

}


$output = new Output();
$program = new Application();
$program->registerCommand("MakeSomeCoffeeCommand", "coffee");
$program->registerCommand("MakeSomeTeaCommand", "tea");


$input = new ArrayInput();
$input->setItems([
    ":coffee" => true,
]);
$program->run($input, $output); // I'm making some coffee



$input->setItems([
    ":tea" => true,
]);
$program->run($input, $output); // I'm making some tea

```


Location
=============
Ling\CliTools\Program\Application


SeeAlso
==============
Previous class: [AbstractProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram.md)<br>Next class: [ProgramInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface.md)<br>
