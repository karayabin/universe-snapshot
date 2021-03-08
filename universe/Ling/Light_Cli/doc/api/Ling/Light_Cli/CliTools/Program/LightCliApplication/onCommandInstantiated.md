[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)<br>
[Back to the Ling\Light_Cli\CliTools\Program\LightCliApplication class](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication.md)


LightCliApplication::onCommandInstantiated
================



LightCliApplication::onCommandInstantiated — Can decorate the command after it has just been instantiated.




Description
================


protected [LightCliApplication::onCommandInstantiated](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication/onCommandInstantiated.md)([Ling\CliTools\Command\CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) $command) : void




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
See the source code for method [LightCliApplication::onCommandInstantiated](https://github.com/lingtalfi/Light_Cli/blob/master/CliTools/Program/LightCliApplication.php#L234-L246)


See Also
================

The [LightCliApplication](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication.md) class.

Previous method: [onCommandNotFound](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication/onCommandNotFound.md)<br>Next method: [buildAliases](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication/buildAliases.md)<br>

