[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)



The PackAndPushUniToolCommand class
================
2019-03-13 --> 2020-12-03






Introduction
============

The PackAndPushUniToolCommand class.

This command does the following:

- It builds the dependency master by parsing all planets in the local server (/myphp/universe).
         The dependency master file is first written at the Uni2 planet root.
- It rebuilds the universe-meta.byml file and also put it at the root of the Uni2 planet.
- Packs the uni directory of the universe-naive-importer planet (using the private:pack command of the uni tool).
- Copy the dependency master and universe meta files to the universe-naive-importer root.
- Updates the version in the universe-naive-importer's meta-info.byml.
- Updates the Uni2/info/uni-tool-info.byml information.
- Updates the universe-naive-importer README.md History Log section.
- Pushes the universe-naive-importer to github.com.


The goal is basically to update the [uni tool](https://github.com/lingtalfi/universe-naive-importer), so that when an user downloads it, she gets
the latest version which can import every package.



Class synopsis
==============


class <span class="pl-k">PackAndPushUniToolCommand</span> extends [KaosGenericCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\LingTalfi\Kaos\Application\KaosApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication.md) [KaosGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PackAndPushUniToolCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [KaosGenericCommand::__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/__construct.md)() : void
    - public [KaosGenericCommand::setApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/setApplication.md)([Ling\LingTalfi\Kaos\Application\KaosApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication.md) $application) : void

}






Methods
==============

- [PackAndPushUniToolCommand::run](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PackAndPushUniToolCommand/run.md) &ndash; Runs the command.
- [KaosGenericCommand::__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/__construct.md) &ndash; Builds the KaosGenericCommand instance.
- [KaosGenericCommand::setApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\LingTalfi\Kaos\Command\PackAndPushUniToolCommand<br>
See the source code of [Ling\LingTalfi\Kaos\Command\PackAndPushUniToolCommand](https://github.com/lingtalfi/LingTalfi/blob/master/Kaos/Command/PackAndPushUniToolCommand.php)



SeeAlso
==============
Previous class: [KaosGenericCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand.md)<br>Next class: [PackLightPluginCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PackLightPluginCommand.md)<br>
