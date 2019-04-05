[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The BaseListBackupCommand class
================
2019-04-03 --> 2019-04-04






Introduction
============

The BaseListBackupCommand class.
A helper for commands which list backups.



Class synopsis
==============


class <span class="pl-k">BaseListBackupCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - protected string [$extension](#property-extension) ;
    - protected string [$backupDirName](#property-backupDirName) ;
    - protected string [$commandName](#property-commandName) ;

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseListBackupCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md)() : void
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}




Properties
=============

- <span id="property-extension"><b>extension</b></span>

    This property holds the extension for this instance.
    
    

- <span id="property-backupDirName"><b>backupDirName</b></span>

    This property holds the backupDirName for this instance.
    
    

- <span id="property-commandName"><b>commandName</b></span>

    This property holds the commandName for this instance.
    
    

- <span id="property-application"><b>application</b></span>

    This property holds the DeployApplication instance.
    
    



Methods
==============

- [BaseListBackupCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseListBackupCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\BaseListBackupCommand


SeeAlso
==============
Previous class: [BaseCleanBackupCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BaseCleanBackupCommand.md)<br>Next class: [CleanBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CleanBackupDatabaseCommand.md)<br>
