[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The ZipBackupDatabaseCommand class
================
2019-04-03 --> 2021-05-31






Introduction
============

The ZipBackupDatabaseCommand class.

Creates a zip archive containing database backups, based on provided filtering criteria.

It is meant to be executed on the remote only.

This command is used internally by the following commands:
- fetch-backup-db


Options
--------------

- dir=$path: the backup directory path
- dst=$path: the path to the zip archive to create.
         Note: necessary folders will be created.
- ext=$extension: the extension to append to the backup name (if omitted)

- ?names=$names: the comma separated list of backup names to put in the archive
- ?last=$number: indicates the (max) number of non-named backups (per database identifier) to push.
- ?db=$database_identifiers: a comma separated list of database identifiers to parse.



Class synopsis
==============


class <span class="pl-k">ZipBackupDatabaseCommand</span> extends [AbstractBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupDatabaseCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - protected int [$exitCode](#property-exitCode) ;

- Inherited properties
    - protected string [AbstractBackupCommand::$backupDirName](#property-backupDirName) ;
    - protected string [AbstractBackupCommand::$extension](#property-extension) ;
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupDatabaseCommand/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupDatabaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed
    - public [onArchiveReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupDatabaseCommand/onArchiveReady.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void

- Inherited methods
    - protected [AbstractBackupDatabaseCommand::getFetcherUtilInstance](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupDatabaseCommand/getFetcherUtilInstance.md)(Ling\CliTools\Input\InputInterface $input) : [BackupFilesFetcherUtil](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil.md)
    - public [AbstractBackupCommand::createArchive](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/createArchive.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : bool
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}




Properties
=============

- <span id="property-exitCode"><b>exitCode</b></span>

    This property holds the exitCode for this instance.
    
    

- <span id="property-backupDirName"><b>backupDirName</b></span>

    This property holds the backupDirName for this instance.
    
    

- <span id="property-extension"><b>extension</b></span>

    This property holds the extension for this instance.
    
    

- <span id="property-application"><b>application</b></span>

    This property holds the DeployApplication instance.
    
    



Methods
==============

- [ZipBackupDatabaseCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupDatabaseCommand/__construct.md) &ndash; Builds the ZipBackupDatabaseCommand instance.
- [ZipBackupDatabaseCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupDatabaseCommand/run.md) &ndash; Runs the command.
- [ZipBackupDatabaseCommand::onArchiveReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupDatabaseCommand/onArchiveReady.md) &ndash; A hook executed once the zip archive is successfully created.
- [AbstractBackupDatabaseCommand::getFetcherUtilInstance](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupDatabaseCommand/getFetcherUtilInstance.md) &ndash; Returns the FetcherUtil instance to use by this command.
- [AbstractBackupCommand::createArchive](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/createArchive.md) &ndash; and returns whether the zip creation was successful.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\ZipBackupDatabaseCommand<br>
See the source code of [Ling\Deploy\Command\ZipBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/ZipBackupDatabaseCommand.php)



SeeAlso
==============
Previous class: [ZipBackupCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupCommand.md)<br>Next class: [ZipBackupFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupFilesCommand.md)<br>
