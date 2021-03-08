[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The FetchBackupDatabaseCommand class
================
2019-04-03 --> 2021-03-05






Introduction
============

The FetchBackupDatabaseCommand class.

This command repatriates database backups from the remote to the local project.

By default, it repatriates all database backup.
To define a subset of database backup to repatriate, you can use one of the following options:

- the **name** option
- the **last** option
- the **db** option

If the **name** option is defined, the last option will be ignored.

The **name** option allows you to specify the name(s) of the database backups to fetch.
The **last** option allows you to define the number of the non-named backups (per database identifier) to fetch.
The **db** option defines which database identifiers will be parsed (database backups are
     organized by database identifiers).
     This option is executed before the **name** and **last** option.


This operation will overwrite existing files.



Options, flags
------------
- name=$names: the comma separated list of backup names to repatriate. Note: the ".sql" extension is appended automatically if omitted.
                 Spaces between the comma an the names are allowed.
- last=$number: indicates the (max) number of non-named backups (per database identifier) to fetch.
- db=$database_identifiers: a comma separated list of database identifiers to parse.



Class synopsis
==============


class <span class="pl-k">FetchBackupDatabaseCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchBackupDatabaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed

- Inherited methods
    - public [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md)() : void
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [FetchBackupDatabaseCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchBackupDatabaseCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\FetchBackupDatabaseCommand<br>
See the source code of [Ling\Deploy\Command\FetchBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/FetchBackupDatabaseCommand.php)



SeeAlso
==============
Previous class: [EnterInteractiveModeCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/EnterInteractiveModeCommand.md)<br>Next class: [FetchBackupFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchBackupFilesCommand.md)<br>
