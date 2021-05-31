[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Application\UniToolApplication class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md)


UniToolApplication::run
================



UniToolApplication::run — Parses general options.




Description
================


public [UniToolApplication::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed | void




Parses general options.


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
See the source code for method [UniToolApplication::run](https://github.com/lingtalfi/Uni2/blob/master/Application/UniToolApplication.php#L664-L696)


See Also
================

The [UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) class.

Previous method: [checkUpgrade](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/checkUpgrade.md)<br>Next method: [onCommandInstantiated](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/onCommandInstantiated.md)<br>

