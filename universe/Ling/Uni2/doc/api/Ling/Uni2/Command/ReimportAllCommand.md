[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The ReimportAllCommand class
================
2019-03-12 --> 2021-05-31






Introduction
============

The ReimportAllCommand class.

Same as the [ReimportCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand.md) command,
but applies for all planets in the current application.


Options, flags, parameters
-----------
- -f: force reimport.

     - If this flag is set, the uni-tool will force the reimport of the planets, even if there is no newer version.
         This can be useful for testing purposes for instance.
         If the planets have dependencies, the dependencies will also be reimported forcibly.

- -f: do not reboot.

     By default, this command will boot the universe if necessary (for instance the universe dir does not exist, or the bigbang.php script was not found).
     If this option is set, the booting will not occur.



Class synopsis
==============


class <span class="pl-k">ReimportAllCommand</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - protected string [$importMode](#property-importMode) ;
    - protected bool [$bootAvailable](#property-bootAvailable) ;

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportAllCommand/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportAllCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed

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

- [ReimportAllCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportAllCommand/__construct.md) &ndash; Builds the ReimportAllCommand instance.
- [ReimportAllCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportAllCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\ReimportAllCommand<br>
See the source code of [Ling\Uni2\Command\ReimportAllCommand](https://github.com/lingtalfi/Uni2/blob/master/Command/ReimportAllCommand.php)



SeeAlso
==============
Previous class: [ListStoreCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ListStoreCommand.md)<br>Next class: [ReimportCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand.md)<br>
