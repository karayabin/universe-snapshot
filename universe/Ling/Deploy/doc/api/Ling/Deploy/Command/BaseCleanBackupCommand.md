[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The BaseCleanBackupCommand class
================
2019-04-03 --> 2019-07-18






Introduction
============

The BaseCleanBackupCommand class.

This command helps cleaning backups.



Class synopsis
==============


class <span class="pl-k">BaseCleanBackupCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - protected string [$commandName](#property-commandName) ;
    - protected string [$dirName](#property-dirName) ;
    - protected string [$extension](#property-extension) ;
    - protected bool [$useDbFilter](#property-useDbFilter) ;

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseCleanBackupCommand/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseCleanBackupCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}




Properties
=============

- <span id="property-commandName"><b>commandName</b></span>

    This property holds the commandName for this instance.
    This is the clean backup command name.
    
    

- <span id="property-dirName"><b>dirName</b></span>

    This property holds the dirName for this instance.
    This is the backup directory name.
    
    

- <span id="property-extension"><b>extension</b></span>

    This property holds the extension for this instance.
    This is the file extension of the backup.
    
    

- <span id="property-useDbFilter"><b>useDbFilter</b></span>

    This property holds whether to use the db filter.
    The db filter is only useful for the clean-backup-db command.
    
    

- <span id="property-application"><b>application</b></span>

    This property holds the DeployApplication instance.
    
    



Methods
==============

- [BaseCleanBackupCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseCleanBackupCommand/__construct.md) &ndash; Builds the BaseCleanBackupCommand instance.
- [BaseCleanBackupCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseCleanBackupCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\BaseCleanBackupCommand<br>
See the source code of [Ling\Deploy\Command\BaseCleanBackupCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/BaseCleanBackupCommand.php)



SeeAlso
==============
Previous class: [BackupFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BackupFilesCommand.md)<br>Next class: [BaseListBackupCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseListBackupCommand.md)<br>
