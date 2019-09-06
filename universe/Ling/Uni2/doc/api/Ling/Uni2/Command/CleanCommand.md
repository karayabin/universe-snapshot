[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The CleanCommand class
================
2019-03-12 --> 2019-08-30






Introduction
============

The CleanCommand class.

Parses all planets and items of the application recursively, and removes any entries set in the
clean_items configuration.

Use the **conf** command to see the value of the clean_items directive.



Class synopsis
==============


class <span class="pl-k">CleanCommand</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/CleanCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md)() : void
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [CleanCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/CleanCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md) &ndash; Builds the UniToolGenericCommand instance.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\CleanCommand<br>
See the source code of [Ling\Uni2\Command\CleanCommand](https://github.com/lingtalfi/Uni2/blob/master/Command/CleanCommand.php)



SeeAlso
==============
Previous class: [CheckCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/CheckCommand.md)<br>Next class: [ConfCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ConfCommand.md)<br>
