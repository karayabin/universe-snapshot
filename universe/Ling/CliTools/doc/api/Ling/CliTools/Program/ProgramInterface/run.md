[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Program\ProgramInterface class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface.md)


ProgramInterface::run
================



ProgramInterface::run — Starts the interactive program.




Description
================


abstract public [ProgramInterface::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface/run.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed | void




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
See the source code for method [ProgramInterface::run](https://github.com/lingtalfi/CliTools/blob/master/Program/ProgramInterface.php#L123-L123)


See Also
================

The [ProgramInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface.md) class.



