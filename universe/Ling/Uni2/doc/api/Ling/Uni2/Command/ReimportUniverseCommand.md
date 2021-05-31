[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The ReimportUniverseCommand class
================
2019-03-12 --> 2021-05-31






Introduction
============

The ReimportUniverseCommand class.

This command re-imports the whole universe.

The same algorithm as the [reimport command](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand.md) is used.
The universe's planets are found from the [local dependency master file](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-dependency-master-file).



Class synopsis
==============


class <span class="pl-k">ReimportUniverseCommand</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - protected string [$importMode](#property-importMode) ;
    - protected bool [$bootAvailable](#property-bootAvailable) ;

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportUniverseCommand/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportUniverseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed

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

- [ReimportUniverseCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportUniverseCommand/__construct.md) &ndash; Builds the ReimportUniverseCommand instance.
- [ReimportUniverseCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportUniverseCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\ReimportUniverseCommand<br>
See the source code of [Ling\Uni2\Command\ReimportUniverseCommand](https://github.com/lingtalfi/Uni2/blob/master/Command/ReimportUniverseCommand.php)



SeeAlso
==============
Previous class: [ReimportMapCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportMapCommand.md)<br>Next class: [ShowDependencyMasterCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ShowDependencyMasterCommand.md)<br>
