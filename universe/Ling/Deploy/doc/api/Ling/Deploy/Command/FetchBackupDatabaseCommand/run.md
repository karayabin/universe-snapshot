[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Command\FetchBackupDatabaseCommand class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchBackupDatabaseCommand.md)


FetchBackupDatabaseCommand::run
================



FetchBackupDatabaseCommand::run — Runs the command.




Description
================


public [FetchBackupDatabaseCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchBackupDatabaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed




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
See the source code for method [FetchBackupDatabaseCommand::run](https://github.com/lingtalfi/Deploy/blob/master/Command/FetchBackupDatabaseCommand.php#L55-L119)


See Also
================

The [FetchBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchBackupDatabaseCommand.md) class.



