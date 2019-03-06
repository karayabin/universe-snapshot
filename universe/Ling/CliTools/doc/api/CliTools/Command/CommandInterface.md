[Back to the CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools.md)



The CommandInterface class
================
2019-02-26 --> 2019-03-05






Introduction
============

The CommandInterface interface.
A command is like a sub-program of an [application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/Application.md).

A command is stand-alone, and participates to make the application more modular.



Class synopsis
==============


abstract class <span class="pl-k">CommandInterface</span>  {

- Methods
    - abstract public [run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Command/CommandInterface/run.md)([CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface.md) $input, [CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/OutputInterface.md) $output) : void

}






Methods
==============

- [CommandInterface::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Command/CommandInterface/run.md) &ndash; Runs the command.





Location
=============
CliTools\Command\CommandInterface


SeeAlso
==============
Next class: [ApplicationException](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Exception/ApplicationException.md)<br>
