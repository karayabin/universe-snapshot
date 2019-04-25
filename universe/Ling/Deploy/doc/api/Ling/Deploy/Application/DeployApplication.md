[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The DeployApplication class
================
2019-04-03 --> 2019-04-18






Introduction
============

The DeployApplication class.

The console program used to deploy your local website to production servers.

General options (apply to all commands)
------------

- ?dir=$dir. Sets the project directory. If not set, the default is the current directory.
- -x: if set, the x flag will tell the application to use the exit status system.
         This means that after a command is executed, the exit function of php is called
         with the status code returned by the command (0 by default).
- ?indent=int. Sets the base indent level for the command.



Class synopsis
==============


class <span class="pl-k">DeployApplication</span> extends [Application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md) implements [ProgramInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface.md) {

- Properties
    - private string [$projectIdentifier](#property-projectIdentifier) ;
    - private int [$baseIndentLevel](#property-baseIndentLevel) ;
    - private string [$confPath](#property-confPath) ;

- Inherited properties
    - protected array [Application::$commands](#property-commands) ;
    - protected [Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger/blob/master/UniversalLoggerInterface.php) [AbstractProgram::$logger](#property-logger) ;
    - protected string [AbstractProgram::$loggerChannel](#property-loggerChannel) ;
    - protected bool [AbstractProgram::$errorIsVerbose](#property-errorIsVerbose) ;
    - protected bool [AbstractProgram::$useExitStatus](#property-useExitStatus) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/__construct.md)() : void
    - public [getBaseIndentLevel](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/getBaseIndentLevel.md)() : int
    - public [getProjectIdentifier](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/getProjectIdentifier.md)() : string
    - public [setConfPath](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/setConfPath.md)(string $confPath) : void
    - public [setProjectIdentifier](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/setProjectIdentifier.md)(string $projectIdentifier) : void
    - public [getProjectConf](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/getProjectConf.md)() : array
    - public [getConf](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/getConf.md)() : array
    - public [getConfPath](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/getConfPath.md)() : string
    - public [runProgram](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/runProgram.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int | null
    - protected [onCommandInstantiated](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/onCommandInstantiated.md)([Ling\CliTools\Command\CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) $command) : void

- Inherited methods
    - public Application::registerCommand(string $commandClassName, ?$aliases) : void
    - public AbstractProgram::setLogger([Ling\UniversalLogger\UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger/blob/master/UniversalLoggerInterface.php) $logger) : void
    - public AbstractProgram::setLoggerChannel(string $loggerChannel) : void
    - public AbstractProgram::setErrorIsVerbose(bool $errorIsVerbose) : void
    - public AbstractProgram::setUseExitStatus(bool $useExitStatus) : void
    - public AbstractProgram::run(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void

}




Properties
=============

- <span id="property-projectIdentifier"><b>projectIdentifier</b></span>

    This property holds the identifier of the current project.
    
    

- <span id="property-baseIndentLevel"><b>baseIndentLevel</b></span>

    This property holds the base indent level for this instance.
    
    

- <span id="property-confPath"><b>confPath</b></span>

    This property holds the confPath for this instance.
    
    

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

- [DeployApplication::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/__construct.md) &ndash; Builds the DeployApplication instance.
- [DeployApplication::getBaseIndentLevel](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/getBaseIndentLevel.md) &ndash; Returns the baseIndentLevel of this instance.
- [DeployApplication::getProjectIdentifier](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/getProjectIdentifier.md) &ndash; Returns the projectIdentifier of this instance.
- [DeployApplication::setConfPath](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/setConfPath.md) &ndash; Sets the confPath.
- [DeployApplication::setProjectIdentifier](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/setProjectIdentifier.md) &ndash; Sets the projectIdentifier.
- [DeployApplication::getProjectConf](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/getProjectConf.md) &ndash; Returns the configuration array for the current project.
- [DeployApplication::getConf](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/getConf.md) &ndash; 
- [DeployApplication::getConfPath](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/getConfPath.md) &ndash; Returns the path to the [configuration file](https://github.com/lingtalfi/Deploy/blob/master/README.md#the-configuration-file).
- [DeployApplication::runProgram](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/runProgram.md) &ndash; Runs the program, and returns the exit status.
- [DeployApplication::onCommandInstantiated](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/onCommandInstantiated.md) &ndash; Can decorate the command after it has just been instantiated.
- Application::registerCommand &ndash; Registers a command with the given aliases.
- AbstractProgram::setLogger &ndash; Sets the logger.
- AbstractProgram::setLoggerChannel &ndash; Sets the loggerChannel.
- AbstractProgram::setErrorIsVerbose &ndash; Sets the errorIsVerbose.
- AbstractProgram::setUseExitStatus &ndash; Sets the useExitStatus.
- AbstractProgram::run &ndash; Starts the interactive program.





Location
=============
Ling\Deploy\Application\DeployApplication


SeeAlso
==============
Next class: [AbstractBackupCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand.md)<br>
