[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)



The HelpCommand class
================
2019-03-13 --> 2020-04-15






Introduction
============

The HelpCommand class.
This command will display the kaos help to the user.



Class synopsis
==============


class <span class="pl-k">HelpCommand</span> extends [KaosGenericCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\LingTalfi\Kaos\Application\KaosApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication.md) [KaosGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/HelpCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - private [n](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/HelpCommand/n.md)(string $commandName) : string
    - private [o](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/HelpCommand/o.md)(string $option) : string
    - private [d](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/HelpCommand/d.md)(string $option) : string

- Inherited methods
    - public [KaosGenericCommand::__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/__construct.md)() : void
    - public [KaosGenericCommand::setApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/setApplication.md)([Ling\LingTalfi\Kaos\Application\KaosApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication.md) $application) : void

}






Methods
==============

- [HelpCommand::run](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/HelpCommand/run.md) &ndash; Runs the command.
- [HelpCommand::n](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/HelpCommand/n.md) &ndash; Returns a formatted command name string.
- [HelpCommand::o](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/HelpCommand/o.md) &ndash; Returns a formatted option/parameter string.
- [HelpCommand::d](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/HelpCommand/d.md) &ndash; Returns a formatted configuration directive string.
- [KaosGenericCommand::__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/__construct.md) &ndash; Builds the KaosGenericCommand instance.
- [KaosGenericCommand::setApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\LingTalfi\Kaos\Command\HelpCommand<br>
See the source code of [Ling\LingTalfi\Kaos\Command\HelpCommand](https://github.com/lingtalfi/LingTalfi/blob/master/Kaos/Command/HelpCommand.php)



SeeAlso
==============
Previous class: [KaosApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication.md)<br>Next class: [InitializePlanetCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/InitializePlanetCommand.md)<br>
