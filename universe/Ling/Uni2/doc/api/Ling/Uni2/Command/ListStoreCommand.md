[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The ListStoreCommand class
================
2019-03-12 --> 2021-03-05






Introduction
============

The ListStoreCommand class.
This command will list the planets of the local server.


Example
-------------

```bash
$ uni liststore
- Ling/ArrayRefResolver
- Ling/ArrayToString
- Ling/ArrayToTable
- Ling/Kit
- Ling/UniverseTools
- Ling/WebBox
- Ling/ZeusTemplateEngine


$ uni liststore -v
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


class <span class="pl-k">ListStoreCommand</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ListStoreCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed

- Inherited methods
    - public [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md)() : void
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [ListStoreCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ListStoreCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md) &ndash; Builds the UniToolGenericCommand instance.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\ListStoreCommand<br>
See the source code of [Ling\Uni2\Command\ListStoreCommand](https://github.com/lingtalfi/Uni2/blob/master/Command/ListStoreCommand.php)



SeeAlso
==============
Previous class: [ListPlanetCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ListPlanetCommand.md)<br>Next class: [ReimportAllCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportAllCommand.md)<br>
