[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The ImportAllCommand class
================
2019-03-12 --> 2019-04-03






Introduction
============

The ImportAllCommand class.

Same as the [ImportCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ImportCommand.md) command,
but applies for all planets in the current application.


Options, flags, parameters
-----------
- -f: force import.

- If this flag is set, the uni-tool will force the reimport of the planets, even if they already exist in the application.
This can be useful for testing purposes for instance.
If the planets have dependencies, the dependencies will also be reimported forcibly.

- -f: do not reboot.

By default, this command will boot the universe if necessary (for instance the universe dir does not exist, or the bigbang.php script was not found).
If this option is set, the booting will not occur.



Class synopsis
==============


class <span class="pl-k">ImportAllCommand</span> extends [ReimportAllCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportAllCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected string [ReimportAllCommand::$importMode](#property-importMode) ;
    - protected bool [ReimportAllCommand::$bootAvailable](#property-bootAvailable) ;
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ImportAllCommand/__construct.md)() : void

- Inherited methods
    - public [ReimportAllCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportAllCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [ImportAllCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ImportAllCommand/__construct.md) &ndash; Builds the ImportAllCommand instance.
- [ReimportAllCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ReimportAllCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\ImportAllCommand


SeeAlso
==============
Previous class: [HelpCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/HelpCommand.md)<br>Next class: [ImportCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ImportCommand.md)<br>
