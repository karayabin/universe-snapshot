[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Program\Application class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md)


Application::onCommandInstantiated
================



Application::onCommandInstantiated — Can decorate the command after it has just been instantiated.




Description
================


protected [Application::onCommandInstantiated](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/onCommandInstantiated.md)([Ling\CliTools\Command\CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) $command) : void




Can decorate the command after it has just been instantiated.

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================


- command

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [Application::onCommandInstantiated](https://github.com/lingtalfi/CliTools/blob/master/Program/Application.php#L114-L117)


See Also
================

The [Application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md) class.

Previous method: [runProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/runProgram.md)<br>

