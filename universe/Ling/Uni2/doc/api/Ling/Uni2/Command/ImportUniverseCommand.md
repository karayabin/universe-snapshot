[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The ImportUniverseCommand class
================
2019-03-12 --> 2019-03-19






Introduction
============

The ImportUniverseCommand class.

This command imports the whole universe.

The same algorithm as the [import command](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ImportCommand.md) is used.
The universe's planets are found from the [local dependency master file](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-dependency-master-file).



Class synopsis
==============


class <span class="pl-k">ImportUniverseCommand</span> extends [ReimportUniverseCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportUniverseCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected string [ReimportUniverseCommand::$importMode](#property-importMode) ;
    - protected bool [ReimportUniverseCommand::$bootAvailable](#property-bootAvailable) ;
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ImportUniverseCommand/__construct.md)() : void

- Inherited methods
    - public [ReimportUniverseCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportUniverseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [ImportUniverseCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ImportUniverseCommand/__construct.md) &ndash; Builds the ImportUniverseCommand instance.
- [ReimportUniverseCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportUniverseCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\ImportUniverseCommand


SeeAlso
==============
Previous class: [ImportMapCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ImportMapCommand.md)<br>Next class: [InfoApplicationCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/InfoApplicationCommand.md)<br>
