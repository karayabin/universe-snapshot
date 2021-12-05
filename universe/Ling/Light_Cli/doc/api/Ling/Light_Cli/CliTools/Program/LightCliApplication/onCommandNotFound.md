[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)<br>
[Back to the Ling\Light_Cli\CliTools\Program\LightCliApplication class](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication.md)


LightCliApplication::onCommandNotFound
================



LightCliApplication::onCommandNotFound — Hook called if a command was not found.




Description
================


protected [LightCliApplication::onCommandNotFound](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication/onCommandNotFound.md)(string $commandAlias, Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void




Hook called if a command was not found.

This method returns the "return status" to return to the unix command.

By default, it throws an exception.

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================


- commandAlias

    

- input

    

- output

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightCliApplication::onCommandNotFound](https://github.com/lingtalfi/Light_Cli/blob/master/CliTools/Program/LightCliApplication.php#L116-L235)


See Also
================

The [LightCliApplication](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication.md) class.

Previous method: [getAppId](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication/getAppId.md)<br>Next method: [onCommandInstantiated](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplication/onCommandInstantiated.md)<br>

