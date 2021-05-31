[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Program\AbstractProgram class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram.md)


AbstractProgram::run
================



AbstractProgram::run — Executes the program, and returns the exit code, if defined by the concrete class.




Description
================


public [AbstractProgram::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/run.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed | void




Executes the program, and returns the exit code, if defined by the concrete class.


Starts the interactive program.

This method can return anything you want.
We recommend however that if you return an int, it's the exit code, so that it's easier to interface it with other programs.




Parameters
================


- input

    

- output

    


Return values
================

Returns mixed | void.








Source Code
===========
See the source code for method [AbstractProgram::run](https://github.com/lingtalfi/CliTools/blob/master/Program/AbstractProgram.php#L151-L177)


See Also
================

The [AbstractProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram.md) class.

Previous method: [setUseExitStatus](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setUseExitStatus.md)<br>Next method: [runProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/runProgram.md)<br>

