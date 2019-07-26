[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The ListBackupDatabaseCommand class
================
2019-04-03 --> 2019-07-18






Introduction
============

The ListBackupDatabaseCommand class.
This command lists the database backups of the application.

To see the database backups available on the remote, use the **-r** flag.




Options, flags
-------------
- -r: remote flag. If set, this command will operate on the remote.
- conf=$path: the path to a proxy configuration file. This is used internally, you probably won't need to use this option.



Class synopsis
==============


class <span class="pl-k">ListBackupDatabaseCommand</span> extends [BaseListBackupCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseListBackupCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected string [BaseListBackupCommand::$extension](#property-extension) ;
    - protected string [BaseListBackupCommand::$backupDirName](#property-backupDirName) ;
    - protected string [BaseListBackupCommand::$commandName](#property-commandName) ;
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ListBackupDatabaseCommand/__construct.md)() : void

- Inherited methods
    - public [BaseListBackupCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseListBackupCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [ListBackupDatabaseCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ListBackupDatabaseCommand/__construct.md) &ndash; Builds the ListBackupDatabaseCommand instance.
- [BaseListBackupCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseListBackupCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\ListBackupDatabaseCommand<br>
See the source code of [Ling\Deploy\Command\ListBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/ListBackupDatabaseCommand.php)



SeeAlso
==============
Previous class: [HelpCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand.md)<br>Next class: [ListBackupFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ListBackupFilesCommand.md)<br>
