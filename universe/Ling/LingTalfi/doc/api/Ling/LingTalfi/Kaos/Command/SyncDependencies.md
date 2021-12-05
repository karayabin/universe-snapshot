[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)



The SyncDependencies class
================
2019-03-13 --> 2021-12-02






Introduction
============

The SyncDependencies class.

This class helps scanning/resolving potential unsync problems that could occur in the universe.


The main problem we're looking for is the following:

As a dependency evolves, the master planet's dependency files still reference the old dependency planet.
For instance planet B version 1.0.0 depends on planet A, now planet B evolves to 1.1.0 but planet A
still has a reference to planet B version 1.0.0.

To fix the problem, planet A needs to be pushed again (so that it references the latest version of planet B again).

This class allows us to scan for such problems at a planet or universe level (by default), and then resolve it.



Class synopsis
==============


class <span class="pl-k">SyncDependencies</span> extends [KaosGenericCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\LingTalfi\Kaos\Application\KaosApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication.md) [KaosGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/SyncDependencies/run.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed

- Inherited methods
    - public [KaosGenericCommand::__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/__construct.md)() : void
    - public [KaosGenericCommand::setApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/setApplication.md)([Ling\LingTalfi\Kaos\Application\KaosApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication.md) $application) : void

}






Methods
==============

- [SyncDependencies::run](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/SyncDependencies/run.md) &ndash; Runs the command.
- [KaosGenericCommand::__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/__construct.md) &ndash; Builds the KaosGenericCommand instance.
- [KaosGenericCommand::setApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\LingTalfi\Kaos\Command\SyncDependencies<br>
See the source code of [Ling\LingTalfi\Kaos\Command\SyncDependencies](https://github.com/lingtalfi/LingTalfi/blob/master/Kaos/Command/SyncDependencies.php)



SeeAlso
==============
Previous class: [PushUniverseSnapshotCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PushUniverseSnapshotCommand.md)<br>Next class: [KaosException](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Exception/KaosException.md)<br>
