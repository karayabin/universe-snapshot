[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The ReimportCommand class
================
2019-03-12 --> 2019-03-19






Introduction
============

The ReimportCommand class.

This class implements the reimport command defined in the [uni-tool upgrade system document](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-upgrade-system).


This command will import a planet only if either of the following cases is true:

- the planet directory does not exist yet in the application
- the planet directory exist in the application, but there is a newer version of this planet (defined in [the local dependency master](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-dependency-master-file))
- the force flag (-f) is set to true

The same applies recursively to the planet dependencies (if any).

Note: non-planet items behave differently: they are only imported if their directory doesn't exist yet in the universe-dependencies directory.



The import process is the same for all items:
- first try to fetch the item (planet or non-planet) from the local server (much faster)
- if the local server doesn't contain the item, then fetch the item on the web. In case of success, create a local server copy for the next time.




Options, flags, parameters
-----------
- -f: force reimport.

- If this flag is set, the uni-tool will force the reimport of the planet, even if there is no newer version.
This can be useful for testing purposes for instance.
If the planet has dependencies, the dependencies will also be reimported forcibly.

- -f: do not reboot.

By default, this command will boot the universe if necessary (for instance the universe dir does not exist, or the bigbang.php script was not found).
If this option is set, the booting will not occur.



Class synopsis
==============


class <span class="pl-k">ReimportCommand</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - protected string [$importMode](#property-importMode) ;
    - protected bool [$bootAvailable](#property-bootAvailable) ;

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void

- Inherited methods
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}




Properties
=============

- <span id="property-importMode"><b>importMode</b></span>

    This property holds the importMode for this instance.
    See the [importMode definition](https://github.com/lingtalfi/Uni2/blob/master/doc/pages/import-mode.md) for more details.
    
    

- <span id="property-bootAvailable"><b>bootAvailable</b></span>

    This property holds whether the [boot process](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/bootUniverse.md) should be available to this command.
    
    

- <span id="property-application"><b>application</b></span>

    This property holds the UniToolApplication instance.
    
    



Methods
==============

- [ReimportCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand/__construct.md) &ndash; Builds the ReimportCommand instance.
- [ReimportCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\ReimportCommand


SeeAlso
==============
Previous class: [ReimportAllCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportAllCommand.md)<br>Next class: [ReimportGalaxyCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportGalaxyCommand.md)<br>
