[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The ZipBackupCommand class
================
2019-04-03 --> 2020-12-08






Introduction
============

The ZipBackupCommand class.

Creates a zip archive containing the selected backup files.
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



Class synopsis
==============


class <span class="pl-k">ZipBackupCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md)() : void
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [ZipBackupCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\ZipBackupCommand<br>
See the source code of [Ling\Deploy\Command\ZipBackupCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/ZipBackupCommand.php)



SeeAlso
==============
Previous class: [UnzipCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/UnzipCommand.md)<br>Next class: [ZipBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupDatabaseCommand.md)<br>
