[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The InitLocalServerCommand class
================
2019-03-12 --> 2019-08-30






Introduction
============

The InitLocalServerCommand class.


Creates the bigbang.php script at the root of the local server, if it doesn't exist already.



Class synopsis
==============


class <span class="pl-k">InitLocalServerCommand</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/InitLocalServerCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md)() : void
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [InitLocalServerCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/InitLocalServerCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md) &ndash; Builds the UniToolGenericCommand instance.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\InitLocalServerCommand<br>
See the source code of [Ling\Uni2\Command\InitLocalServerCommand](https://github.com/lingtalfi/Uni2/blob/master/Command/InitLocalServerCommand.php)



SeeAlso
==============
Previous class: [InfoUniverseCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/InfoUniverseCommand.md)<br>Next class: [PackUni2Command](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/Internal/PackUni2Command.md)<br>
