[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The StoreMapCommand class
================
2019-03-12 --> 2019-03-21






Introduction
============

The StoreMapCommand class.

Same as the [ReimportMapCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportMapCommand.md) command,
but uses the ["store" import mode](https://github.com/lingtalfi/Uni2/blob/master/doc/pages/import-mode.md) instead.



Class synopsis
==============


class <span class="pl-k">StoreMapCommand</span> extends [ReimportMapCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportMapCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected string [ReimportMapCommand::$importMode](#property-importMode) ;
    - protected bool [ReimportMapCommand::$bootAvailable](#property-bootAvailable) ;
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreMapCommand/__construct.md)() : void

- Inherited methods
    - public [ReimportMapCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportMapCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [StoreMapCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreMapCommand/__construct.md) &ndash; Builds the StoreMapCommand instance.
- [ReimportMapCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportMapCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\StoreMapCommand


SeeAlso
==============
Previous class: [StoreGalaxyCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreGalaxyCommand.md)<br>Next class: [ToDirCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ToDirCommand.md)<br>
