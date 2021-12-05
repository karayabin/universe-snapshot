CliTools
===========
2019-02-22 -> 2021-07-08



Suite of tools for creating cli programs. 


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.CliTools
```

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

- 1.10.30 -- 2021-07-08

    - add QuestionHelper::askSelectListItem method
  
- 1.10.29 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.10.28 -- 2021-05-25

    - update api, ensure return status is passed correctly from the commands to the app
  
- 1.10.27 -- 2021-05-21

    - add QuestionHelper::askClear method
  
- 1.10.26 -- 2021-03-05

    - update README.md, add install alternative

- 1.10.25 -- 2021-02-04

    - update QuestionHelper::askYesNo, now returns bool instead of string
  
- 1.10.24 -- 2021-02-02

    - add QuestionHelper::askYesNo method
  
- 1.10.23 -- 2021-02-02

    - update AbstractProgram->runProgram, made return type implicit for more flexibility
  
- 1.10.22 -- 2021-02-02

    - update CommandInterface->run, made return type implicit again
  
- 1.10.21 -- 2021-02-02

    - update CommandInterface->run, add return type
  
- 1.10.20 -- 2021-02-02

    - update Application->runProgram, add return type
  
- 1.10.19 -- 2021-01-14

    - update CommandLineInput, add precision about arguments in class comment.
  
- 1.10.18 -- 2021-01-14

    - add CommandLineInputHelper::getCommandLineByInput method
  
- 1.10.17 -- 2021-01-14

    - add CommandLineInputHelper::paramStringToArgv method
  
- 1.10.16 -- 2021-01-14

    - add CommandLineInputHelper
  
- 1.10.15 -- 2021-01-12

    - add BashtmlStringTool

- 1.10.14 -- 2021-01-11

    - update BashtmlFormatter, add setFormatMode method
  
- 1.10.13 -- 2021-01-08

    - add WritableCommandLineInput class
  
- 1.10.12 -- 2021-01-07

    - update CommandLineInput description
  
- 1.10.11 -- 2021-01-05

    - update Application->onCommandNotFound, add input/output arguments
  
- 1.10.10 -- 2021-01-05

    - update Application, add onCommandNotFound hook

- 1.10.9 -- 2020-12-31

    - update BashtmlFormatter to update Bat 1.297
  
- 1.10.8 -- 2020-12-14

    - update BashtmlFormatter, now automatically uses nl2br when in a browser context
  
- 1.10.7 -- 2020-12-14

    - update BashtmlFormatter, now renders html tags when in html environment
  
- 1.10.6 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.10.5 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.10.4 -- 2020-12-04

    - fix LoaderUtil->incrementBy eating characters

- 1.10.3 -- 2020-12-04

    - add LoaderUtil class, update Output class removed messages internal buffer
  
- 1.10.2 -- 2020-12-03

    - update Application, add defaultCommandAlias property with default=help
    
- 1.10.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
        
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
    