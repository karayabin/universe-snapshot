[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Program\AbstractProgram class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram.md)


AbstractProgram::runProgram
================



AbstractProgram::runProgram — Runs the program, and returns the exit status.




Description
================


abstract protected [AbstractProgram::runProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/runProgram.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : int | null




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
See the source code for method [AbstractProgram::runProgram](https://github.com/lingtalfi/CliTools/blob/master/Program/AbstractProgram.php#L190-L190)


See Also
================

The [AbstractProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram.md) class.

Previous method: [run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/run.md)<br>

