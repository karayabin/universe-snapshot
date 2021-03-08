[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The RestoreBackupFilesCommand class
================
2019-04-03 --> 2021-03-05






Introduction
============

The RestoreBackupFilesCommand class.

This command restores files backups.

By default, it will restore the last non-named backup found


To define the name of the files backup to restore, use the **name** option.

By default, this operation will remove all the application files (except the .deploy directory) before extracting the backup.
If you don't want to remove all files, but rather extract the backup within the existing
application, use the **-k** flag.




Options, flags
------------
- name=$name: the name of the database backup to restore.
         The ".zip" extension is appended automatically if necessary.
- -r: remote flag. If set, the operation will be executed on the remote rather than on the local application.
- -k: keep flag. If set, this command will not remove the application files before restoring the backup.



Class synopsis
==============


class <span class="pl-k">RestoreBackupFilesCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/RestoreBackupFilesCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed

- Inherited methods
    - public [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md)() : void
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [RestoreBackupFilesCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/RestoreBackupFilesCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\RestoreBackupFilesCommand<br>
See the source code of [Ling\Deploy\Command\RestoreBackupFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/RestoreBackupFilesCommand.php)



SeeAlso
==============
Previous class: [RestoreBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/RestoreBackupDatabaseCommand.md)<br>Next class: [ShowConfCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ShowConfCommand.md)<br>
