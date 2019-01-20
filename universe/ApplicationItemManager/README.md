ApplicationItemManager
========================
2017-03-30 -> 2017-07-30




A manager for the modules of your application.



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).





What is it?
================

This planet contains a set of tools helping you implementing a management system for your modules.


A picture being worth a thousand words, let's start with a picture:

[![ApplicationItemManager-overview.jpg](https://s19.postimg.org/kn2gln6g3/Application_Item_Manager-overview.jpg)](https://postimg.org/image/5ecj7vcrj/)


As you can probably see, there are different objects:

- Repository: this object represents a web repository (like a github repo for instance). A repository contains items of a certain type.
            The type can be what you want: a module, a plugin, a theme, a widget, you name it.
            
            
- Application: this is your application. There is an important directory called **import directory**, which is where
                the items will be imported.
                
- Importer: knows the technique of how to copy an item from the web repository to the **import directory** of your app.
                
- Installer: some items (like modules for instance) might require to be installed after they are imported.
                The Installer is the object for installing/uninstalling items in your application.
                What installing means depends on your item type, it might involve actions like copying files in your
                application, creating tables in your database, etc...
                
- ApplicationItemManager: this is the manager of all those objects: it coordinates the actions between the different
                            actors and provide a simple api for the developer, with methods like import, install, search, and so on.
                            
- Program: the program wraps the ApplicationItemManager into a console program, allowing you to control the ApplicationItemManager from the command line.                            



Note: the Program is actually a planet itself: it's the [Program]([Program](https://github.com/lingtalfi/program)) planet.



Install
==========
Download the repository directly, or you can use the [uni importer](https://github.com/lingtalfi/universe-naive-importer):


```bash
uni import ApplicationItemManager
```



How?
==========

First, decide what's an item: is it a module?, a plugin?, a theme?
 
Then, decide where you want to import them, this directory is called the import directory.
The import directory is where your items will be downloaded.



Now you can create a Repository, which contains the list of all items.
A standard repository is the LingUniverseRepository from the [uni importer](https://github.com/lingtalfi/universe-naive-importer).

Have a look at the LingUniverseRepository class and make your own Repository based on that model.

In the examples below, I will be using the LingUniverseRepository.


Then, you can use the ApplicationItemManager.

An ApplicationItemManager is an object that provides useful commands for importing/installing/listing/searching items.

To use the ApplicationItemManager as a standalone tool, you can use the following example as a starting point:




```php
<?php

use ApplicationItemManager\Importer\GithubImporter;
use ApplicationItemManager\LingApplicationItemManager;
use ApplicationItemManager\Repository\LingUniverseRepository;
use Output\WebProgramOutput;


require_once __DIR__ . "/../init.php"; // just call a decent autoloader


//--------------------------------------------
// UNIVERSE APP MANAGER
//--------------------------------------------
$output = WebProgramOutput::create(); // testing from a browser, change this to ProgramOutput to test from cli
$importDir = "/myphp/kaminos/app/planets";
$manager = LingApplicationItemManager::create()// the LingApplicationItemManager is just Output friendly
->setOutput($output)
    ->addRepository(LingUniverseRepository::create())
    ->bindImporter('ling', GithubImporter::create()->setGithubRepoName("lingtalfi"))
    ->setFavoriteRepositoryId('ling')
    ->setImportDirectory($importDir);


// below are the most useful commands
a($manager->search("ba")); // search the term "ba" in the available items
$manager->listAvailable(); // list the available items
$manager->install("Bat"); // install the Bat item (will import it if necessary)
$manager->import("AdminTable"); // import the AdminTable item
$manager->listImported(); // list the imported items
$manager->listInstalled(); // list the installed items





```


The ApplicationItemManagerInterface exposes the following methods:

- import($item, $force = false)
- install($item, $force = false)
- uninstall($item)
- listAvailable($repoId = null, array $keys = null)
- listImported()
- listInstalled()
- search($text, array $keys = null, $repoId = null)



The most important are perhaps the import and install/uninstall methods.

The algorithm for those methods can be found in this repository:

- [ApplicationItemManager-import-install-uninstall-item-algo.pdf](https://github.com/lingtalfi/ApplicationItemManager/blob/master/doc/design/ApplicationItemManager-import-install-uninstall-item-algo.pdf)





Creating Console Programs
============================


Once you've configured an ApplicationItemManager instance to your likings,
you can create a console program out of it.

The ApplicationItemManagerProgram object helps you a long way with that, encapsulating 
your ApplicationItemManager instance and providing program commands for free (using the
[Program](https://github.com/lingtalfi/Program) planet under the hood):





```txt
Usage
-------

The word item is defined like this:
- item: itemId | itemName
- itemId: repositoryId.itemName | repositoryAlias.itemName


# import/install
myprog import {item}                       # import an item and its dependencies, skip already existing item(s)/dependencies
myprog import -f {item}                    # import an item and its dependencies, replace already existing item(s)/dependencies
myprog importall {repoId}?                 # import all items at once, skip already existing item(s)/dependencies
myprog importall {repoId}? -f              # import all items at once, replace already existing item(s)/dependencies
myprog updateall                           # try to update all existing items at once (equivalent of git pull with git)
myprog reimport-existing {repoId}?         # re-import all existing items at once, replace already existing item(s)/dependencies
myprog install {item}                      # install an item and its dependencies, will import them if necessary, skip already existing item(s)/dependencies
myprog install -f {item}                   # install an item and its dependencies, will import them if necessary, replace already existing item(s)/dependencies
myprog installall {repoId}?                # install all items at once, will import them if necessary, skip already existing item(s)/dependencies
myprog installall {repoId}? -f             # install all items at once, will import them if necessary, replace already existing item(s)/dependencies
myprog uninstall {item}                    # call the uninstall method on the given item and dependencies


# list/search
myprog list {repoAlias}?                   # list available items
myprog listd {repoAlias}?                  # list available items with their description if any
myprog listimported                        # list imported items
myprog listinstalled                       # list installed items
myprog search {term} {repoAlias}?          # search through available items names
myprog searchd {term} {repoAlias}?         # search through available items names and/or description

# local (shared) repo
myprog setlocalrepo {repoPath}             # set the local repository path
myprog getlocalrepo                        # print the local repository path
myprog todir                               # converts the top level items of the import directory to directories (based on the directories in local repo)
myprog tolink                              # converts the top level items of the import directory to symlinks to the directories in local repo
myprog flash                               # list all the top level items of the local repo, and make sure they exist in the import directory; if not, it copies them from the local repo
myprog flash -l                            # with this flag, will create links rather copying directories
myprog flash -f                            # forces the re-import


# utilities
myprog clean                               # removes the .git, .gitignore, .idea and .DS_Store files in your items directories, recursively




For instance:
    myprog import Connexion
    myprog import km.Connexion
    myprog import -f Connexion
    myprog import -f km.Connexion
    myprog importall
    myprog importall -f
    myprog install Connexion
    myprog install km.Connexion
    myprog install -f Connexion
    myprog install -f km.Connexion
    myprog installall
    myprog installall -f
    myprog uninstall Connexion
    myprog uninstall km.Connexion
    myprog list
    myprog list km
    myprog listd
    myprog listd km
    myprog listimported
    myprog listinstalled
    myprog search ling
    myprog search ling km
    myprog searchd kaminos
    myprog searchd kaminos km
    myprog setlocalrepo /path/to/local/repo
    myprog getlocalrepo
    myprog tolink
    myprog flash
    myprog flash -l
    myprog flash -l
    myprog flash -fl
    myprog todir
    myprog clean
```



The LocalAwareApplicationItemManager, which let you have a local proxy on your machine (instead of fetching the items
on an external machine) has a few more methods:

```txt

# local (shared) repo
myprog setlocalrepo {repoPath}             # set the local repository path
myprog getlocalrepo                        # print the local repository path
myprog todir                               # converts the top level items of the import directory to directories (based on the directories in local repo)
myprog tolink                              # converts the top level items of the import directory to symlinks to the directories in local repo


# utilities
myprog flash                               # equalizes the items from the local repository to the import directory (so that the import directory contains the same items as the local repository)


myprog setlocalrepo /path/to/local/repo
    myprog getlocalrepo
    myprog tolink
    myprog todir
    myprog flash
```



Here is the code required to create such a console program.
The example below use the ApplicationItemManager for the universe.



```php
#!/usr/bin/env php
<?php


use ApplicationItemManager\Importer\GithubImporter;


use ApplicationItemManager\LingApplicationItemManager;
use ApplicationItemManager\Program\ApplicationItemManagerProgram;

use ApplicationItemManager\Repository\LingUniverseRepository;
use CommandLineInput\ProgramOutputAwareCommandLineInput;
use Output\ProgramOutput;

//--------------------------------------------
// UNIVERSE PROGRAM
//--------------------------------------------
/**
 * As for now, the universe doesn't have any special installer,
 * so we don't need to initialize an environment for them (but plans are made
 * to change that in the future though).
 * We can simply call any autoloader that we want.
 */
require_once __DIR__ . "/class-program/bigbang.php";


$appDir = getcwd();
$importDir = $appDir . "/planets";
$helpFile = __DIR__ . "/class-program/help.txt";


$output = ProgramOutput::create();
$manager = LingApplicationItemManager::create()
    ->setOutput($output)
    ->addRepository(LingUniverseRepository::create())
    ->setFavoriteRepositoryId('ling')
    ->bindImporter('ling', GithubImporter::create()->setGithubRepoName("lingtalfi"))
    ->setImportDirectory($importDir);


$input = ProgramOutputAwareCommandLineInput::create($argv)
    ->setProgramOutput($output)
    ->addFlag("f")
    ->addFlag("v");

ApplicationItemManagerProgram::create()
    ->setHelpFile($helpFile)
    ->setDefaultCommand("help")
    ->setManager($manager)
    ->setInput($input)
    ->setOutput($output)
    ->setImportDirectory($importDir)
    ->start();

```




Some programs which use this system are:

- [uni](https://github.com/lingtalfi/universe-naive-importer) (the universe naive importer)
- [kamille installer tool](https://github.com/lingtalfi/kamille-installer-tool) (which can install modules and widgets)











More about repositories
=====================


Testing repositories
----------------------

```php


//--------------------------------------------
// TESTING REPOSITORIES
//--------------------------------------------
a(KamilleModulesRepository::create()->getDependencies("KamilleModules.Connexion"));
a(KamilleModulesRepository::create()->getHardDependencies("KamilleModules.Connexion"));
a(LingUniverseRepository::create()->getDependencies("ling.ArrayStore"));
```


Dependency and hard dependency
------------------------------------

Do you know the difference between a dependency and a hard dependency?

The dependency is a link between two items A and B, which is honored upon installation,
such as when you install item A, item B is also installed (assuming B depends on A).


A hard dependency is also a link between two items A and B, which is honored upon uninstallation,
such as when you uninstall item A, item B is also uninstalled (assuming B depends on A).












History Log
------------------
    
- 1.19.1 -- 2018-03-06

    - fix LingAbstractItemInstaller::uninstall method algorithm return false
    
- 1.19.0 -- 2018-03-05

    - add program reimport-existing command
    
- 1.18.1 -- 2018-03-05

    - fix ApplicationItemManager not installing dependencies when the module is installed for the first time
    
- 1.18.0 -- 2017-07-31

    - fix ApplicationItemManager bug
    
- 1.17.0 -- 2017-07-30

    - add zimport command
    - add LocalAwareApplicationItemManager
    - add LocalAwareApplicationItemManagerProgram
    
- 1.16.0 -- 2017-06-08

    - add updateall command
    
- 1.15.1 -- 2017-04-11

    - ApplicationItemManagerProgram t flag now triggers the trace
    
- 1.15.0 -- 2017-04-11

    - ApplicationItemManager messages with exceptions work in sync with trace
    
- 1.14.0 -- 2017-04-09

    - ApplicationItemManager.install now calls uninstall if -f flag was on
    
- 1.13.0 -- 2017-04-05

    - add ApplicationItemManagerAwareInterface
    
- 1.12.0 -- 2017-04-05

    - add LingAbstractItemInstaller.prepareItemInstaller method
    
- 1.11.0 -- 2017-04-05

    - fix LingAbstractItemInstaller.uninstall method, more permissive
    
- 1.10.0 -- 2017-04-05

    - add ApplicationItemManagerProgram.setShowTraceException method
    
- 1.9.0 -- 2017-04-01

    - add ApplicationItemManagerProgram.handleDebug hook
    
- 1.8.0 -- 2017-04-01

    - add ApplicationItemManagerProgram.flash method
    
- 1.7.0 -- 2017-04-01

    - cleaned up directory
    
- 1.6.0 -- 2017-04-01

    - add precision to import error message
    
- 1.5.0 -- 2017-04-01

    - change uninstall algorithm
    
- 1.4.2 -- 2017-04-01

    - update help
    
- 1.4.1 -- 2017-04-01

    - forgot installall command
    
- 1.4.0 -- 2017-04-01

    - add ApplicationItemManager.importAll and installAll methods, and corresponding program commands
    
- 1.3.0 -- 2017-04-01

    - add ApplicationItemManagerProgram.setHelpFile method
    
- 1.2.0 -- 2017-03-31

    - added setlocalrepo, getlocalrepo, todir, tolink methods for ApplicationItemManagerProgram
    
- 1.1.0 -- 2017-03-31

    - renamed ItemList to Repository
    
- 1.0.0 -- 2017-03-30

    - initial commit
    




