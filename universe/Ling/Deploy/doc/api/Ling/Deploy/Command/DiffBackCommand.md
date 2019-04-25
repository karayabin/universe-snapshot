[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The DiffBackCommand class
================
2019-04-03 --> 2019-04-18






Introduction
============

The DiffBackCommand class.

Same as the [DiffCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DiffCommand.md), but displays the differences to have the remote files mirrored on the site.


Flags
------------
- -f: files. If this flag is set, the diff command will write the diff to 3 files instead of displaying it
         to the screen. The 3 files are:
             - $app/.deploy/diff-add.txt
             - $app/.deploy/diff-remove.txt
             - $app/.deploy/diff-replace.txt



Class synopsis
==============


class <span class="pl-k">DiffBackCommand</span> extends [DiffCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DiffCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected string [DiffCommand::$sentenceCreateDiff](#property-sentenceCreateDiff) ;
    - protected bool [DiffCommand::$reverse](#property-reverse) ;
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DiffBackCommand/__construct.md)() : void

- Inherited methods
    - public [DiffCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DiffCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [DiffBackCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DiffBackCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DiffCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DiffCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\DiffBackCommand


SeeAlso
==============
Previous class: [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md)<br>Next class: [DiffCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DiffCommand.md)<br>
