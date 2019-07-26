[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Command\CleanCommand class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/CleanCommand.md)


CleanCommand::run
================



CleanCommand::run — Runs the command.




Description
================


public [CleanCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/CleanCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int




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

Returns int.
The exit status.
If null, 0 should be assumed.







Source Code
===========
See the source code for method [CleanCommand::run](https://github.com/lingtalfi/Uni2/blob/master/Command/CleanCommand.php#L31-L85)


See Also
================

The [CleanCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/CleanCommand.md) class.



