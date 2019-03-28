CliTools
===========
2019-02-22



Suite of tools for creating cli programs. 


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/CliTools
```

Or just download it and place it where you want otherwise.






Summary
===========
- [CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Overview](#overview) 
- [History log](#history-log) 






Overview
=========

Cli tools is a suite of tools that helps you creating cli programs and applications.

The difference between a program and an application is explained in the [ProgramInterface page](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/ProgramInterface.md).

Basically, both programs and applications have a run method, which accepts an [Input](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface.md) and an [Output](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Output/OutputInterface.md) object.

Also, both programs and applications use the [bashtml language](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/bashtml.md) natively by default.

They also agree on the definition of what the [command line](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md) is.


The main difference is that the application uses commands, whereas the program doesn't. 


To dive in, you should start by reading the examples from the [AbstractProgram page](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Program/AbstractProgram.md).






Side note
---------
Note: this planet is a re-fork from my old [CommandLineInput planet](https://github.com/lingtalfi/CommandLineInput), which implementation I was not happy with.

Note2: most of this planet code was stolen from the more powerful (gui like app with widgets like menus, animations in console, ...) but unfortunately undocumented [Komin> console component](https://github.com/lingtalfi/Komin/tree/master/Component/Console),
and the [Symfony/Console](https://github.com/symfony/symfony/tree/master/src/Symfony/Component/Console) code.

 



History Log
=================
    
- 1.10.0 -- 2019-03-26

    - fix BufferedOutput->write not using the formatter

- 1.9.0 -- 2019-03-21

    - useExitStatus now has the default value of false (for compatibility)

- 1.8.0 -- 2019-03-21

    - implemented exit status system for Application and AbstractProgram
    - CommandInterface::run method now returns the exit status rather than void

- 1.7.0 -- 2019-03-18

    - update TableUtil, add use_row_separator option
    - update TableUtil, now handles table without headers

- 1.6.0 -- 2019-03-18

    - add TableUtil

- 1.5.2 -- 2019-03-14

    - fixed documentation missing keyword

- 1.5.1 -- 2019-03-14

    - fixed documentation missing inserts

- 1.5.0 -- 2019-03-13

    - add VirginiaMessageHelper class
    - BashtmlFormatter: add b as an alias for bold

- 1.4.2 -- 2019-03-08

    - fix Application->runProgram not showing exception trace in error verbose mode

- 1.4.1 -- 2019-03-08

    - fix Application->runProgram not showing accurate error message

- 1.4.0 -- 2019-03-04

    - update CommandLineInput, now supports combined one-letter flags, revisited syntax.
    
- 1.3.0 -- 2019-02-28

    - update BashtmlFormatter, change warning to magenta (for better readability)
    
- 1.2.1 -- 2019-02-27

    - fix dependencies.byml
    
- 1.2.0 -- 2019-02-27

    - add methods to the InputInterface: getFlags, getParameters and getOptions
    - add AbstractInput class
    
- 1.1.0 -- 2019-02-26

    - add the CliTools\Program\Application->onCommandInstantiated method
    
- 1.0.0 -- 2019-02-26

    - initial commit
    