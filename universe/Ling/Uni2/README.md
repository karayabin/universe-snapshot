Uni2
===========
2019-03-07




The planet manager system for the [uni-tool](https://github.com/lingtalfi/universe-naive-importer).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Uni2
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Uni2 api](https://github.com/lingtalfi/WebBox/blob/master/doc/api/Uni2.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [What is Uni2?](#what-is-uni2)
    - [Help](#help)
- [The concepts behind Uni2](#the-concepts-behing-uni2)
- [Universe, galaxies, planets](#universe-galaxies-planets)
    - [The planet long name](#the-planet-long-name)
    - [The planet short name](#the-planet-short-name)
    - [The planet id](#the-planet-id)
- [Dependencies](#dependencies)
    - [Introduction](#introduction)
    - [Meet the naive system](#meet-the-naive-system)
    - [Dependencies to non-planets](#dependencies-to-non-planets)
- [The planet structure](#the-planet-structure)
    - [meta-info.byml](#meta-info-byml)
    - [dependencies.byml](#dependencies-byml)
- [The local server](#the-local-server)
    - [Introducing the local server](#introducing-the-local-server)
    - [The local server on your machine](#the-local-server-on-your-machine)
- [The Uni2 configuration](#the-uni2-configuration)
    - [The local server section](#the-local-server-section)
    - [The automatic updates section](#the-automatic-updates-section)
    - [The clean_items key](#the-clean_items-key)
- [Dependency systems and importers](#dependency-systems-and-importers)
    - [Package import name vs package symbolic name](#package-import-name-vs-package-symbolic-name)
- [The dependency master file](#the-dependency-master-file)
- [The upgrade system](#the-upgrade-system)
- [History Log](#history-Log)



What is Uni2?
===================


Uni2 is a **console application** based on [CliTools](https://github.com/lingtalfi/CliTools/).


It helps managing the planets of the [universe](https://github.com/karayabin/universe-snapshot) in your application.


It can do the following:


- import a planet into your application with one line
- when it imports a planet, it also imports all its dependencies recursively (if the planets has dependencies, which is often the case)
- it updates itself automatically (by default), so that you always import the latest versions of the planets
- many more things




Help
---------

Here is the help of Uni2, which you can access via the **"help"** command:


```txt
=========================
*    Uni-tool help
=========================

A value preceded by a dollar symbol ($) is always a variable.

Global options:
-----------------
The following options apply to all the commands.

    - application-dir=$path: sets the application directory to use. If not set, the current directory will be used.
    - -e: error verbose mode. When an error occurs, the whole exception trace is displayed.
    - indent=$number: sets the base indentation level used by most commands.

Commands list:
-----------------

- check: checks the application planets for various problems (unresolved dependencies, invalid meta).
    - -r: resolve. Attempts to resolve the unresolved planet dependencies on the fly.
- clean: cleans the application planets/items from the items defined by the clean_items configuration directive.
    Use the conf command to set/get the value of the clean_items configuration directive (the default is: .git, .gitignore).
- conf: displays the configuration of this local copy of uni-tool.
    - $name=$value: sets the entry $name to $value in the configuration file.
        $name uses bdot notation.
        For instance: local_server.root_dir=/path/to/my/root_dir
- confpath: displays the path to the configuration of this local copy of uni-tool.
- create-master $path : creates a dependency master file at the given $path, for the planets of the current application or the local server.
    By default, the dependency master file is created from the planets of the current application.
    - -s: local server. If this flag is set, the dependency master file will be created from the planets of the local server.
    Note: if a file or directory exists at the $path location, it will be removed and replaced by the dependency master file without further warning!
- help: displays this help message.
- import $planet: imports the $planet only if it doesn't exist in the application yet.
    The same applies to the planet dependencies if any.
    - -f: force mode. Forces the reimporting of the planet and its dependencies no matter what.
    - -n: do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created.
- import-all: executes the import command to all the planets of the current application.
    - -f: force mode. Forces the reimporting of the planets and their dependencies no matter what.
    - -n: do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created.
- import-galaxy $galaxy: executes the import command for all the planets of the $galaxy.
    The planet list is taken from the local dependency master file.
    - -f: force mode. Forces the reimporting of all planets (and dependencies) no matter what.
    - -n: do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created.
- import-map ?$mapPath: executes the import command for all the planets defined in the $mapPath file.
    The map is a babyYaml file containing the list of planet ids to import.
    If the $mapPath is not specified, this command will search for the map.byml file at the root of the application's universe directory.
    - -f: force mode. Forces the importing of all planets (and dependencies) no matter what.
    - -n: do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created.
- import-universe : executes the import command for all the planets of the universe.
    The planet list is taken from the local dependency master file.
    - -f: force mode. Forces the reimporting of all planets (and dependencies) no matter what.
    - -n: do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created.
- info : displays information about the current application (the number of galaxies, the number of planets, and the percentage of planets having dependencies).
- info-universe : displays information about the universe (the number of galaxies, the number of planets, and the percentage of planets having dependencies).
    Also displays similar information for each galaxy.
- init-local : creates the bigbang.php at the root of the local server if it doesn't already exist.
- listplanet: displays the list of planets of the current application.
    - -v: displays the version number next to the planet names.
- liststore: displays the list of planets of the local server.
    - -v: displays the version number next to the planet names.
- map ?$mapPath: creates a map file to be used by the import-map, reimport-map and store-map commands.
    The map is created at the $mapPath location if provided, or at the root of the application's universe directory otherwise.
    The map is a babyYaml file containing the list of planet ids of the current application.
- master: displays the content of the local dependency-master file.
- masterpath: displays the path to the local dependency-master file.
- reimport $planet: reimports the $planet only if it doesn't exist in the application yet,
    or if a newer version is available (version defined in the local dependency-master file).
    The same applies to the planet dependencies if any.
    - -f: force mode. Forces the reimporting of the planet and its dependencies no matter what.
    - -n: do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created.
- reimport-all: executes the reimport command to all the planets of the current application.
    - -f: force mode. Forces the reimporting of the planets and their dependencies no matter what.
    - -n: do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created.
- reimport-galaxy $galaxy: executes the reimport command for all the planets of the $galaxy.
    The planet list is taken from the local dependency master file.
    - -f: force mode. Forces the reimporting of all planets (and dependencies) no matter what.
    - -n: do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created.
- reimport-map ?$mapPath: executes the reimport command for all the planets defined in the $mapPath file.
    The map is a babyYaml file containing the list of planet ids to reimport.
    If the $mapPath is not specified, this command will search for the map.byml file at the root of the application's universe directory.
    - -f: force mode. Forces the reimporting of all planets (and dependencies) no matter what.
    - -n: do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created.
- reimport-universe : executes the reimport command for all the planets of the universe.
    The planet list is taken from the local dependency master file.
    - -f: force mode. Forces the reimporting of all planets (and dependencies) no matter what.
    - -n: do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created.
- store $planet: reimports the $planet in the local server.
    If the planet is already stored in the local server, it will not be re-imported unless a newer version is available (version defined in the local dependency-master file),
    or if the force flag (-f) is set.
    The same logic applies recursively to the planet dependencies if any.
    - -f: force mode. Forces the reimporting (i.e. re-downloading) of the planet and its dependencies no matter what.
- store-all: reimports all the planets of the local server.
    If the planet is already stored in the local server, it will not be re-imported unless a newer version is available (version defined in the local dependency-master file),
    or if the force flag (-f) is set.
    The same logic applies recursively to the planet dependencies if any.
    - -f: force mode. Forces the reimporting (i.e. re-downloading) of the planet and its dependencies no matter what.
- store-galaxy $galaxy: executes the store command for all the planets of the $galaxy.
    The planet list is taken from the local dependency master file.
    - -f: force mode. Forces the reimporting of all planets (and dependencies) no matter what.
- store-map ?$mapPath: executes the store command for all the planets defined in the $mapPath file.
    The map is a babyYaml file containing the list of planet ids to store.
    If the $mapPath is not specified, this command will search for the map.byml file at the root of the application's universe directory.
    - -f: force mode. Forces the reimporting of all planets (and dependencies) no matter what.
- todir: replaces all planets/items symlinks (to their local server equivalents) with the actual directories they are pointing to.
    If a planet/item doesn't exist in the local server, nothing will be done for this planet/item.
    See also: the tolink command, which does the opposite.
- tolink: replaces all planets/items of the current application with symlinks pointing to the local server equivalents.
    If a planet/item doesn't exist in the local server, nothing will be done for this planet/item.
    See also: the todir command, which does the opposite.
- upgrade: upgrades the upgradable planets in the local server (if defined) and in the current application.
    Upgradable means that there is a newer version of the planet on the web.
- version: displays the version number of this local copy of uni-tool.

```






The concepts behind Uni2
==========================


Uni2 is a powerful tool.

However, to harness such power, one need to understand how it works.

In the rest of this documentation, I'll explain the main concepts behind Uni2, so that you get a better overview of how it works.



Universe, galaxies, planets
============================

The first concept to understand is the general organization of the **universe**.


The **universe** is as a big container containing all galaxies, and each **galaxy** contains any number of **planets**.

And so for instance if I have a galaxy named Galaxy123 containing 3 planets Planet1, Planet2, Planet3, and another galaxy
named GalaxyAZ containing three planets PlanetA, PlanetB and PlanetC, I could map them in the file system like this:


```txt
- universe/
----- Galaxy123/
--------- Planet1/
--------- Planet2/
--------- Planet3/
----- GalaxyAZ/
--------- PlanetA/
--------- PlanetB/
--------- PlanetC/
```


Note that planets are also directories, as we will see later in this documentation.


To identify a planet, we have different "tools" at our disposal:

- the planet long name
- the planet short name
- the planet id


The planet long name
-------------

The planet long name is the name of a planet from the universe's perspective.
It's the galaxy name followed by a slash followed by the planet name.

```txt
planet_long_name: <galaxy_name> </> <planet_name>
```

Examples:

- Galaxy123/Planet1
- Galaxy123/Planet2
- GalaxyAZ/PlanetB
- Tartempion/MachineGun
- ...


The planet short name
----------------

The planet short name is the name of a planet from a galaxy's perspective.
It's the same as the directory name.

Examples:

- Planet1
- Planet2
- PlanetB
- MachineGun



The planet id
----------

The planet id is a variant of the planet long name.
It's the planet long name with the slash replaced with a dot.
It's used by some of the Uni2 classes.



Examples:

- Galaxy123.Planet1
- Galaxy123.Planet2
- GalaxyAZ.PlanetB
- Tartempion.MachineGun
- ...



The rules for naming planets are defined in the [BSR-1](https://github.com/lingtalfi/TheScientist/blob/master/bsr-1.md) document.




Dependencies
=================


Introduction
--------------

Now let's tackle the most challenging concept of Uni2: dependencies.


So the **universe** is a modular framework, where each **planet** acts as a module.

And so as for any modular system, it's almost inevitable that dependencies will be created between the planets.

So for instance, planet **Galaxy123.Planet1** could depend on planet **Galaxy123.Planet2** and planet **Galaxy123.Planet3**,
while **Galaxy123.Planet3** could also depend on planet **Tartempion.MachineGun**.


```txt
Galaxy123.Planet1
    dependencies:
        - Galaxy123.Planet2
        - Galaxy123.Planet3

Galaxy123.Planet3
    dependencies:
        - Tartempion.MachineGun
```




Uni2 manage dependencies very well, and so if you were to import planet **Galaxy123.Planet1** in your application,
the Uni2 tool would also import all the dependencies recursively (**Galaxy123.Planet2**, **Galaxy123.Planet3** and **Tartempion.MachineGun**
in the above example).


Meet the naive system
-------------------

However, it does so in a particular manner that I'm going to explain right now.

**Uni2** uses what I call a **naive** dependencies resolution approach.

Naive means: either a planet A depends on a planet B, or it doesn't: it's binary.

This "binary state" of planet A (whether it depends on planet B) remains true at all time.


The power of the **naive** system is its simplicity: the planet A doesn't depend on planet B in version 1.4 or 2.5,
it just depends on planet B or doesn't depend on planet B.


So let's take an example to demonstrate how all this works.


Let's say that we have the following planets:

```txt
Galaxy123.Planet1
    author: John
    version: 1.0.0
    dependencies:
        - Galaxy123.Planet2
        - Alice.Ninja

Alice.Ninja
    author: Alice
    version: 1.99.0
    dependencies:
        - Tartempion.MachineGun

```

Now the author of planet **Galaxy123.Planet1** (John) is happy with its dependency to planet **Alice.Ninja** so far.

But one rainy day, you guessed it, the author of planet **Alice.Ninja** (Alice) publishes a newer version of her planet: version 2.0.0.

Now the planets look like this:

```txt
Galaxy123.Planet1
    author: John
    version: 1.0.0
    dependencies:
        - Alice.Ninja
        - Galaxy123.Planet3

Alice.Ninja
    author: Alice
    version: 2.0.0
    dependencies:
        - Tartempion.MachineGun

```

Now John is faced with a choice: does he keep its dependency to planet **Alice.Ninja**?

Let's examine the two possible outcomes of this question:

- keeping the dependency
- breaking the dependency


John might want to keep the dependency.
If so, he will need to embrace the changes of the new version of the **Alice.Ninja** planet.

This might involve some rewriting of the **Galaxy123.Planet1**, or not if he's lucky.


However if the changes in the **Alice.Ninja** planet are too dramatic, John might decide to break the dependency with this planet.

And so, what he can do is basically freeze (create a copy of) the **Alice.Ninja** planet in version 1.99.0, and use that copy in his planet.

John could either decide to create another planet (a clone of **Alice.Ninja** in version 1.99.0) elsewhere and make a new dependency to that planet,
or he could decide to digest (copy into his own planet) the code of the **Alice.Ninja** planet in version 1.99.0.


So for instance, if John wants to create a new planet, he could create the planet **Galaxy123.AliceNinja199** and create a new dependency to it.

In which case the planets used by John would look like this:


```txt
Galaxy123.Planet1
    author: John
    version: 1.0.0
    dependencies:
        - Galaxy123.AliceNinja199
        - Galaxy123.Planet3

Galaxy123.AliceNinja199
    author: John (original code from Alice)
    version: 1.0.0
    dependencies: []


```


Note that in this case, John has also included the code of planet **Tartempion.MachineGun** into the **Galaxy123.AliceNinja199**,
to avoid any dependency problems (but he could also have kept the dependency to the **Tartempion.MachineGun** planet if he wanted to).


The other option for John was to digest the **Alice.Ninja** planet version 1.99.0.

In that case, John would simply include the **Alice.Ninja** planet code into his own planet, in which case the planets used by John would look like this:


```txt
Galaxy123.Planet1
    author: John
    version: 1.0.0
    dependencies:
        - Galaxy123.Planet3


```



As you can see, this naive dependency resolution system is pretty straight forward: you either embrace the changes and keep the dependency,
or break the dependency by freezing it somewhere where you have control on it.




Dependencies to non-planets
------------------

So far, we've assumed that a dependency is a dependency to a planet.

However, the promise of the Uni2 is that it can import any dependency, including non-planet items.

This is possible by first downloading the non-planet item, then executing some arbitrary php statements called post_install directives (depending on the
item you're trying to import) to import the non-planet item correctly.


So for instance, if your planet depends on the [tcpdf library](https://github.com/tecnickcom/TCPDF/),
the Uni2 would download the repository, and then execute the post_install directives so that you can use it right away from your planet.

Likewise, if your code depends on the [SwiftMailer library](https://swiftmailer.symfony.com/), you could use the same technique.


Note: at this time of writing (2019-03-11), I've not been using this system myself and so there is no automated methods for the examples above.

So if you wanted to implement the exact examples above, you would use the "handler" directive (see the [dependencies.byml](#dependenciesbyml) section for more info) which basically delegates the writing
of the php statements to a class of your choice, and you also would need to create your own [importer](#dependency-systems-and-importers).



When a non-planet dependency is imported, it's imported in a special **universe-dependencies** directory, which lies next to the **universe** directory in your application.






The planet structure
====================

As we've seen earlier, the planet is represented by a directory in the filesystem.

However to be a planet, this directory needs two special files:

- meta-info.byml
- dependencies.byml



meta-info.byml
-------------------

The **meta-info.byml** file is a [babyYaml](https://github.com/lingtalfi/BabyYaml) file containing meta information about your **planet**.

The meta information is an array of key/value pairs.

As for now, only the **version** key is required.

Here is what the meta-info.byml of the planet Ling/Bat looks like:

```yaml
version: 1.155
```


The version number is used by **Uni2** tool to upgrade/not upgrade a **planet** when you reimport it (see the reimport command from the [help section](#help) for more info).



dependencies.byml
-----------------

The **dependencies.byml** file is only required if your **planet** has dependencies to other items.

An item can be either a planet, or a non-planet.

The **dependencies.byml** file is also a [babyYaml](https://github.com/lingtalfi/BabyYaml) file; it contains the dependencies
of your **planet**.


It's an array with two sections (keys):

- dependencies
- post_install


The **dependencies** section contains an array of **dependency system name** to **package import name**.

Basically, the **dependency system** represents a download technique, and the **package import name**
is just an argument to pass to this download technique.

For more information about the dependency system and the package import name, please refer to the
[Dependency systems and importers](#dependency-systems-and-importers) section.

In the case of planets, the **dependency system** is always the name of the galaxy, and the **package import name**
is always the planet short name.


The **post_install** section contains directives to execute after the dependencies have been imported.

See the original [dependencies system page](#https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md) for more info.


Here is the formal notation for the stucture of the **dependencies.byml** file:


```yaml
dependencies:
    $dependency_system_name:
        - $package_import_name
post_install:
    $directive_name: $directive_options
```


Here is an example of the **Ling/Bat** planet's dependencies.byml file:


```yaml
dependencies:
    Ling:
        - CopyDir
        - Tiphaine
        - BeeFramework


post_install: []
```





The local server
=================



Introducing the local server
-------------------

The local server serves as a cache for the universe dependencies.


The main idea is that the dependencies are imported from your machine rather than from the internet.

This yields much faster imports.


The local server on your machine
-----------------


The local server is just an empty directory at first.

It also has an object counterpart, so that we can activate it/deactivate it, and more.

In this section, we assume that the local server is always activated (see [the Uni2 configuration](#the-uni2-configuration) section for more details).

When you import a **planet**, Uni2 checks whether it exists in the local server.
If so, it copies the **planet** from the local server to your application.

This operation is very fast, because it's just a filesystem copy.

The same applies for any dependencies that the **planet** might have (recursively).


If the **planet** you're trying to import is not in the local server, then it will be imported from the web to your application, and a copy
will be made to the local server, so that you can get it from the local server next time.


And so the local server starts as an empty folder, and grows as you import more and more planets, ensuring you the best import times.


You can decide to prepare the local server in advance, using the store-* commands (see the [help section](#help) for more details).


Note that the local server acts as a transparent layer between your application and the web, and you can activate/deactivate it using the [conf command](#help).




The local server is also agnostic about what kind of dependency item it stores.

This means it can store planet and/or non-planet items.

In fact, the path of a dependency items are given by the [importers](#dependency-systems-and-importers).


The storing scheme used by the local server is the following:

```txt
- $local_server_root_dir/
----- $dependency_system/
--------- $package_symbolic_name/
```




The Uni2 configuration
=====================

The Uni2 tool has its own configuration.

You can use the Uni2 configuration to change the behaviour of some of its components.


The Uni2 configuration resides in a [BabyYaml](https://github.com/lingtalfi/BabyYaml) file path can be shown with the **confpath** command (see the [help](#help) section for more details).


To display the current configuration, you can use the **conf** command, which in my case displays this:


```yaml
local_server:
    root_dir: /myphp/universe
    is_active: 1

automatic_updates:
    is_active: 1
    frequency: 5

clean_items: .git, .gitignore
```


To change a configuration value, we can either change the babyYaml configuration file directly,
or use the **conf** command (see the [help section](#help) for more details about the conf command).

So for instance you can de-activate the local server completely by setting the **local_server.is_active** configuration directive to 0.



The local server section
------------------

This section configures the [local server](#the-local-server).

The local server section has only two entries:

- root_dir: the location of the local server's root directory on your machine
- is_active: int = 1 (0|1). Whether to enable the local server


Note: the root_dir must be set before the local server is activated.



The automatic updates section
----------------

This section defines how and how often the Uni2 planet upgrades itself.

How does this work?

When you call an import-like command (commands which name start with import, reimport and/or store),
then Uni2 checks whether or not it should upgrade (i.e. update itself with a newer version found on the web).

This check occurs only if the **is_active** key is set to 1.

So if the **is_active** key is set to 0, no upgrade will every occur automatically.


Then, it performs the check only every n days, n being the number defined by the **frequency** key.

Note: if the **frequency** is set to 0, then the check is performed every day.

Then, the check compares the web version of the uni-tool to the local version number, and upgrades
if necessary (meaning if the web version number is greater than the local version number).




The clean_items key
-------------------

This key holds the type of files to delete when the **clean** command is executed.
See the clean command in the [help](#help) for more info.

It's a comma separated string of components, each of which representing a file name or folder name to remove.

So, in the following example:

```txt
clean_items: .git, .gitignore
```

The **clean_items** key indicates that the .git and .gitignore entries (files and/or folders) should be removed.

So, when you execute the **clean** command, it will remove those files from the current application recursively.






Dependency systems and importers
================

A dependency system is actually a dependency download system.

In other words it's a system that downloads a certain type of dependency from the web.

Now as we've said in other sections, a planet can have different types of dependencies: planets, non-planets.

But in fact, each galaxy is a dependency system in itself.

For instance, for my galaxy (named Ling), I host all my planets on a github.com repository.

But an other galaxy author could decide to host her galaxy(ies) on bitbucket.org, or even on her own website...

And so the system that would download her items would be different than the system that download mines.

So again, a dependency system is used to download a certain type of (dependency) item from the web.


Now the actual object responsible for the downloading is called an importer.


Package import name vs package symbolic name
--------------

An importer has also other responsibilities, like returning the **package symbolic name** out of a **package import name**.


The **package import name** is a fancy word to designate the "name" of the package to import, and the **dependency system**
is basically the name of the download technique used to import this package.

If the particular case where the item to download is a planet, the **dependency system** is always the galaxy name,
and the **package import name** is always the **planet short name**.

Now the **package symbolic name** is the name used by the [local server](#the-local-server) to store the **dependency item**.

In the particular case where the **dependency item** is a **planet**, the **package symbolic name** is
the same as the **package import name**, which is the **planet short name**.

However, other dependency systems might have a **package symbolic name** different than the **package import name**.

Don't worry if you don't understand all this. To be honest, those are just notes for my future self in case I need
to extend this planet one day, to give me a quick refresher, but I don't expect a larger audience to understand what I'm saying
here (but if you do, congrats!).



So to recap, a **dependency system importer** is the actual object that downloads a certain type of **dependency item** from the web.



The dependency master file
=====================

The **dependency master file** contains all the dependencies of all planets of the universe.

So yes, it's the most important file as far as dependencies are concerned.

In this section I explain how Uni2 uses the **dependency master file**.


First, Uni2 downloads the **dependency master file** from the web (upon every successful upgrade via the upgrade command)
and keeps a copy on the local machine.

The local copy on the user machine is always used as a reference for all dependencies related tasks.

In other words it acts as a proxy to the web version of the **dependency master file**.

So for instance when Uni2 reimports the planet A: it will compare the version number of the **planet A** in the current application
with the version number of the **planet A** defined in the local **dependency master file**.

The benefit of using a local **dependency master file** rather than consulting a web basted **dependency master file** is that
accessing the local **dependency master file** will be much faster, and so all dependency based tasks will perform better thanks
to the local **dependency master file**.


That's one of the reason why the user should upgrade the Uni2 tool regularly, so that there is not too much difference between
the local **dependency master file** and the web **dependency master file**.




The upgrade system
=================

The upgrade system is the system that upgrades the Uni2 environment.

The upgrade system is configured via the [Uni2 configuration](#the-uni2-configuration), the automatic_updates section.

The upgrade process is triggered when the web version of the uni-tool is greater than the local version.

When triggered, the upgrade process does the following steps:

- it first repatriates the web [dependency master file](#the-dependency-master-file) to the local machine
- then it executes the **reimport-all** command (See the [help](#help) section for more details), which
    basically reimports all planets of the current application.





History Log
=============

- 1.3.0 -- 2019-03-21

    - add ListStoreCommand

- 1.2.0 -- 2019-03-19

    - add InitLocalServerCommand

- 1.1.0 -- 2019-03-13

    - add DependencyMasterDiffUtil class

- 1.0.0 -- 2019-03-11

    - initial commit