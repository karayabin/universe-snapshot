[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The ZipBackupFilesCommand class
================
2019-04-03 --> 2019-05-10






Introduction
============

The ZipBackupFilesCommand class.

Creates a zip archive containing files backups, based on provided filtering criteria.

It is meant to be executed on the remote only.

This command is used internally by the following commands:
- fetch-backup-files


Options
--------------

- dir=$path: the backup directory path
- dst=$path: the path to the zip archive to create.
         Note: necessary folders will be created.
- ext=$extension: the extension to append to the backup name (if omitted)

- ?names=$names: the comma separated list of backup names to put in the archive
- ?last=$number: indicates the (max) number of non-named backups to push.



Class synopsis
==============


class <span class="pl-k">ZipBackupFilesCommand</span> extends [AbstractBackupCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - protected int [$exitCode](#property-exitCode) ;

- Inherited properties
    - protected string [AbstractBackupCommand::$backupDirName](#property-backupDirName) ;
    - protected string [AbstractBackupCommand::$extension](#property-extension) ;
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupFilesCommand/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupFilesCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - public [onArchiveReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupFilesCommand/onArchiveReady.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void

- Inherited methods
    - public [AbstractBackupCommand::createArchive](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/createArchive.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : bool
    - protected [AbstractBackupCommand::getFetcherUtilInstance](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/getFetcherUtilInstance.md)(Ling\CliTools\Input\InputInterface $input) : [BackupFilesFetcherUtil](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/BackupFilesFetcherUtil.md)
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

- [ZipBackupFilesCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupFilesCommand/__construct.md) &ndash; Builds the ZipBackupFilesCommand instance.
- [ZipBackupFilesCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupFilesCommand/run.md) &ndash; Runs the command.
- [ZipBackupFilesCommand::onArchiveReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupFilesCommand/onArchiveReady.md) &ndash; A hook executed once the zip archive is successfully created.
- [AbstractBackupCommand::createArchive](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/createArchive.md) &ndash; and returns whether the zip creation was successful.
- [AbstractBackupCommand::getFetcherUtilInstance](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/getFetcherUtilInstance.md) &ndash; Returns the FetcherUtil instance to use by this command.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\ZipBackupFilesCommand


SeeAlso
==============
Previous class: [ZipBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupDatabaseCommand.md)<br>Next class: [ZipFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipFilesCommand.md)<br>
