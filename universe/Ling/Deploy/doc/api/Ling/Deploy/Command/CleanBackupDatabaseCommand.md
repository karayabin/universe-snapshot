[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The CleanBackupDatabaseCommand class
================
2019-04-03 --> 2019-04-04






Introduction
============

The CleanBackupDatabaseCommand class.

This command deletes database backups of the project.


It distinguishes between two types of database backups:

- the non-named backups (created with the **backup-db** command without the **name** option), which look like this: 2019-03-26__08-49-17.sql
- the named backups (created with the **backup-db** command with the **name** option), which look like this: my_backup.sql

The general idea is that the named backups are always preserved, unless you delete them explicitly with the **name** option or the **-d** flag.


By default, this command will keep all the named database backups, and also keep the 10 last non-named database backups and delete all other non-named backups.

The number 10 can be changed with the **keep** option.

By default this command operates on the site (aka local machine), use the **-r** flag to operate on the remote.


To remove a specific database backup, or a set of database backups, you can use the **name** option.
This will remove all database backups having the given name.

To clean the database backup directory, effectively removing ALL database backups, use the **-d** flag.



The path for a backup has the following format:

```txt
$root_dir/.deploy/backup-db/$database_identifier/$backup_name
```

By default, the command repeats the same operation for every $database_identifier found.
To define the set of database identifiers to operate on, use the **db** option.





Options, flags
------------
- -r: remote flag. If set, the command will operate on the remote rather than on the site.
- -d: delete flag. If set, remove ALL the database backups. This flag has precedence over any other options.
- ?keep=$number: defines the number of non-named database backups to keep (all other older non-named backups will be removed).
- ?db=$database_identifier: comma separated list of database identifiers. It represents the database identifiers to operate on.
- ?names=$names: the comma separated list of backup names to delete. Note: the ".sql" extension is appended automatically if omitted.
Spaces between the comma an the names are allowed.



Class synopsis
==============


class <span class="pl-k">CleanBackupDatabaseCommand</span> extends [BaseCleanBackupCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseCleanBackupCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected string [BaseCleanBackupCommand::$commandName](#property-commandName) ;
    - protected string [BaseCleanBackupCommand::$dirName](#property-dirName) ;
    - protected string [BaseCleanBackupCommand::$extension](#property-extension) ;
    - protected bool [BaseCleanBackupCommand::$useDbFilter](#property-useDbFilter) ;
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CleanBackupDatabaseCommand/__construct.md)() : void

- Inherited methods
    - public [BaseCleanBackupCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseCleanBackupCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [CleanBackupDatabaseCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CleanBackupDatabaseCommand/__construct.md) &ndash; Builds the CleanBackupDatabaseCommand instance.
- [BaseCleanBackupCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseCleanBackupCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\CleanBackupDatabaseCommand


SeeAlso
==============
Previous class: [BaseListBackupCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseListBackupCommand.md)<br>Next class: [CleanBackupFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CleanBackupFilesCommand.md)<br>
