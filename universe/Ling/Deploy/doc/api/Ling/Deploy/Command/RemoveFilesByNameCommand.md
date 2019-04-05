[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The RemoveFilesByNameCommand class
================
2019-04-03 --> 2019-04-04






Introduction
============

The RemoveFilesByNameCommand class.

Removes files by name.


Options
------------
- dir=$path. The path of the root dir containing the files to remove.
- names=$names. The comma separated list of file names to remove.
- -r: remote. If set, the command will operate on the remote rather than on the site.



Class synopsis
==============


class <span class="pl-k">RemoveFilesByNameCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/RemoveFilesByNameCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md)() : void
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [RemoveFilesByNameCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/RemoveFilesByNameCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\RemoveFilesByNameCommand


SeeAlso
==============
Previous class: [PushDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushDatabaseCommand.md)<br>Next class: [RemoveFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/RemoveFilesCommand.md)<br>
