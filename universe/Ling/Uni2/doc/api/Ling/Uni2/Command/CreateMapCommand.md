[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The CreateMapCommand class
================
2019-03-12 --> 2019-03-19






Introduction
============

The CreateMapCommand class.

Creates a map file to be used with the [import-map](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ImportMapCommand.md), [reimport-map](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportMapCommand.md), and [store-map](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreMapCommand.md) commands.



The map file is simply a [babyYaml](https://github.com/lingtalfi/BabyYaml) file containing a list of the planets of the current application.

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


The map is created by default at the root of the application's universe directory.

If the map parameter is passed to the command line, then the map will be created at the location
defined by that map.




How to use
------------

```bash
# will create the map in the application's universe/map.byml file.
uni map

# will create the map in /path/to/my/map.byml.
uni map /path/to/my/map.byml
```


Options
-----------

- -f: force mode. By default, the command will not overwrite an existing map.
To overwrite an existing map, set this flag.



Class synopsis
==============


class <span class="pl-k">CreateMapCommand</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/CreateMapCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void

- Inherited methods
    - public [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md)() : void
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [CreateMapCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/CreateMapCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md) &ndash; Builds the UniToolGenericCommand instance.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\CreateMapCommand


SeeAlso
==============
Previous class: [CreateDependencyMasterCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/CreateDependencyMasterCommand.md)<br>Next class: [DependencyMasterPathCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/DependencyMasterPathCommand.md)<br>
