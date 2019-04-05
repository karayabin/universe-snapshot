[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The ReimportMapCommand class
================
2019-03-12 --> 2019-04-05






Introduction
============

The ReimportMapCommand class.

Same as the [ReimportCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportCommand.md) command,
but applies to all planets defined in a map file.


The map file is simply a [babyYaml](https://github.com/lingtalfi/BabyYaml) file containing a list of the planets you want to import.



Here is an example **map.byml** file:

```yaml
- Ling.Bat
- Ling.Planet2
- Ling.Planet3
- MyUniverse.PlanetXX
- MyUniverse.Z6PO
- ...
```

Each item is composed of the galaxy name, followed by a dot, followed by the planet short name.


The map location should be passed as the sole parameter of this command on the command line.
By default, if no map location is specified, the command will search for **map.byml** at the root of
the application's universe directory and executes it if it finds it.




How to use
------------

```bash
# will use the application's universe/map.byml file if it finds it
uni reimport-map

# will use the /path/to/my/map.byml map
uni reimport-map /path/to/my/map.byml
```





Options, flags
-----------
- -f: force reimport.

- If this flag is set, the uni-tool will force the reimport of the planets.
If the planets have dependencies, the dependencies will also be reimported forcibly.

- -f: do not reboot.

By default, this command will boot the universe if necessary (for instance the universe dir does not exist, or the bigbang.php script was not found).
If this option is set, the booting will not occur.



Class synopsis
==============


class <span class="pl-k">ReimportMapCommand</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - protected string [$importMode](#property-importMode) ;
    - protected bool [$bootAvailable](#property-bootAvailable) ;

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportMapCommand/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportMapCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

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

- [ReimportMapCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportMapCommand/__construct.md) &ndash; Builds the ReimportMapCommand instance.
- [ReimportMapCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportMapCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\ReimportMapCommand


SeeAlso
==============
Previous class: [ReimportGalaxyCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportGalaxyCommand.md)<br>Next class: [ReimportUniverseCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportUniverseCommand.md)<br>
