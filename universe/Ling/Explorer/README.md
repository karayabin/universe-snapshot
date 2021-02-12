Explorer
=============
2016-12-28



Tool for installing planets into your application.





Explorer is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
=============


Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import Ling/Explorer
```




DISCLAIMER -- this tool has been superseded! It is now recommended to use the newer [universe-naive-importer](https://github.com/lingtalfi/universe-naive-importer)
to import planets and dependencies into your application.





Table of contents
====================
- [Nomenclature](#nomenclature)
- [Motivation](#motivation)
- [How is it implemented](#how-is-it-implemented)
  * [Maculus naming system (used by this implementation of explorer):](#maculus-naming-system--used-by-this-implementation-of-explorer--)
  * [The current state of the universe](#the-current-state-of-the-universe)
  * [The example package-info.yml](#the-example-package-infoyml)
  * [The Explorer system](#the-explorer-system)
  * [The Explorer script](#the-explorer-script)
    + [How to install it the Explorer script?](#how-to-install-it-the-explorer-script-)
    + [How to use the explorer script?](#how-to-use-the-explorer-script-)
    + [The structure of the explorer-script](#the-structure-of-the-explorer-script)
- [Create your own universe](#create-your-own-universe)
- [Conclusion](#conclusion)
- [History Log](#history-log)





Nomenclature
================

A planet is a package.
Each developer creates its own universe, composed of planets.

Explorer helps using installing planets on a per-application basis.

The ensemble of all universes is called multi-verse. 

There is only one multi-verse.




Motivation
=================

As the sole user of my universe, I generally don't have the need for an installer tool.

However, my [nullos admin](https://github.com/lingtalfi/nullos-admin) application uses modules.

And modules might need some special planets.

Since modules are installed via a gui, the gui needs to import the module's planets automatically
if necessary.

That's why and where the Explorer comes in.


Explorer is not complicated: it doesn't care about version numbers, it just
ckecks whether or not the planet is already installed or not.

If it's already there, the Explorer does nothing.

If it's not there, then the Explorer installs the planet in the given location.


Maybe even simpler, each planet is given a unique name by its author, and that's it (i.e. not one name per version, just one single name per planet).

Sometimes, planets have the same name (for instance if another author creates 
a planet with the same name), and it creates a collision.

This implementation of explorer accepts the nature of the universe and doesn't deny 
that planets sometimes crash with each others.





How is it implemented
========================




Maculus naming system (used by this implementation of explorer):
----------------------

The following system, named Maculus, is the backbone of the Explorer implementation.

It's the nomenclature I used while implementing the Explorer classes. 




- dependency: &lt;importerType> &lt;::/> &lt;planetIdentifier>
- planetIdentifier: &lt;universeName> &lt;/> &lt;planetName>
- universeName: string, not colon, no slash
- planetName: string, not colon, no slash
- planetSnapshotIdentifier: &lt;planetIdentifier> (&lt;:> &lt;version>)?
- version: &lt;versionNumber> (&lt;(> &lt;versionComment> &lt;)>)?


- universe: directory containing &lt;planet>s.
    There are two types of &lt;universe>:
    - abstract universe (aka universe or author universe): this is like a standalone library, where each planet is a package.
            No collision occurs between planets.
            An &lt;author> can create multiple &lt;abstract universe>s, and must give an unique name to each of them.
            Often, for a given author there is only one &lt;abstract universe> which is named after the &lt;author>'s name.
            
    - working universe: a directory containing all the planets for a given project.
            The working universe can host planets from different &lt;abstract universe>s.
            It's often a "planets" directory (or "class-planets" directory) inside your application.
            Collisions can occur (although it generally doesn't).
            Note: there are always autoloaders workaround for cases where the application requires multiple &lt;planet>s from different &lt;universe>s (abstract) with the same name 
            Note: only the &lt;planetName>s are used in a &lt;working universe> (i.e. the &lt;abstract universe>s' names are ignored).
            
- planet: a php package, the &lt;planetName> is the name of the directory
- author: the human person behind an &lt;abstract universe>






The current state of the universe 
------------
A long time ago, when I started my universe, I thought that I would create a system that would
take care of version numbers.

I wanted a flexible system and so I thought that one way to solve dependencies was to add a meta file
at the root of each planet. That meta file would contain the information about the planet dependencies.

This meta file is called the package info file (package-info.yml).

It's a [babyYaml](https://github.com/lingtalfi/BabyYaml) file that contains an array of any information that 
the author wants to add to her planet.


But the Explorer only cares about one information: the "dependencies" key.


- dependencies:
    - this key is an array containing the &lt;dependency> (defined in the Maculus nomenclature).
            Actually, it contains a &lt;planetSnapshotIdentifier> but this implementation of Explorer
            only cares about the &lt;dependency> part (&lt;dependency> is a substring of the &lt;planetSnapshotIdentifier>)
    
   

The example package-info.yml
--------------------------------

```yaml
dependencies:
    - git::/lingtalfi/CopyDir:1.0.0    
    - git::/lingtalfi/Tiphaine:1.0.0    
