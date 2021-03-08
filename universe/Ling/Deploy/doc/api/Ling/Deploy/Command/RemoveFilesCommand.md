[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The RemoveFilesCommand class
================
2019-04-03 --> 2021-03-05






Introduction
============

The RemoveFilesCommand class.

Removes files listed in a source file.


Options
------------
- src=$path. The path to the source file.
     The source file contains a list of relative paths to remove, one per line.
     The paths are relative to the current site's root dir, or, if the remote option is set, relative to the remote's root dir.
     If the path is a directory, it will be ignored (design by security, to prevent removing entire directories).


- -r: remote. If set, the command will operate on the remote rather than on the site.



Class synopsis
==============


class <span class="pl-k">RemoveFilesCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/RemoveFilesCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed

- Inherited methods
    - public [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md)() : void
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [RemoveFilesCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/RemoveFilesCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\RemoveFilesCommand<br>
See the source code of [Ling\Deploy\Command\RemoveFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/RemoveFilesCommand.php)



SeeAlso
==============
Previous class: [RemoveFilesByNameCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/RemoveFilesByNameCommand.md)<br>Next class: [RestoreBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/RestoreBackupDatabaseCommand.md)<br>
