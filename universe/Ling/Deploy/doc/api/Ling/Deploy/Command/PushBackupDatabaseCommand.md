[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The PushBackupDatabaseCommand class
================
2019-04-03 --> 2021-03-05






Introduction
============

The PushBackupDatabaseCommand class.

This command pushes database backups from the local project to the remote.

By default, it pushes all database backups.
To change this behaviour, you can use one of the following options:

- the **name** option
- the **last** option
- the **db** option

If the **name** option is defined, the last option will be ignored.

The **name** option allows you to specify the name(s) of the database backups to push.
The **last** option allows you to define the number of the non-named backups (per database identifier) to push.
The **db** option defines which database identifiers will be parsed (database backups are
     organized by database identifiers).
     This option is executed before the **name** and **last** option.


This operation will overwrite existing files.



Options, flags
------------
- names=$names: the comma separated list of backup names to upload. Note: the ".sql" extension is appended automatically if omitted.
                 Spaces between the comma an the names are allowed.
- last=$number: indicates the (max) number of non-named backups (per database identifier) to push.
- db=$database_identifiers: a comma separated list of database identifiers to parse.



Class synopsis
==============


class <span class="pl-k">PushBackupDatabaseCommand</span> extends [AbstractBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupDatabaseCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - protected int [$exitCode](#property-exitCode) ;

- Inherited properties
    - protected string [AbstractBackupCommand::$backupDirName](#property-backupDirName) ;
    - protected string [AbstractBackupCommand::$extension](#property-extension) ;
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupDatabaseCommand/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupDatabaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed
    - protected [onArchiveReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupDatabaseCommand/onArchiveReady.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void

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

- [PushBackupDatabaseCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupDatabaseCommand/__construct.md) &ndash; Builds the PushBackupDatabaseCommand instance.
- [PushBackupDatabaseCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupDatabaseCommand/run.md) &ndash; Runs the command.
- [PushBackupDatabaseCommand::onArchiveReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupDatabaseCommand/onArchiveReady.md) &ndash; A hook executed once the zip archive is successfully created.
- [AbstractBackupDatabaseCommand::getFetcherUtilInstance](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupDatabaseCommand/getFetcherUtilInstance.md) &ndash; Returns the FetcherUtil instance to use by this command.
- [AbstractBackupCommand::createArchive](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/createArchive.md) &ndash; and returns whether the zip creation was successful.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\PushBackupDatabaseCommand<br>
See the source code of [Ling\Deploy\Command\PushBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/PushBackupDatabaseCommand.php)



SeeAlso
==============
Previous class: [OpenConfCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/OpenConfCommand.md)<br>Next class: [PushBackupFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupFilesCommand.md)<br>
