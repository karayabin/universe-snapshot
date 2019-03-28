[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The StoreGalaxyCommand class
================
2019-03-12 --> 2019-03-21






Introduction
============

The StoreGalaxyCommand class.

This command reimports a whole galaxy to the local server.

The name of the galaxy to import is passed as the parameter of the command line.


The same algorithm as the [store command](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreCommand.md) is used.
The galaxy planets are found from the [local dependency master file](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-dependency-master-file).



Class synopsis
==============


class <span class="pl-k">StoreGalaxyCommand</span> extends [ReimportGalaxyCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportGalaxyCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected string [ReimportGalaxyCommand::$importMode](#property-importMode) ;
    - protected bool [ReimportGalaxyCommand::$bootAvailable](#property-bootAvailable) ;
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreGalaxyCommand/__construct.md)() : void

- Inherited methods
    - public [ReimportGalaxyCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportGalaxyCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [StoreGalaxyCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreGalaxyCommand/__construct.md) &ndash; Builds the StoreGalaxyCommand instance.
- [ReimportGalaxyCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportGalaxyCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\StoreGalaxyCommand


SeeAlso
==============
Previous class: [StoreCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreCommand.md)<br>Next class: [StoreMapCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreMapCommand.md)<br>
