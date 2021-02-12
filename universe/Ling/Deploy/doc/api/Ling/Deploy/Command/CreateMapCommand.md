[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The CreateMapCommand class
================
2019-04-03 --> 2020-12-08






Introduction
============

The CreateMapCommand class.

This command creates a map of the current application.
The map will be located at **$root_dir/.deploy/map.txt**.

If the **-r** flag is set, the operation will be executed on the remote.



Options
----------
- -r: remote. If set,  executes the operation on the remote.
     In this case, the map will be located at **$remote_root_dir/.deploy/map.txt**
- -d: display on screen. If set, the map will also be displayed on the screen.

- conf=$confPath: a proxy conf to use instead of the project conf. This is used internally. You shouldn't need that option.

- word=string. The word used in the sentence: "Creating $word to <b>$mapFile</b>.",
             which is the first sentence displayed by this command.
             This option allows other commands to customize this command message.



Class synopsis
==============


class <span class="pl-k">CreateMapCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CreateMapCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md)() : void
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [CreateMapCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CreateMapCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\CreateMapCommand<br>
See the source code of [Ling\Deploy\Command\CreateMapCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/CreateMapCommand.php)



SeeAlso
==============
Previous class: [CreateDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CreateDatabaseCommand.md)<br>Next class: [CronDeployCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CronDeployCommand.md)<br>
