[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)<br>
[Back to the Ling\Light_Cli\CliTools\Command\LightCliDocCommand class](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand.md)


LightCliDocCommand::run
================



LightCliDocCommand::run — Runs the command.




Description
================


public [LightCliDocCommand::run](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/run.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed




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
See the source code for method [LightCliDocCommand::run](https://github.com/lingtalfi/Light_Cli/blob/master/CliTools/Command/LightCliDocCommand.php#L80-L88)


See Also
================

The [LightCliDocCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/setContainer.md)<br>Next method: [getName](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/LightCliDocCommand/getName.md)<br>

