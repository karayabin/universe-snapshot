[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Program\Application class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md)


Application::runProgram
================



Application::runProgram — Runs the program, and returns the exit status.




Description
================


protected [Application::runProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/runProgram.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : int | null




Runs the program, and returns the exit status.

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================


- input

    

- output

    


Return values
================

Returns int | null.
The exit status.
If null is returned, 0 should be assumed.







Source Code
===========
See the source code for method [Application::runProgram](https://github.com/lingtalfi/CliTools/blob/master/Program/Application.php#L78-L105)


See Also
================

The [Application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md) class.

Previous method: [registerCommand](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/registerCommand.md)<br>Next method: [onCommandInstantiated](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/onCommandInstantiated.md)<br>