```
 
 
 
 
 
The Explorer system
-----------------------
 
Explorer is simple.
 
It works in two phases:

- import
- install


Import is the action of taking a planet from the web to your local machine.
Install is the action of copying the planet from your local machine to a "client" web application.
 
When a file is **imported** (from the web), the files are placed on your machine in a directory called the "warp zone".
 
When you **install** a file (using the install command of Explorer), Explorer first checks whether or not the planet(s)
you want to install are already in the **warp zone** (it's faster to copy the planets directly from the "warp zone"
rather than go out on the internet to fetch them, and that's why the "warp zone" exist in the first place).

 
Explorer knows how to handle dependencies too.
  
When a planet is installed, Explorer always check whether or not the **package-info.yml** file exist in 
the planet directory. 
If so, and if the package info file contains the **dependencies** array, then the Explorer will also install
all the dependencies, using exactly the same approach (first import, then install).



The Explorer script
---------------------

Just for fun, the Explorer comes with a script that can import any planet (and dependencies) in one line.

For instance, you could type the following in a terminal:

```bash
explorer install lingtalfi/Bat
```

This would (import and) install the Bat planet and its dependencies (CopyDir and Tiphaine in this case).

The explorer script is meant to be a stand alone script (it comes bundled with all the dependencies it needs).

It's located in the **explorer-script** directory of this repository.


### How to install it the Explorer script?

To install the Explorer script, there are two methods:

- the automatic method (recommended)
- the manual method 


The automatic method is simple: paste this in a terminal.

```bash
cd; curl -o zzx2.php https://raw.githubusercontent.com/lingtalfi/Explorer/master/explorer-script/installer.txt; php -f zzx2.php; rm zzx2.php
```

The manual method basically explains what the automatic method does:
- ensure that your system has the following softwares installed:
    - curl
    - unzip
    - if your machine don't have them, this won't work as for this version of the Explorer 
- then download the repository 
- then copy the **explorer-script** directory to your home directory, or somewhere where you want,
        but that would be its final location (so be thoughtful, home is recommended if you have no other ideas)
- finally create an alias in your .bash_profile or .bashrc (windows user, I'm sorry I have no clue how it's done anymore):
    - alias explorer='php -f "/home/me/explorer-script/explorer.php" --'
- source your .bash_profile
- ok

 
### How to use the explorer script?
 
Cd into your application root directory and execute an explorer command (see below for the commands).
Basically, the install command will try to create a **class-planets/** directory in your application,
and put all your planets in it. 

Here is an extract of the documentation, found in the **explorer-script/explorer.php** script.
 
```php
 * explorer install <planetIdentifier|dependency> <targetDirectory>? <installOptions>?
 *      - this command imports and installs the planet and its dependencies
 *          inside the <targetDirectory>/planets directory if found, or inside the
 *          <targetDirectory>/class-planets directory otherwise (it's created if it doesn't exist)
 *      - planetIdentifier: the git <importerType> will be assumed. To choose the <importerType>, use the <dependency> instead
 *      - targetDirectory: if omitted, the current directory will be used
 *      - installOptions:
 *          - -i: force the re-install (overwrite the planet dir in the target directory)
 *          - -f: force the re-import (fetch from the web and overwrite the planet dir in the <warp> directory)
 *          - -q: quiet mode (no explanations)
 *
 * explorer import <planetIdentifier> <importOptions>?
 *      - imports the planet to the <warp> directory, which location you can define in this script,
 *          and defaults to a "warp" directory next to this script.
 *          Basically, the <warp> directory is a cache directory to avoid fetching planets from the web.
 *      - importOptions:
 *          - -f: force the re-import (fetch from the web and overwrite the planet dir in the <warp> directory)
 *          - -q: quiet mode (no explanations) 
```


### The structure of the explorer-script

The **explorer-script/** directory looks like this:
 
- explorer-script/ 
    - pack/, a bunch of files used by the **explorer.php** script. Don't worry about them, they might change in the future
    - warp/, this is the default **warp zone** location. All the imports are placed here by default.
                You can change the **warp zone** location by updating the explorer.php script (towards the top of the script)
    - explorer.php, the explorer script itself
    - install.txt, the php script used by the one liner install

 
 
 
Create your own universe
=====================

So now the fun part: you can use the explorer-script to your advantage.

For instance, imagine that your name is **wise** and you have a github repository named **MyNinjaTurtle**.

You could then install your **MyNinjaTurtle** planet with the following commands.

```bash
cd /my/target/app
explorer install wise/MyNinjaTurtle
```

Told you, that's simple.

Now if your **MyNinjaTurtle** planet depends on a **GirlDoll** planet of yours, just create a **package-info.yml**
file at the root of your **MyNinjaTurtle** planet, like this:


```yaml
dependencies:
    - git::/wise/GirlDoll        
```


Or, if you use a versioning system:

```yaml
dependencies:
    - git::/wise/GirlDoll:1.3.0 (this is a comment, a comment is wrapped in parenthesis)        
```


Now if you install the **MyNinjaTurtle** planet, it will also install **GirlDoll**.


So, hopefully that's enough of a teaser.

The best part is probably that you can use other's planets too, Explorer works the same.



Conclusion
=============== 

So that's it.
Thanks to the Explorer, my nullos app can now use the explorer module to import planets into the application.
And maybe you will be using that tool too for your own apps, who knows?







History Log
===============

- 1.2.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.0 -- 2016-12-30

    - add MaculusExplorerUtil 
    
- 1.1.1 -- 2016-12-30

    - add more checkings to MaculusExplorer 
    
- 1.1.0 -- 2016-12-29

    - add debug option to Explorer
    
- 1.0.0 -- 2016-12-29

    - initial commit




