[Back to the CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools.md)<br>
[Back to the CliTools\Program\Application class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/Application.md)


Application::onCommandInstantiated
================



Application::onCommandInstantiated — Can decorate the command after it has just been instantiated.




Description
================


protected [Application::onCommandInstantiated](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/Application/onCommandInstantiated.md)([CliTools\Command\CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Command/CommandInterface.md) $command) : void




Can decorate the command after it has just been instantiated.

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================


- command

    


Return values
================

Returns void.







See Also
================

The [Application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/Application.md) class.

Previous method: [runProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/Application/runProgram.md)<br>

