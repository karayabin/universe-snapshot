[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The AbstractBackupDatabaseCommand class
================
2019-04-03 --> 2021-03-05






Introduction
============

The AbstractBackupDatabaseCommand class.

A parent class for subclasses who need to create a database backup zip archive.

createArchive
---------------
This method is the same as the AbstractBackupCommand->createArchive method,
but it adds the following extra criteria:
- the **db** option

The **db** option defines which database identifiers will be parsed (database backups are
     organized by database identifiers).
     This option is executed before the **name** and **last** option.


Also, the **last** option allows you to define the number of the non-named backups PER DATABASE IDENTIFIER to archive.



Class synopsis
==============


abstract class <span class="pl-k">AbstractBackupDatabaseCommand</span> extends [AbstractBackupCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected string [AbstractBackupCommand::$backupDirName](#property-backupDirName) ;
    - protected string [AbstractBackupCommand::$extension](#property-extension) ;
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupDatabaseCommand/__construct.md)() : void
    - protected [getFetcherUtilInstance](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupDatabaseCommand/getFetcherUtilInstance.md)(Ling\CliTools\Input\InputInterface $input) : [BackupFilesFetcherUtil](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil.md)

- Inherited methods
    - abstract protected [AbstractBackupCommand::onArchiveReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/onArchiveReady.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void
    - public [AbstractBackupCommand::createArchive](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/createArchive.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : bool
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void
    - abstract public CommandInterface::run(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed

}






Methods
==============

- [AbstractBackupDatabaseCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupDatabaseCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [AbstractBackupDatabaseCommand::getFetcherUtilInstance](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupDatabaseCommand/getFetcherUtilInstance.md) &ndash; Returns the FetcherUtil instance to use by this command.
- [AbstractBackupCommand::onArchiveReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/onArchiveReady.md) &ndash; A hook executed once the zip archive is successfully created.
- [AbstractBackupCommand::createArchive](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/createArchive.md) &ndash; and returns whether the zip creation was successful.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.
- CommandInterface::run &ndash; Runs the command.





Location
=============
Ling\Deploy\Command\AbstractBackupDatabaseCommand<br>
See the source code of [Ling\Deploy\Command\AbstractBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/AbstractBackupDatabaseCommand.php)



SeeAlso
==============
Previous class: [AbstractBackupCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand.md)<br>Next class: [BackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BackupDatabaseCommand.md)<br>
