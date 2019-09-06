[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The CheckCommand class
================
2019-03-12 --> 2019-08-30






Introduction
============

The CheckCommand class.


Will list the problems of the current application's universe.
It will:

- list the unresolved dependencies (for instance if planet A depends on planet B, but planet B is not in the application).
- list all planets which don't have a valid **meta-info.byml** file at their root (valid means it contains at least the version number).
     See [the meta info file](https://github.com/lingtalfi/Uni2/blob/master/README.md#meta-infobyml) for more details.
- list all planets which have dependencies which call unknown importers.


Options, flags:
------------
- -r: resolve. If this flag is set, the command will try to resolve unresolved planet dependencies.



This command is mainly used to diagnose problems that might occur when you manipulate planet
structures manually (which you shouldn't).
I used it during the construction of the uni-tool.
Hopefully it will still be useful after that.



Class synopsis
==============


class <span class="pl-k">CheckCommand</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/CheckCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md)() : void
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [CheckCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/CheckCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md) &ndash; Builds the UniToolGenericCommand instance.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\CheckCommand<br>
See the source code of [Ling\Uni2\Command\CheckCommand](https://github.com/lingtalfi/Uni2/blob/master/Command/CheckCommand.php)



SeeAlso
==============
Previous class: [UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md)<br>Next class: [CleanCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/CleanCommand.md)<br>
