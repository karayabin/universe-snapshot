[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The StoreCommand class
================
2019-03-12 --> 2019-04-03






Introduction
============

The StoreCommand class.

This class will import the given planet to the local server.
It uses the same algorithm as the [reimportCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand.md).


This command will import a planet (in the local server) only if either of the following cases is true:

- the planet directory does not exist yet in the local server
- the planet directory exist in the local server, but there is a newer version of this planet (defined in [the local dependency master](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-dependency-master-file))
- the force flag (-f) is set to true

The same applies recursively to the planet dependencies (if any).

Note: non-planet items behave differently: they are only imported if their directory doesn't exist yet in the local server.



The import process always fetches the items from the web.




Options, flags, parameters
-----------
- -f: force reimport.

- If this flag is set, the uni-tool will force the reimport (i.e. re-downloading) of the planet, even if there is no newer version.
This can be useful for testing purposes for instance.
If the planet has dependencies, the dependencies will also be reimported forcibly.



Class synopsis
==============


class <span class="pl-k">StoreCommand</span> extends [ReimportCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected string [ReimportCommand::$importMode](#property-importMode) ;
    - protected bool [ReimportCommand::$bootAvailable](#property-bootAvailable) ;
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreCommand/__construct.md)() : void

- Inherited methods
    - public [ReimportCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [StoreCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreCommand/__construct.md) &ndash; Builds the StoreCommand instance.
- [ReimportCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\StoreCommand


SeeAlso
==============
Previous class: [StoreAllCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreAllCommand.md)<br>Next class: [StoreGalaxyCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreGalaxyCommand.md)<br>
