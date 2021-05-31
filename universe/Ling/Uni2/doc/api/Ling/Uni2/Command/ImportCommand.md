[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The ImportCommand class
================
2019-03-12 --> 2021-05-31






Introduction
============

The ImportCommand class.

This class implements the import command defined in the [uni-tool upgrade system document](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-upgrade-system).


This command will import a planet only if either of the following cases is true:

- the planet directory does not exist yet in the application
- the force flag (-f) is set to true

The same applies recursively to the planet dependencies (if any).

Note: non-planet items behave differently: they are only imported if their directory doesn't exist yet in the universe-dependencies directory.



The import process is the same for all items:
- first try to fetch the item (planet or non-planet) from the local server (much faster)
- if the local server doesn't contain the item, then fetch the item on the web. In case of success, create a local server copy for the next time.




Options, flags, parameters
-----------
- -f: force import.

     - If this flag is set, the uni-tool will force the reimport of the planet, even if it already exists in the application.
         This can be useful for testing purposes for instance.
         If the planet has dependencies, the dependencies will also be reimported forcibly.

- -f: do not reboot.

     By default, this command will boot the universe if necessary (for instance the universe dir does not exist, or the bigbang.php script was not found).
     If this option is set, the booting will not occur.



Class synopsis
==============


class <span class="pl-k">ImportCommand</span> extends [ReimportCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected string [ReimportCommand::$importMode](#property-importMode) ;
    - protected bool [ReimportCommand::$bootAvailable](#property-bootAvailable) ;
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ImportCommand/__construct.md)() : void

- Inherited methods
    - public [ReimportCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [ImportCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ImportCommand/__construct.md) &ndash; Builds the ImportCommand instance.
- [ReimportCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\ImportCommand<br>
See the source code of [Ling\Uni2\Command\ImportCommand](https://github.com/lingtalfi/Uni2/blob/master/Command/ImportCommand.php)



SeeAlso
==============
Previous class: [ImportAllCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ImportAllCommand.md)<br>Next class: [ImportGalaxyCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ImportGalaxyCommand.md)<br>
