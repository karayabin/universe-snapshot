[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The StoreAllCommand class
================
2019-03-12 --> 2019-03-21






Introduction
============

The StoreAllCommand class.

Same as the [StoreCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreCommand.md) command,
but applies for all planets in the local server.


Options, flags, parameters
-----------
- -f: force reimport.

- If this flag is set, the uni-tool will force the reimport of the planets, even if there is no newer version.
This can be useful for testing purposes for instance.
If the planets have dependencies, the dependencies will also be reimported forcibly.



Class synopsis
==============


class <span class="pl-k">StoreAllCommand</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreAllCommand/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreAllCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void

- Inherited methods
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [StoreAllCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreAllCommand/__construct.md) &ndash; Builds the StoreAllCommand instance.
- [StoreAllCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreAllCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\StoreAllCommand


SeeAlso
==============
Previous class: [ShowDependencyMasterCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ShowDependencyMasterCommand.md)<br>Next class: [StoreCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreCommand.md)<br>
