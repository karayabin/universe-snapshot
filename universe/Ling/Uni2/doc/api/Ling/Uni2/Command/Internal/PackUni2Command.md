[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The PackUni2Command class
================
2019-03-12 --> 2019-08-30






Introduction
============

The PackUni2Command class.

This is a private command that I use to prepare the uni-tool for export to github.com.

- creates the following structure at the location defined by the path option (usually ending with /uni)


```txt
- $path/
----- uni.php
----- universe
--------- ...contains all planets necessary to make the uni-tool work properly
```


The script **uni.php** is the uni-tool console program. It's ready to execute.



Options
-----------
--path=$path, the path to the uni-tools directory to create. Generally, this directory is named uni.


Flags
-----------
- -f: force mode. By default, if a file exists at the path specified with the $path option,
     then the command does nothing (it aborts).
     To force the creation of the directory, set this flag: it will remove the **$path** directory/entry if
     it exists before creating the new directory.



Class synopsis
==============


class <span class="pl-k">PackUni2Command</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/Internal/PackUni2Command/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md)() : void
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [PackUni2Command::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/Internal/PackUni2Command/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md) &ndash; Builds the UniToolGenericCommand instance.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\Internal\PackUni2Command<br>
See the source code of [Ling\Uni2\Command\Internal\PackUni2Command](https://github.com/lingtalfi/Uni2/blob/master/Command/Internal/PackUni2Command.php)



SeeAlso
==============
Previous class: [InitLocalServerCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/InitLocalServerCommand.md)<br>Next class: [ListPlanetCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ListPlanetCommand.md)<br>
