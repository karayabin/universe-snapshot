[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The CommandInterface class
================
2019-02-26 --> 2019-07-18






Introduction
============

The CommandInterface interface.
A command is like a sub-program of an [application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md).

A command is stand-alone, and participates to make the application more modular.



Class synopsis
==============


abstract class <span class="pl-k">CommandInterface</span>  {

- Methods
    - abstract public [run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface/run.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : int

}






Methods
==============

- [CommandInterface::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface/run.md) &ndash; Runs the command.





Location
=============
Ling\CliTools\Command\CommandInterface<br>
See the source code of [Ling\CliTools\Command\CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/Command/CommandInterface.php)



SeeAlso
==============
Next class: [ApplicationException](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Exception/ApplicationException.md)<br>
