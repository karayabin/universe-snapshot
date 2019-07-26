[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)



The PushCommand class
================
2019-03-13 --> 2019-07-18






Introduction
============

The PushCommand class.

This command does the following (for the given planet):


- Updates the version in meta-info.byml based on the **History Log** section in the README.md, or create it if necessary.
- Updates/creates the dependencies.byml file if necessary
- Builds the doc, if there is a corresponding LingTalfi/DocBuilder object.
- Creates/updates the sitemap.txt and robot.txt
- Pushes the planet to github.com.
- Ask google to crawl the sitemap.
- If the version number is greater than before, executes the PackAndPushUniTool command (see the [PackAndPushUniToolCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PackAndPushUniToolCommand.md) class for more details).


Note: this command assumes that the planet dir represents a planet only if it contains a README.md file with a **History Log** section.


Options, flags
----------------

- ?planet-dir=string. The path to the planet directory to push. If not set, will use the current directory.
- -n: no packing. If set, the PackAndPushUniTool command will NOT be executed.



Class synopsis
==============


class <span class="pl-k">PushCommand</span> extends [KaosGenericCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\LingTalfi\Kaos\Application\KaosApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication.md) [KaosGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PushCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [KaosGenericCommand::__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/__construct.md)() : void
    - public [KaosGenericCommand::setApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/setApplication.md)([Ling\LingTalfi\Kaos\Application\KaosApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication.md) $application) : void

}






Methods
==============

- [PushCommand::run](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PushCommand/run.md) &ndash; Runs the command.
- [KaosGenericCommand::__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/__construct.md) &ndash; Builds the KaosGenericCommand instance.
- [KaosGenericCommand::setApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\LingTalfi\Kaos\Command\PushCommand<br>
See the source code of [Ling\LingTalfi\Kaos\Command\PushCommand](https://github.com/lingtalfi/LingTalfi/blob/master/Kaos/Command/PushCommand.php)



SeeAlso
==============
Previous class: [PackLightPluginCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PackLightPluginCommand.md)<br>Next class: [PushUniverseSnapshotCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PushUniverseSnapshotCommand.md)<br>
