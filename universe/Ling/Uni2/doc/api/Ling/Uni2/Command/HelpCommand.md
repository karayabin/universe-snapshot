[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The HelpCommand class
================
2019-03-12 --> 2019-04-05






Introduction
============

The HelpCommand class.
This command will display the uni-tool help to the user.



Class synopsis
==============


class <span class="pl-k">HelpCommand</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/HelpCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - private [n](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/HelpCommand/n.md)(string $commandName) : string
    - private [o](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/HelpCommand/o.md)(string $option) : string
    - private [d](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/HelpCommand/d.md)(string $option) : string

- Inherited methods
    - public [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md)() : void
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [HelpCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/HelpCommand/run.md) &ndash; Runs the command.
- [HelpCommand::n](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/HelpCommand/n.md) &ndash; Returns a formatted command name string.
- [HelpCommand::o](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/HelpCommand/o.md) &ndash; Returns a formatted option/parameter string.
- [HelpCommand::d](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/HelpCommand/d.md) &ndash; Returns a formatted configuration directive string.
- [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md) &ndash; Builds the UniToolGenericCommand instance.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\HelpCommand


SeeAlso
==============
Previous class: [DependencyMasterPathCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/DependencyMasterPathCommand.md)<br>Next class: [ImportAllCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ImportAllCommand.md)<br>
