[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The FetchDatabaseCommand class
================
2019-04-03 --> 2019-04-18






Introduction
============

The FetchDatabaseCommand class.

This command copies the remote database to the local machine.

It's a combination of the following commands:
- backup-db -r: creates a temporary backup of the remote database
- fetch-backup-db: repatriates the remote backup to the local machine
- restore-backup-db: restore the local database from the downloaded backup

By default, it copies the last database for every database identifier.
To restrict the database identifiers to a subset of your choice, use the **db** option.



Options, flags
---------------
- ?db=$identifiers: the comma separated list of database identifiers to process.
- -s: secure flag. If set, this command will prompt the user for required database password(s).
- -k: keep flag. If set, this command will not drop the database before restoring the backup.



Class synopsis
==============


class <span class="pl-k">FetchDatabaseCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchDatabaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md)() : void
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [FetchDatabaseCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchDatabaseCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\FetchDatabaseCommand


SeeAlso
==============
Previous class: [FetchCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchCommand.md)<br>Next class: [HelpCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand.md)<br>
