[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Program\Application class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md)


Application::onCommandNotFound
================



Application::onCommandNotFound — Hook called if a command was not found.




Description
================


protected [Application::onCommandNotFound](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/onCommandNotFound.md)(string $commandAlias, [Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void




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
See the source code for method [Application::onCommandNotFound](https://github.com/lingtalfi/CliTools/blob/master/Program/Application.php#L146-L149)


See Also
================

The [Application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md) class.

Previous method: [onCommandInstantiated](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/onCommandInstantiated.md)<br>

