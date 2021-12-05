[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The AbstractProgram class
================
2019-02-26 --> 2021-07-08






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
    - protected bool [$useExitStatus](#property-useExitStatus) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/__construct.md)() : void
    - public [setLogger](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLogger.md)([Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger) $logger) : void
    - public [setLoggerChannel](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLoggerChannel.md)(string $loggerChannel) : void
    - public [setErrorIsVerbose](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setErrorIsVerbose.md)(bool $errorIsVerbose) : void
    - public [setUseExitStatus](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setUseExitStatus.md)(bool $useExitStatus) : void
    - public [run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/run.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed | void
    - abstract protected [runProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/runProgram.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed

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
    
    

- <span id="property-useExitStatus"><b>useExitStatus</b></span>

    This property holds the useExitStatus for this instance.
    
    If true, the run command will call the php exit function with the exit code returned by the runProgram method,
    or 1 if an error occurred (an exception was thrown).
    If false, the exit function will not be called.
    
    



Methods
==============

- [AbstractProgram::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/__construct.md) &ndash; Builds the AbstractProgram instance.
- [AbstractProgram::setLogger](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLogger.md) &ndash; Sets the logger.
- [AbstractProgram::setLoggerChannel](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLoggerChannel.md) &ndash; Sets the loggerChannel.
- [AbstractProgram::setErrorIsVerbose](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setErrorIsVerbose.md) &ndash; Sets the errorIsVerbose.
- [AbstractProgram::setUseExitStatus](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setUseExitStatus.md) &ndash; Sets the useExitStatus.
- [AbstractProgram::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/run.md) &ndash; Executes the program, and returns the exit code, if defined by the concrete class.
- [AbstractProgram::runProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/runProgram.md) &ndash; Runs the program, and returns the exit status.


Examples
==========

Example 1: The make coffee program example.
-------------------------------------------



```php
#!/usr/bin/env php
<?php


use Ling\CliTools\Input\ArrayInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\Output;
use Ling\CliTools\Output\OutputInterface;
use Ling\CliTools\Program\AbstractProgram;

require_once __DIR__ . "/../universe/bigbang.php"; // activate universe


class MakeCoffeeProgram extends AbstractProgram
{

    protected function runProgram(InputInterface $input, OutputInterface $output)
    {
        $s = "";
        if (false === $input->hasFlag("please")) {
            $s = "Nah, I don't feel like doing anything today!";
        } else {
            $nbSugars = $input->getOption("sugars", 0);
            $type = $input->getOption("type", "regular");


            $s = "Making $type coffee with $nbSugars sugars";
            if ($input->hasFlag("fast")) {
                $s .= ", asap";
            }
            $s .= ".";
        }
        $output->write($s . PHP_EOL);
    }

}


$input = new ArrayInput();
$input->setItems([
    "sugars" => 2,
    "type" => "black",
    "-fast" => true,
    "-please" => true,
]);
$output = new Output();
$program = new MakeCoffeeProgram();
$program->run($input, $output);
```


By executing the above example from the command line:

```bash
php -f program.php
```

We get the following result:

```bash
Making black coffee with 2 sugars, asap.
```


Location
=============
Ling\CliTools\Program\AbstractProgram<br>
See the source code of [Ling\CliTools\Program\AbstractProgram](https://github.com/lingtalfi/CliTools/blob/master/Program/AbstractProgram.php)



SeeAlso
==============
Previous class: [OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md)<br>Next class: [Application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md)<br>
