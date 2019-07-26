[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Application\DeployApplication class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md)


DeployApplication::runProgram
================



DeployApplication::runProgram — Runs the program, and returns the exit status.




Description
================


public [DeployApplication::runProgram](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/runProgram.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int | null




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
See the source code for method [DeployApplication::runProgram](https://github.com/lingtalfi/Deploy/blob/master/Application/DeployApplication.php#L284-L314)


See Also
================

The [DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) class.

Previous method: [getConfPath](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/getConfPath.md)<br>Next method: [onCommandInstantiated](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/onCommandInstantiated.md)<br>

