[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Command\PushBackupDatabaseCommand class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupDatabaseCommand.md)


PushBackupDatabaseCommand::run
================



PushBackupDatabaseCommand::run — Runs the command.




Description
================


public [PushBackupDatabaseCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupDatabaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int




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







See Also
================

The [PushBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupDatabaseCommand.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupDatabaseCommand/__construct.md)<br>Next method: [onArchiveReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupDatabaseCommand/onArchiveReady.md)<br>

