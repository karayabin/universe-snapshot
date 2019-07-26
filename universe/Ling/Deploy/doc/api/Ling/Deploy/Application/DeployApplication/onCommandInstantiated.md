[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Application\DeployApplication class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md)


DeployApplication::onCommandInstantiated
================



DeployApplication::onCommandInstantiated — Can decorate the command after it has just been instantiated.




Description
================


protected [DeployApplication::onCommandInstantiated](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/onCommandInstantiated.md)([Ling\CliTools\Command\CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) $command) : void




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
See the source code for method [DeployApplication::onCommandInstantiated](https://github.com/lingtalfi/Deploy/blob/master/Application/DeployApplication.php#L324-L331)


See Also
================

The [DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) class.

Previous method: [runProgram](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication/runProgram.md)<br>

