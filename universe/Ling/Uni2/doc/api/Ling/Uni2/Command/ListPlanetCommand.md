[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The ListPlanetCommand class
================
2019-03-12 --> 2021-05-31






Introduction
============

The ListPlanetCommand class.
This command will list the planets available to the current application.


Example
-------------



```bash
$ uni listplanet
- Ling/ArrayRefResolver
- Ling/ArrayToString
- Ling/ArrayToTable
- Ling/Kit
- Ling/UniverseTools
- Ling/WebBox
- Ling/ZeusTemplateEngine


$ uni listplanet -v
- Ling/ArrayRefResolver: 1.0.0
- Ling/ArrayToString: 1.4.0
- Ling/ArrayToTable: 1.2.0
- Ling/Kit: undefined
- Ling/UniverseTools: 1.3.0
- Ling/WebBox: 1.0.0
- Ling/ZeusTemplateEngine: 1.2.0

```



Class synopsis
==============


class <span class="pl-k">ListPlanetCommand</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ListPlanetCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed

- Inherited methods
    - public [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md)() : void
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [ListPlanetCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ListPlanetCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md) &ndash; Builds the UniToolGenericCommand instance.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\ListPlanetCommand<br>
See the source code of [Ling\Uni2\Command\ListPlanetCommand](https://github.com/lingtalfi/Uni2/blob/master/Command/ListPlanetCommand.php)



SeeAlso
==============
Previous class: [PackUni2Command](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/Internal/PackUni2Command.md)<br>Next class: [ListStoreCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ListStoreCommand.md)<br>
