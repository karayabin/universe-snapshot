Light_PlanetInstaller, conception notes
================
2020-12-03 -> 2021-05-31

This is a variation of the [uni tool](https://github.com/lingtalfi/universe-naive-importer), which I found too
complicated.



Table of Contents
=================

- [Overview](#overview)
- [Commands usage](#commands-usage)
- [import map](#import-map)
- [The two types of conflicts](#the-two-types-of-conflicts)
  - [application conflicts](#application-conflicts)
  - [inter-planet conflicts](#inter-planet-conflicts)
  - [application conflict resolution mode](#application-conflict-resolution-mode)

- [import algorithm](#import-algorithm)
- [install algorithm](#install-algorithm)
  - [init 1](#init-1)
  - [init 2](#init-2)
  - [init 3](#init-3)

- [uninstall algorithm](#uninstall-algorithm)
- [upgrade algorithm](#upgrade-algorithm)
- [delete concept](#delete-concept)
- [session dir](#session-dir)
- [the lpi deps file](#the-lpi-deps-file)
- [uni style vs versioned style](#uni-style-vs-versioned-style)
  - [My personal opinion about it](#my-personal-opinion-about-it)
- [Versioned style mess](#versioned-style-mess)
- [Universe maps](#universe-maps)
- [alternate universe and symlink, speed up your workflow](#alternate-universe-and-symlink-speed-up-your-workflow)
- [todir and tolink](#todir-and-tolink)



Overview
-------
2021-05-27


The **Light_PlanetInstaller** planet provides command to install/uninstall planets in your apps.

It supersedes the [Light_PluginInstaller](https://github.com/lingtalfi/Light_PluginInstaller) planet.

The api is designed to work with the [uni style](#uni-style-vs-versioned-style) installing by default.

Although we provide tools to work with [versioned style](#versioned-style-mess) installing, we don't recommend it, unless you have no other choice.


You should first install the [Light_Cli](https://github.com/lingtalfi/Light_Cli/) tool on your machine, in order to use our planet.

In the rest of this document, we assume that **Light_Cli** is installed.



Commands usage
---------
2021-05-27 -> 2021-05-31




The following commands are described using [kwin notation](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md).



```kwin
- **clean_session_dirs**:
    Empties the directory containing all the temporary [session dirs](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#session-dir).
    This command should be used from time to time, especially if the host is a server for your clients.
    If it's a home computer that you turn off every day, you probably don't need to worry about it, as the **session dirs** are temporary dirs already.
    - Arguments:
        - aliases:
            - clean
  
   
- **create_map**:
    Creates a [universe map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#universe-maps) that you can then use to help restore the app to that state.
      
    - Arguments:
        - parameters: 
            - ?dstFile: the path where to write the map. If null (by default), we put it in a **_universe_maps** directory at the root of your app.
        - aliases:
            - map              
            
            
- **debug_session_dir**:
    This command launches an interactive gui which helps you investigate a [session dir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#session-dir).
      
    - Arguments:
        - parameters: 
            - ?sessionDir: the path of the session dir to debug. By default, the latest session dir is chosen.
        - aliases:
            - debug    
                 
- **explore_conflicts**:
    This command provides a gui to investigate dependency conflicts (i.e. [interplanet conflicts](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#inter-planet-conflicts)) that might have occurred during your **import/install**.
    
    - Arguments:
        - parameters: 
            - conflictsPath: the path to the conflicts file to investigate.
            
- **help**:
    This command shows the help for the **Light_PlanetInstaller** planet.
    
    - Arguments:
        - flags: 
            - v: whether to display a verbose version of the help
          
- **import**:
    [Imports](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-algorithm) a planet in your application.
      
    - Arguments:
        - parameters: 
            - planetDotName: the [planetDotName](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) of the planet to import.
            - ?version: the version of the planet to import. If null (by default), the planet will be imported in its latest version (this is called [uni style mode](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#uni-style-vs-versioned-style))
          
        - options: 
            - app: string. The path to the app in which to import the planet. By default, the current working directory (pwd) is assumed.
            - crm: string=latest. The [application conflict resolution mode](application-conflict-resolution-mode). The possible values are:
                - ask
                - abort
                - keep
                - replace
                - latest
                - earliest
            - tim: string. The path to a file containing the [theoretical import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map) to use. If set, this will bypass the planetDotName argument passed to this command,
              and the planets imported will be the ones defined in the **theoretical import map**. 
            
        - flags: 
            - d: if set, enables the debug mode, in which output is a bit more verbose
            - no-symlinks: if set, the import command will not try to use symlinks to import your planet. See the [symlinks workflow discussion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#alternate-universe-and-symlink-speed-up-your-workflow) for more information. 
            - no-deps: if set, the import command will only import the given planet, and will not try to import its dependencies (if any). 
            - test: if set, the import command will stop after creating and displaying the [concrete import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map). In other words, nothing will be actually imported, but you will see the list of 
                what would have been imported if you didn't add the test flag. 
            - f: if set, forces the reimporting of the planet, even if it's already in your app
            - test-build-dir: if set, the import command will stop after creating the build dir. In other words, nothing will be actually imported, but you will not only have the [concrete import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map) created,
                but also the **build dir**. See the [import algorithm](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-algorithm) section for more info about the **build dir**.
        - aliases:
            - import
                     
                     
                     
- **import_ling_universe**:
    Imports all the planets from the ling galaxy to your machine.
      
    - Arguments:
        - parameters: 
            - dstUniverseDir: the path to the universe directory to import the planets into.
        - flags: 
            - skip-existing: if set, will only import the planet if it doesn't already exist. Otherwise (by default), existing planets are replaced entirely.
        - aliases:
            - import_ling_universe


            
                     
                     
                     
- **install**:
    [Installs](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#install-algorithm) a planet in your application.
      
    - Arguments:
        - parameters: 
            - planetDotName: the [planetDotName](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) of the planet to install.
            - ?version: the version of the planet to install. If null (by default), the planet will be installed in its latest version (this is called [uni style mode](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#uni-style-vs-versioned-style))
          
        - options: 
            - app: string. The path to the app in which to install the planet. By default, the current working directory (pwd) is assumed.
            - crm: string=latest. The [application conflict resolution mode](application-conflict-resolution-mode). The possible values are:
                - ask
                - abort
                - keep
                - replace
                - latest
                - earliest
            - tim: string. The path to a file containing the [theoretical import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map) to use. If set, this will bypass the planetDotName argument passed to this command,
              and the planets imported will be the ones defined in the **theoretical import map**. 
            
        - flags: 
            - d: if set, enables the debug mode, in which output is a bit more verbose
            - no-symlinks: if set, the install command will not try to use symlinks to import your planet. See the [symlinks workflow discussion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#alternate-universe-and-symlink-speed-up-your-workflow) for more information. 
            - no-deps: if set, the install command will only install the given planet, and will not try to install its dependencies (if any). 
            - test: if set, the install command will stop after creating and displaying the [concrete import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map). In other words, nothing will be actually imported, but you will see the list of 
                what would have been imported if you didn't add the test flag. 
            - f: if set, forces the reimporting of the planet, even if it's already in your app
            - test-build-dir: if set, the install command will stop after creating the build dir. In other words, nothing will be actually imported, but you will not only have the [concrete import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map) created,
                but also the **build dir**. See the [import algorithm](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-algorithm) section for more info about the **build dir**.
        - aliases:
            - install
            
                     
                     
                     
- **install_init1**:
    This is not meant to be used by you directly (it's used internally by the **install** command). Here is its documentation nonetheless.
    This command triggers the [init 1 phase of the install procedure](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#init-1).
      
    - Arguments:
        - parameters: 
            - sessionDir: the session directory to use.
        - options: 
            - app: string. The application directory. Defaults to the current working directory.
        - flags: 
            - d: if set, enables the debug mode, in which the output is a bit more verbose.
                     
                     
- **install_init2**:
    This is not meant to be used by you directly (it's used internally by the **install** command). Here is its documentation nonetheless.
    This command triggers the [init 2 phase of the install procedure](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#init-2).
      
    - Arguments:
        - parameters: 
            - sessionDir: the session directory to use.
        - options: 
            - app: string. The application directory. Defaults to the current working directory.
        - flags: 
            - d: if set, enables the debug mode, in which the output is a bit more verbose.
                     
                     
- **install_init3**:
    This is not meant to be used by you directly (it's used internally by the **install** command). Here is its documentation nonetheless.
    This command triggers the [init 3 phase of the install procedure](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#init-3).
      
    - Arguments:
        - parameters: 
            - sessionDir: the session directory to use.
        - options: 
            - app: string. The application directory. Defaults to the current working directory.
        - flags: 
            - d: if set, enables the debug mode, in which the output is a bit more verbose.
            
                     
                     
                     
                     
                     
- **restore_map**:
    Restore a [universe map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#universe-maps) into your application.
      
    - Arguments:
        - parameters: 
            - ?mapPath: the path to the map to restore. If null (by default), we use the last map found in the **_universe_maps** directory if it exists (at the root of your application). 
        - aliases:
            - restore_map
            
                     
     
                     
- **todir**:
    Converts the planets of the app to directories. See more details in the [todir and tolink section](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#todir-and-tolink).
      
    - Arguments: 
        - aliases:
            - todir
            
                     
- **tolink**:
    Converts the planets of the app to symlinks (to the [local universe](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#local-universe)). See more details in the [todir and tolink section](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#todir-and-tolink).
      
    - Arguments: 
        - aliases:
            - tolink                
                
                                     
                     
- **uninstall**:
    [Uninstalls](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#uninstall-algorithm) a planet from your app.
      
    - Arguments:
        - parameters: 
            - planetDotName: the [planetDotName](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) of the planet to uninstall.
        - options: 
            - app: string. The path of the application where your planet is located. By default, the current working directory (pwd) is assumed.
        - aliases:
            - uninstall
            
                     
                     
                     
- **upgrade**:
    [Upgrades](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#upgrade-algorithm) a planet.
      This command will upgrade any planet found in the **planets array**.
      By default, if the **planets array** is empty, this command will upgrade all the planets of your app.
      
    - Arguments:
        - parameters: 
            - ?planetDotName: if set, adds the planet to the **planets array**.
        - options: 
            - list: string. The path to a babyYaml file listing planet names to add to the **planets array**.
        - flags: 
            - install: if set, the upgrade process will include the [install algorithm](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#install-algorithm).
            - d: if set, the output will be a bit more verbose. 
        - aliases:
            - upgrade
                
                     
                     
- **upgrade_universe**:
    [Upgrades](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#upgrade-algorithm) all the planets of a given **universe directory**.
      
    - Arguments:
        - parameters: 
            - uniDir: the path to the universe directory to upgrade.
        - aliases:
            - upgrade_universe
            
            
            
                                    
```



import map
-----------
2021-05-14 -> 2021-05-24

The **import map** is a list of planet/versions that needs to be imported when one wants to import/install a planet.

In its readable form, it looks like this:

- Ling.Light_ControllerHub: 1.3.1
- Ling.Bat: 1.315
- Ling.ArrayToString: 1.4.5
- Ling.BabyYaml: 1.7.8
- Ling.CheapLogger: 1.0.6
- Ling.BeeFramework: 1.0.7
- Ling.Komin: 1.0.2
- Ling.ClassCooker: 1.16.3
- Ling.TokenFun: 1.11.7
- Ling.DirScanner: 1.13.5
- .....

The **import map** is ordered dependencies first (and parents last), so that planets should be imported/installed from
top to bottom.

While creating the **import map**, dependencies conflicts can occur (i.e. conflicting version numbers). Our methods will
show them to the user after the method is executed.

There are two types of **import maps**:

- theoretical import map
- concrete import map

The **theoretical import map** is the first one created. It's the list of planets that should be imported if the target
app was empty.

The **concrete import map** is basically the actual planet list which will be imported in the target app.

The planets listed in the **concrete import map** will replace the ones with the same names in the target app.

The **concrete import map** is created by taking the **theoretical import map**, and resolving
the [application conflicts](#application-conflicts) it might contain.

See more about the **concrete import map** in the [import algorithm section](#import-algorithm).




The two types of conflicts
==========
2021-05-21

There are two main types of conflicts we are dealing with:

- inter-planet conflicts
- application conflicts

application conflicts
---------
2021-05-21

**Application conflicts** are the easiest to understand.

Every planet is in a state defined by a version.

When you want import a planet to an application, the application might already contain this planet, but in another
version, and so the question is:
which version do you want to keep.

For instance, let's say that in your application you have the **Ling.Bat** planet in version 1.210.

Now for some reason, you want to import **Ling.Bat** in version 1.320.

That will create an **application conflict**. This conflict is resolved by choosing a version (either 1.210 or 1.320 in
this case).

Our methods always expose **application conflicts** to the user, and let him/her decide what to do.

Application conflicts are normal, and quite simple to understand and resolve.

Note that if both planets (i.e. the one in the app and the one we wish to install) have the exact same version number,
then there is no **application conflict**.




inter-planet conflicts
---------
2021-05-21

The **inter-planet conflicts** are a bit harder to understand. They happen more frequently in contexts with high
connectivity (i.e. the planets/packages depend on each other a lot), such as the universe.

To understand an **inter-planet** conflict we need to understand the concept of **dependency**.

A **dependency** is created when a planet needs another one to work properly.

For instance, the current version of the **Ling.Bat** planet needs the **Ling.ArrayToString** planet to function
properly.

So we say that **Ling.Bat** (the current version) depends on **Ling.ArrayToString**.

A planet can have multiple dependencies.

In fact, the current version of **Ling.Bat** depends on the following planets:

- ArrayToString
- BabyYaml
- BeeFramework
- ClassCooker
- CopyDir
- DirScanner
- Tiphaine
- TokenFun

Notice that the list above doesn't contain any version number.

That's call **uni style** dependencies. When we work with **uni style** dependencies, it is assumed that we always use
the latest version of the planets, and therefore the version number is implicit.

When working with **uni style**, there is no **inter-planet** conflict.

In order to see **inter-planet** conflict, we need to use the **versioned style** system (as opposed to **uni style**),
which adds version numbers to every planet and dependency.

In **versioned style**, **Ling.Bat** in version 1.320 has the following dependencies:

- Ling:ArrayToString:1.4.5
- Ling:BabyYaml:1.7.10
- Ling:BeeFramework:1.0.7
- Ling:ClassCooker:1.16.3
- Ling:CopyDir:1.3.3
- Ling:DirScanner:1.13.5
- Ling:Tiphaine:1.0.3
- Ling:TokenFun:1.11.7

As you can imagine, each version of **Ling.Bat** has its own dependency list.

As you can imagine too, each dependency (for instance Ling.ArrayToString) might have dependencies of its own.

In such a context, weird things can happen.

For instance, we can see things such as (real examples):

- Ling.Bat:1.315 -> Ling.BabyYaml:1.7.8 -> Ling.Bat:1.307

or

- Ling.Bat:1.315 -> Ling.BabyYaml:1.7.8 -> Ling.CheapLogger:1.0.3 -> Ling.Bat:1.293

If we take the first example, in layman's terms in means:

planet **Ling.Bat** in version 1.315 depends on planet **Ling.BabyYaml** in version 1.7.8, which itself depends on
planet **Ling.Bat** in version 1.307.

So the obvious question is: which version of the planet **Ling.Bat** should we use? version 1.315 or version 1.307.

Now that we start to see how **inter-planet** conflicts occur, let's see how we handle them.

Our methods basically don't try to resolve those conflicts. Instead, the first planet defined stays, and all the
subsequent conflicts are ignored.

So if we take the previous example, we will use **Ling.Bat** in version 1.315, because the version 1.315 was there
first.

However, we also provide the user with the information of the conflicts (use our **explore_conflicts** command, or **
debug** command), so that he/she can investigate further in case this information is useful.

Our opinion about the **inter-planet** conflicts is that they will occur naturally in any context where planets are
interconnected, such as the universe, and we can't do much about it.

See the [uni style vs versioned style section](#uni-style-vs-versioned-style) for more chat about this topic.















application conflict resolution mode
---------
2021-05-17 -> 2021-05-21

Once the [theoretical import map](#import-map) is created, we compare it to the planets already in the application.

If a planet listed in the **theoretical import map** already exists in the target application with a different version,
we have an [application conflict](#application-conflicts).

Note that if the planet in the application has the same version as the one we wish to import, it doesn't create a
conflict (and is not listed in the **concrete import map**).

Our algorithm actually let us resolve all conflicts at once (to save time), or individually if you want to have full
control over the **application conflicts**.

If more than one **application conflict** occurs, the algorithm reads the value of the crm (conflict resolution mode)
option, which can be one of:

- ask: present the user with an overview of the conflicting planets, and ask the user what to do
- abort: abort the whole procedure
- keep: keep the planet already existing in the app
- replace: remove (irreversible) the planet already existing in the app and import the new one
- latest: keep the planet with the latest version (this potentially can irreversibly remove the planet from your app if
  the challenger planet has a higher version)
- earliest: keep the planet with the lowest version number  (this potentially can irreversibly remove the planet from
  your app if the challenger planet has a earlier version)

The default mode is **latest**, in accordance to my own personal preferences.

If the mode is **ask**: the user is presented with an overview of the conflicting planets, and then is presented with
the crm options (listed above), with the addition of an option to resolve each conflict individually. Note that the crm
options presented to the user, except for the "resolve individually" option, are applied to all subsequent conflicts (so
that the user can make a global choice that is applied to all conflicting planets at once, thus saving time).

Resolving all those **application conflicts** leads to the construction of the **concrete import map**, which is then
mapped to the application without question.





import algorithm
----------
2021-05-17 -> 2021-05-24

In this section I give an overview of how the import method internals works, as to give some intuition for developers
who want to expand on it.

We start by [banging](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md#bang) the target
app, to make sure it's usable.

Then we create a [session dir](#session-dir), in which we will put some useful debugging information.

Then, we build the [theoretical import map](#import-map).

Then, we create the [concrete import map](#import-map) by resolving the
potential [application conflicts](#application-conflicts).

To resolve those **application conflicts**, we use the [conflict resolution mode](#application-conflict-resolution-mode)
.

If something goes wrong with the **import**, we can use the **concrete import map** (cim) backed up in the **session
dir** to go back to the previous state of the app.

Note that if you use the force option (f flag), the **theoretical import map** basically becomes the **concrete import
map** directly, which means the conflict resolution phase is skipped (i.e. no **application conflicts**).

Then we create a **build directory**, in which we will actually import the planets listed in the **concrete import map**
.

We use a **build directory** to isolate the target app from potential errors that could occur while importing planets (
for instance if the web connexion fails, and we cannot import a planet, we want to minimize the impact of the errors on
the target app).

Note: we do not import the **assets/map** in the **build directory**. That's something done via our **install** command.

Assuming the **build directory** is correctly built (if not, we abort the process), we then proceed to copy (or symlink,
depending on the options) the content of the **build directory**
to the target app.






install algorithm
----------
2021-05-24

Our **install** command will install a planet in the target application.

The **install** procedure is composed of the following phases, executed in order:

- import: importing the planet using the **import** command
- init 1: assets/map, configuring service config files if required (make the container functional)
- init 2: prepare the container further (i.e. registering to open services for instance), add special files if necessary
- init 3: db configuration

The **import** phase is the execution of our [import command](#import-algorithm), already explained in this document.

All init phases are stored in a special file, which location is defined by the following convention:

- $appDir/universe/$galaxy/$planetName/Light_PlanetInstaller/${tightPlanetName}PlanetInstaller.php

With:

- $appDir: path to your app
- $galaxy: name of the galaxy of your planet
- $planetName: name of your planet
- $tightPlanetName:
  the [compressed name of your planet](https://github.com/karayabin/universe-snapshot#the-compressed-planet-name)

When you call the **install** command, the **init 2** and **init 3** are called from sub-processes of the **install**
command. That's because the container is in a different state at every init step (so we need to start fresh every time,
to avoid autoloading issues, mainly).

Note: the init phases (i.e. **init 1**, **init 2** , **init 3**) are called on planets listed in
the [concrete import map](#import-map) only. When we call a phase (import, init 1, etc...), all the planets listed in
the **concrete import map** are executed, so for instance when we call phase **init 2**, all planets listed in the **
concrete import map** have already gone through the **import** and **init 1** phase.

### init 1

2021-05-24

During the **init 1** phase, we import assets/map files, and configure the container so that it reaches a functional
level.

By functional level, I mean that we can call the container without having any error.

However, the container might not be fully operational after the **init 1** is complete (this is the job of **init 2**,
and **init 3**).

So this means that your **init 1** code basically cannot use the container, because it's not ready yet.

### init 2

2021-05-24

When **init 2** starts, the container is already in a functional state, so plugins can start using it, but carefully (
i.e. it might not be fully operational yet).

Planets, during **init 2**, add **smart files** to the application.

By **smart files**, I mean all the files that couldn't be imported via the (
dumb) [assets/map](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#the-planets-and-assetsmap)
technique.

Those files are mainly the files required
in [open registration systems](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/open-vs-close-service-registration.md#the-open-registration)
.

### init 3

2021-05-24 -> 2021-05-25

When **init 3** starts, the container is in an almost fully operational state. The only thing missing is the database
tables basically.

Therefore, planets, at this phase, can use a great deal of the container power. They still need to be careful not
calling services that use a database table which doesn't exist yet.

The goal of the **init 3** phase is to install/configure all the database tables required by the planet.

At the end of **init 3**, the container should be fully operational, and therefore the application ready to be used.

Note for developers:

The philosophy of **init 3**, for developers, is that it should install elements one by one, only if they don't exist.

So much so that if we call the **init3** method multiple times it won't complain or trigger any error.

Another design option we have is to use the isInstalled/install couple, but after evaluating the pros and cons of each
design, I now tend to prefer this granular approach, as it leads to a simpler design in the end.

Basically you just have one **install** button that you trigger every time you install a planet.

With the other approach, you need to deal with a force flag that triggers the **install** process even if the planet is
already installed, which adds unnecessary complexity to my opinion.







uninstall algorithm
----------
2021-05-25 -> 2021-05-27

Since we can [import](#import-algorithm) and [install](#install-algorithm) planets, we also need some commands to "
unimport" an "uninstall" them.

The **uninstall** command does the following:

- it undoes the **init 3**, **init 2**, and **init 1** phases in this order (reminder: those phases are described in
  the [install algorithm](#install-algorithm))

The main idea is that after executing the **uninstall** command, your planet is just in the imported state (i.e. as if
you had just imported the planet).

However, the dependencies are untouched, because they might be used by other planets.

Also, the peculiarity of the **uninstall** procedure is that it can be called in a context where the planet is actually
not necessarily installed.

This implies that developers must be careful to provide code instructions that would work for both cases, whether the
planet is actually installed or not.





upgrade algorithm
--------
2021-05-27

The upgrade algorithm is composed of the following parts:

- the [uninstall](#uninstall-algorithm)
- the physical removal of the old planet (deleting the dir/symlink from the hard drive)
- the [import](#import-algorithm) of the new planet
- optionally the [install](#install-algorithm) of the new planet (only if you pass the **--install** option)

By default, it will upgrade every planet in the given app directory, or you can specify a particular planet to upgrade,
or even a list of planets to upgrade.







delete concept
------------
2021-05-27

The destructive **delete** concept is like the [uninstall](#uninstall-algorithm) command, but goes one step further.

It first **uninstalls** the planet first (using the **uninstall algorithm**), and then physically removing the planet
directory from the disk (if it's a symlink, only the symlink is removed, not the target of the symlink).

Because of its destructive nature, I didn't implement its corresponding command yet (I wait to see if I have a real use
case for it).










session dir
--------
2021-05-20 -> 2021-05-21

The **session dir** is a directory created automatically when you trigger the import/install commands.

It's basically keeps track of the information used by those commands, and is mostly useful for debugging.

A typical session dir will contain this information:

- [theoretical import map](#import-map)
- [concrete import map](#import-map)
- dependency conflicts map (see the [import algorithm](#import-algorithm) for more info)
- the **build dir** (see the [import algorithm](#import-algorithm) for more info)

You can use the **debug** command to investigate session dirs (be sure to be in an app directory before you trigger this
command):

```bash
light debug
```

Since it's sometime useful for the user to have this information after triggering the import/install command, we've
decided that the **session dirs** are not automatically removed. Instead, we place them in a temporary directory, and
expect the user to do some cleaning regularly.

The **clean** command will wipe out all the existing **session dirs**:

```bash
light clean
```

the lpi deps file
-------
2021-05-14

The **lpi deps** is a file at the root of the planet directory, which contains the dependencies for each version of the
planet.

The exact name of the file is:

- lpi-deps.byml (it's a babyYaml file)

Here is an excerpt of the lpi deps file for the **Ling.Bat** planet:

```yaml
1.0.0:
    - Ling:Bat:1.293
    - Ling:CheapLogger:1.0.3

1.1.0:
    - Ling:Bat:1.293
    - Ling:CheapLogger:1.0.3

1.1.1:
    - Ling:Bat:1.293
    - Ling:CheapLogger:1.0.3

1.2.0:
    - Ling:Bat:1.293
    - Ling:CheapLogger:1.0.3


```

Every planet which wants to be compliant with our installer must provide this file.

This file can be used by developers who want to dive into compatibility problems.

This file is also used by our tool if you import/install a planet with a specific version number.



uni style vs versioned style
---------
2021-05-17 -> 2021-05-21

There are two main styles of importing that we use in this planet:

- **uni style**
- **versioned style**

In **uni style**, we always import the latest (or what we consider to be the latest) version of the planets. This also
applies to the dependencies, recursively. The **uni style** is the original way of importing things in the universe, and
is in accordance with the universe philosophy.

It's the recommended way of importing things.

In **versioned style**, we try to import a planet with a specific version, and we also include all the dependencies (
recursively) in the versions they were used by their master/parent. This style was added later to the universe.

This might be useful in some cases, if you absolutely need to have a certain version of a planet.

### My personal opinion about it

2021-05-21

In the universe, I generally use the **uni style**, because it's easier to think about, and I generally always need the
latest versions of the planets.

The only case where I might need **versioned system** is when creating a **dead app** for a client.

By **dead app**, I mean an application which contains planets that you don't want to touch at all: as long as it works,
keep it that way.

Basically, a **dead app** is an app in which planets are disconnected from the (always evolving) universe.

So basically, when it's for a client, I don't want to update planets, unless the client asks for it.

So at some point, the client wants to update the app, which might translate for me as: create new planets, or update
some planets.

If some planets needs to be updated, that's where we need to be cautious.

The only tool that really helps in this case is:

- unit tests

The **unit tests** can provide you with useful information:

- does something fail after the update
- if so, where exactly did it fail

Now when you really need to update a planet, maybe that's where the versioned style can be handy. For instance, let's
say you have the planet Ling.Bat in version 1.320.

Now you might choose which version you want to upgrade to, for instance:

- 1.400
- 1.421
- 1.522

You might also want to choose whether the dependencies (of Ling.Bat) should be upgraded too. I would probably go very
slowly, not including the dependencies, and launching the **unit tests** after every upgrade.

To not include the dependencies when you import/install a planet, use the **--no-deps** option, like this:

```bash
lt import Ling.Bat 1.320 --no-deps
```

In conclusion, when working with a **dead app**, importing specific version of the planets seems more reasonable that
upgrading every planet to its latest version. Therefore, the **versioned system** seems more appropriate in this **dead
app** scenario.

At the end of the day, it's still the same command that triggers both import/install styles, we just add the version
number if we want to trigger **versioned style**. Without the version number, the **uni style** is assumed.

So, the import/install commands are all we need:

- lt import Ling.Bat            (imports in uni style)
- lt import Ling.Bat 1.320      (imports in versioned style)

Versioned style mess
---------
2021-05-20 -> 2021-05-25

I really don't want to discourage you to use the **versioned system**, but if you do, you must be aware that it has
flaws.

Not all versions of all my planets are on **github.com**. Most of them are, but sometimes for some reasons, the commit
didn't push as expected. This means that if you import/install a planet (using the **versioned system**), and it has a
dependency on a version that doesn't exist on **github.com**, then you will have an error.

To add to the confusion, I did something terrible: sometimes, when some tags were missing in the web repository of a
planet, I added them manually, but forgot to change the version number, which might result in some inconsistencies
between the tag number assigned at **github.com** and the planet version number found in the **meta-info.byml** file at
the root of the planet.

I don't remember exactly which planets were affected by that, but it's not a big list I believe (maybe 10 planets?), the
ones I know for sure have this problem are the following:

- Light_PluginInstaller: 2.0.12 and 2.0.13 were created artificially

I don't fix it, because I don't use the versioned system, but I just wanted to warn the users of the versioned system
that this is a potential source of problems.



Universe maps
---------
2021-05-20

**Universe maps** are useful to quickly import planets in an application.

It's basically a list of planets with a version number.

The **map** (aka **create_map**) command will create a universe map, while the **restore_map** command will put the
planets from the map back to the application.

The nice thing with restoring a map is that it doesn't include dependencies, it just imports all the planet listed in
the map, nothing more.

Note: it doesn't remove planets from the app not listed in the app (if you want this, remove them manually before
applying the **restore_map** command).

Then, using the **install_all** command, you can call the **install** procedure on all existing planets in the app.

By default, universe maps are stored at the root of the application, in the following directory:

- **_universe_maps**

alternate universe and symlink, speed up your workflow
--------
2021-05-27

Alternate universe and symlink can speed up your workflow considerably.

If you try a command like this one for instance:

```bash
lt install Ling.Light_ControllerHub -u
```

This command will take about 1 second to execute on my computer, because I have an **alternate universe** on my machine.

If you don't have an **alternate universe** on your computer, it might take a minute or two.

So what's an **alternate universe**?

Basically, it's a local copy of the latest planets of the universe, but on your machine.

If the planets you need are already on your machine, you don't need to fetch them on the internet, hence the huge time
saving.

That's the idea.

By default, when you import/install a planet, our command will check if you have an alternate universe, and if you do,
it will create symlink to that alternate universe when it can (i.e. if you are using
the [uni system](#uni-style-vs-versioned-style)), rather than copying files.

Creating a symlink to a planet (i.e. a directory) is much faster than copying the dir to your application, hence here
again some time is saved.

Also, by default, the command assumes that your **alternate universe** is
the [local universe](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#local-universe)
.

Therefore, if you install a **local universe** on your machine, you should have our commands working as fast as they
possibly can.

The main downside to this technique is that you need to download the whole universe before you can use this technique.

But since you do this only once, it's totally worth it.

To download the whole universe, you could try cloning this
repository [https://github.com/karayabin/universe-snapshot](https://github.com/karayabin/universe-snapshot), but to be
honest, the planets are always outdated, because I only update the snapshot every month, whereas planets evolve every
day.

So a better alternative would be to use the **import_ling_universe** command.

This command will fetch the latest versions of each planet directly, thus giving you a version of my planets very close
to what I personally have on my computer.

If a planet already exists in the **destination dir**, this command will remove them by default. Use the **
--skip-existing** flag to skip them instead (I don't recommend it because it can potentially lead to incomplete planets,
but if you know exactly what you are doing it can save you some time).

Once your **local universe** is stored on your machine, you can upgrade it with the **upgrade_universe** command, which
basically upgrades every planet that needs it.

So here is how we could use those two commands, first create the local universe at **/myphp/universe** (default location
of the **local universe**)

```bash
lt import_ling_universe /myphp/universe 
```

Then, from time to time, we do an upgrade:

```bash
lt upgrade_universe /myphp/universe 
```





todir and tolink
-----------
2021-05-31


**todir** and **tolink** are two complementary comments that might be useful if you are using a [local universe](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#local-universe).

Basically, they convert the planets of your app in either real directories or symlinks.


- todir: convert all the planets of your app (that are links) to real directories
- tolink: convert all the planets of your app (that are real directories) to links (symlinks) to their local universe correspondent if any
                



































