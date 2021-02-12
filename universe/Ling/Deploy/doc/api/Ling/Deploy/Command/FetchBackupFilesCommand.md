[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The FetchBackupFilesCommand class
================
2019-04-03 --> 2020-12-08






Introduction
============

The FetchBackupFilesCommand class.

This command repatriates files backups from the remote to the local project.

By default, it repatriates all files backup.
To define a subset of files backup to repatriate, you can use one of the following options:

- the **name** option
- the **last** option

If the **name** option is defined, the last option will be ignored.

The **name** option allows you to specify the name(s) of the files backups to fetch.
The **last** option allows you to define the number of the non-named backups to fetch.

This operation will overwrite existing files.



Options, flags
------------
- name=$names: the comma separated list of backup names to repatriate. Note: the ".zip" extension is appended automatically if omitted.
                 Spaces between the comma an the names are allowed.
- last=$number: indicates the (max) number of non-named backups to fetch.



Class synopsis
==============


class <span class="pl-k">FetchBackupFilesCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchBackupFilesCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md)() : void
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [FetchBackupFilesCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchBackupFilesCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\FetchBackupFilesCommand<br>
See the source code of [Ling\Deploy\Command\FetchBackupFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/FetchBackupFilesCommand.php)



SeeAlso
==============
Previous class: [FetchBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchBackupDatabaseCommand.md)<br>Next class: [FetchCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchCommand.md)<br>
