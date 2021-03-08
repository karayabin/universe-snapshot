[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Command\HelpCommand class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand.md)


HelpCommand::run
================



HelpCommand::run — Runs the command.




Description
================


public [HelpCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed




Runs the command.

Important note:
The input object passed to the commands is the same as the input object passed to the application itself.
This means that the parameter index used by commands should start at 2 (because 1 is already the name of the command).

So, remember, when you're inside a command, if you want to get a parameter, starts with 2 (and not 0 or 1).




Parameters
================


- input

    

- output

    


Return values
================

Returns mixed.
If an int is returned, it should be assumed to be the exit status.
If no value is returned, 0 should be assumed (meaning exit status=0, meaning the program executed correctly).
Other return value types might be added in the future







Source Code
===========
See the source code for method [HelpCommand::run](https://github.com/lingtalfi/Deploy/blob/master/Command/HelpCommand.php#L54-L103)


See Also
================

The [HelpCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/__construct.md)<br>Next method: [getCallbacks](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/getCallbacks.md)<br>

