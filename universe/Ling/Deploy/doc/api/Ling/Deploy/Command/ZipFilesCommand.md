[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The ZipFilesCommand class
================
2019-04-03 --> 2019-04-18






Introduction
============

The ZipFilesCommand class.

A zip utility to zip files listed in a source file.




Options
------------
- src=$path. The path to the source file.
     The source file contains a list of relative paths to remove, one per line.
     The paths are relative to the current site's root dir, or, if the remote option is set, relative to the remote's root dir.
     If the path is a directory, it will be zipped recursively.

- dst=$path. The path to the zip archive to create.
- ?conf=$path. The path to a proxy conf file used temporarily on the remote.
     This option is used internally and you shouldn't use it manually.

- -r: the remote flag. If set, this command will be called on the remote (over ssh) instead of the current site.



Class synopsis
==============


class <span class="pl-k">ZipFilesCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipFilesCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md)() : void
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [ZipFilesCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipFilesCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\ZipFilesCommand


SeeAlso
==============
Previous class: [ZipBackupFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ZipBackupFilesCommand.md)<br>Next class: [DeployException](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Exception/DeployException.md)<br>
