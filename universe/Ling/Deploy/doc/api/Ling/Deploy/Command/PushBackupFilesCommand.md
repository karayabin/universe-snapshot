[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The PushBackupFilesCommand class
================
2019-04-03 --> 2019-04-18






Introduction
============

The PushBackupFilesCommand class.

This command pushes files backups from the local project to the remote.

By default, it pushes all files backups.
To change this behaviour, you can use one of the following options:

- the **name** option
- the **last** option

If the **name** option is defined, the last option will be ignored.

The **name** option allows you to specify the name(s) of the files backups to push.
The **last** option allows you to define the number of the non-named files backups to push.

This operation will overwrite existing files.



Options, flags
------------
- names=$names: the comma separated list of files backup names to upload. Note: the ".zip" extension is appended automatically if omitted.
                 Spaces between the comma an the names are allowed.
- last=$number: indicates the (max) number of non-named files backups to push.



Class synopsis
==============


class <span class="pl-k">PushBackupFilesCommand</span> extends [AbstractBackupCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - protected int [$exitCode](#property-exitCode) ;

- Inherited properties
    - protected string [AbstractBackupCommand::$backupDirName](#property-backupDirName) ;
    - protected string [AbstractBackupCommand::$extension](#property-extension) ;
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupFilesCommand/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupFilesCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - protected [onArchiveReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupFilesCommand/onArchiveReady.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void

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

- [PushBackupFilesCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupFilesCommand/__construct.md) &ndash; Builds the PushBackupFilesCommand instance.
- [PushBackupFilesCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupFilesCommand/run.md) &ndash; Runs the command.
- [PushBackupFilesCommand::onArchiveReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupFilesCommand/onArchiveReady.md) &ndash; A hook executed once the zip archive is successfully created.
- [AbstractBackupCommand::createArchive](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/createArchive.md) &ndash; and returns whether the zip creation was successful.
- [AbstractBackupCommand::getFetcherUtilInstance](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/getFetcherUtilInstance.md) &ndash; Returns the FetcherUtil instance to use by this command.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\PushBackupFilesCommand


SeeAlso
==============
Previous class: [PushBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupDatabaseCommand.md)<br>Next class: [PushCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushCommand.md)<br>
