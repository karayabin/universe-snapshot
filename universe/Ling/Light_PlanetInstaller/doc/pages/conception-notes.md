Light_PlanetInstaller, conception notes
================
2020-12-03 -> 2021-02-05

This is a variation of the [uni tool](https://github.com/lingtalfi/universe-naive-importer), which I found too
complicated.

What's different from the **uni** tool is that:

- it supports dependency resolution WITH RESPECT to version numbers
- it can install (installable) plugins in addition to importing them into your app
- it has a **lpi.byml** file, which you can use as an interface to express your installation wishes (very much like
  the **package.json** used by npm)





How to install
---------
2020-12-03 -> 2021-01-25



This plugin is particular as its main use is via the command line.

If you're using [Light_Cli](https://github.com/lingtalfi/Light_Cli), our app id is **lpi**.
In addition to that, we provide the following shortcuts:

- light install -> light lpi install
- light uninstall ->  light lpi uninstall
- light import ->  light lpi import
- light remove ->  light lpi remove



If you don't use **Light_Cli**, we provide the **scripts/Ling/Light_PlanetInstaller/lpi.php** file as an entry point.

If you're using that entry point, then I suggest that you create a bash alias to make your life easier

```bash
alias lpi='php -f ./scripts/Ling/Light_PlanetInstaller/lpi.php -- '
```

From there, what you can do is "cd" to the app, and then use the lpi command.

```bash 
cd /path_to_your_app
lpi help
lpi install Ling.BabyYaml
```




The lpi.byml file
-------------
2020-12-03 -> 2021-01-25


The **lpi.byml** file is basically the file where you say which planets and which version you want.

It's in [babyYaml](https://github.com/lingtalfi/BabyYaml) format for readability.


It looks something like this:

```yaml
planets:
    Ling.AdminTable: 1.6.6
    Ling.AjaxCommunicationProtocol: 1.1.0+
    Ling.ArrayDiff: last
    Ling.ArrayToString: 1.4.0-
```

The syntax of this file is described in more details in the [next section](#the-content-of-the-lpibyml).


Once you've got your **lpi** file, you can call the **import** or **install** command without arguments, to either import or install all the planets
defined in the lpi file.

Those methods will also update the **lpi** file accordingly.

So for instance, if you call: 

- lpi install Ling.BabyYaml 

This will add a **Ling.BabyYaml** line in your lpi file.

In addition to that, it will sort the planets listed in the **lpi** file lines alphabetically.

Therefore, you shouldn't get too attached to customize your file, because it's going to be rewritten by our tools all the time.

Instead, consider the lpi file just as an alternate way to install/import your plugins, and also as a file keeping tracks of the planets in your application.


The **lpi** file must be at the root of your application directory.

More info about the **install** and **import** commands in the [commands section](#usage-the-commands).







### The content of the lpi.byml
2020-12-03 -> 2021-01-11



This is a [babyYaml](https://github.com/lingtalfi/BabyYaml) file, and the content looks like this:

```yaml

planets:
    $planetDotName: $versionExpression

```


With:

- $planetDotName: the [planet dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name)
- $versionExpression: the [version expression](#version-expression) representing the desired version for this planet



### Resolution of lpi.byml
2021-01-05 -> 2021-01-25


When importing/installing planets, our installer has to make some decisions.

For instance, your application already contains planet Ling.Bat in version 1.292, and your [lpi file](#the-lpibyml-file)
defines Ling.Bat with version 1.290+.

So our installer needs to decide whether to keep 1.292 or replace it with 1.290 instead.

Our algorithm always chooses the highest version number when such a choice occur, so in this case, 1.292.



It looks like this:

let **c** be the challenger version (the planet that already exists in the application), and **w** be the version you wish
to install (that you have defined in your **lpi.byml** file), and **r** be the resulting version picked by our
algorithm.

Then we have:

- c: 1.6.3, w: 1.6.4-, r: 1.6.4
- c: 1.6.3, w: 1.6.2+, r: 1.6.3

Note: this is an experimenting behaviour, we can change our algo at any time if practise requires so, but we believe
it's a good starting point.





The handlers
------------
2020-12-03 -> 2021-01-11

What we call **handler** is the technique used to fetch a planet.

A planet could be hosted on **github.com** for instance, or **bitbucket.org**, or on a personal server, or on
**packagist.org**, etc...

Each site requires a dedicated handler.

In our conception, we use the **galaxy** as an alias for a particular handler along with a set of specific parameters it might require. 
By default, you cannot have different handlers for a given galaxy. So for instance the **Ling** galaxy means two things:

- packages from author Ling
- packages hosted on github.com (that's the handler)

If you have multiple plugins on different platforms, this means you need different galaxy names (if you use our installer, that is), one for each handler,
for instance for Ling:

- LingGithub
- LingBitBucket
- LingPackagist
- LingHostXXX
- ...

Of course, you can be more creative than that and find more poetic names, but in essence that's the idea with this
installer.

A handler is defined by the following properties:

- type: the type of handler, which corresponds to a class in our plugin. So far, the available handlers are:
    - **github**: a handler that fetches planet from **github.com**


- ...other properties, depending on the type. 
    - For type=github, the properties are:
        - account: the name of the github account, it is such as the url corresponding to the github repository url is:
        - **https://github.com/$account/$planet**. This handler expects that the different versions of your planet are
          released as tags on github.com, so that the url to access that $version is:
        - https://github.com/$account/$planet/releases/tag/$version

Handlers are defined in the [global configuration](#the-global-configuration), under the **handlers** property.



The difference between install and import
-----------
2020-12-03 -> 2021-01-25

The difference is described in the [import install discussion](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).

For us, **import** is the basic [import procedure](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#the-import-procedure) of a planet, without the assets (unless otherwise specified).

And **install** is just as described in the **import install discussion**.

An **installable plugin** is a plugin that implements the **PluginInstallerInterface**, read the [plugin installer conception notes](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/pages/conception-notes.md#how-to-make-your-plugin-installable) for more details. 




The global configuration
----------
2020-12-03 -> 2021-01-11

The configuration of this service is stored in a global location:

- **/usr/local/share/universe/Ling/Light_PlanetInstaller/conf.byml** 
  

This location can't be changed.

It contains the following properties:

```yaml


# An array of galaxyName => default handler parameters
handlers:
    Ling:
        type: github
        account: lingtalfi
# path to the local universe, if any, or null by default        
local_universe: null

# whether to fetch planets with version expression "last" in the local universe or in the web
local_universe_has_last: true 

```

Those are the default values, which are implicit. Which means if you don't create the configuration file at all, those
values will still be used.

Of course, you can overwrite them by creating the configuration file.


The local universe
---------
2021-02-01

During development, I found myself needing to test things a lot, and I needed a way for the installer to use my local planets, as publishing
a planet every time I wanted to do a test would have been very cumbersome.

As a result, the planet installer now has a local universe option.

The **local universe** is a directory which contains the universe that you might use locally.

The main idea is that instead of looking for planets in the web, which takes some time due to the http request trip, 
our **planet installer** searches first for planets in the **local universe** if any.

Basically, the local universe is a copy of some the planets on the web, and acts as a cache for our installer.
If a planet is not found in the local universe, then only the **planet installer** will fetch that planet on the web.

By default, this also applies to the **last** [version expression](#version-expression). This means that if you specify
the **last** version expression when installing/importing a planet, our **planet installer** will first look in the local universe too.

If you prefer that **last** always fetch planets from the web, set the **local_universe_has_last** property of the [global conf](#the-global-configuration) to false. 





The logging system
----------
2020-12-04 -> 2020-12-07

When you execute a command, a number of things can go wrong. For instance if you import a planet and the version you ask
for doesn't exist, etc...

All those errors are being logged, using the [Light_Logger](https://github.com/lingtalfi/Light_Logger) plugin under the
hood (if available), with a channel of **lpi_error**.







Version expression
---------
2020-12-03 -> 2021-01-01

The **version expression** represents the number of the desired version.

It can be either:

- a keyword
- a **version number**, optionally immediately (no space in between) followed by a **modifier symbol**.

The keyword can be one of the following:

- **last**: we can use the special "last" keyword to indicate that we always want the current version from the web,
  which supposedly is the last one. Note: I'm aware that your local machine might have a latter version (in case you're
  the plugin author), but I wanted to keep things simple, basically saying: the lpi tool only works with published
  plugins.

The **version number** must have one of the following formats:

- $major.$minor.$patch
- $major.$minor

Note: other formats could be added in the future.

The **modifier symbol** can be one of those:

- **polarity symbol**

The **polarity symbol** can be one of those:

- The plus symbol (+): indicates that you want the planet with the specified **version number** or higher.
- The minus symbol (-): indicates that you want the planet with the specified **version number** or lower.

The **version number** is also called the **absolute version** number internally.







mini version expression
---------
2020-12-31

Mini version expression is a term I used internally in the source code. 
It refers to the [version expression](#version-expression), but with the "last" keyword already resolved to a real **version number**.



Usage: the commands
-----------
2020-12-03 -> 2021-02-05


All commands described below assume that you're at the root directory of your app (i.e. **cd /my_app**),
and the app is a Light app.


- **help**: displays the help 
- **import** ($planetDefinition)?
    - With no argument, reads the [lpi.byml](#the-lpibyml-file) file and makes sure every planet defined in it is imported (along with its dependencies, recursively) in the host app.
    The [assets/map](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#the-planets-and-assetsmap) are not copied.
      
    - Arguments:
      - parameters: 
        - planetDefinition: if the **planetDefinition** argument is defined, it will [import](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary) 
          the given planet (and its dependencies recursively), without the **assets/map**, and update the **lpi.byml** file accordingly, using a plus symbol at the end of every newly imported planet's version number.
          
            The **$planetDefinition** stands for: $planetDotName(:$versionExpression)?
          
            With:
            - planetDotName: the [planetDotName](https://github.com/karayabin/universe-snapshot#the-planet-https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summarydot-name)
            - versionExpression: the [versionExpression](#version-expression), defaults to last if not defined
      - options: 
        - bernoni: string (auto|manual) = auto. The mode to use when a [bernoni conflict](#the-bernoni-problem-what-happens-in-case-of-conflict) occurs.
      - flags: 
        - keep-build: if set, the [build dir](#importing-to-the-build-dir) will not be automatically removed after a successful operation.
        - d: if set, enables the debug mode, in which all log levels messages are displayed
        - n: if set, doesn't update the **lpi file** when the **planetDefinition** parameter is defined
        - f: if set, forces the reimporting of the planet, even if it's already in your app

- **install** ($planetDefinition)?
  
    Same as import, but does a few extra steps:
    - copy the [assets/map](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#the-planets-and-assetsmap) if any 
    - triggers post assets/map hooks if any
    - [logic installs](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary) the [Light](https://github.com/lingtalfi/Light) plugin if it's [installable](#the-difference-between-install-and-import).

  - Arguments:
      - parameters:
          - planetDefinition: if the **planetDefinition** argument is defined, it will [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary)
            the given planet (and its dependencies recursively), with the **assets/map**, and update the **lpi.byml** file accordingly, using a plus symbol at the end of every newly imported planet's version number.

            The **$planetDefinition** stands for: $planetDotName(:$versionExpression)?

            With:
              - planetDotName: the [planetDotName](https://github.com/karayabin/universe-snapshot#the-planet-dot-name)
              - versionExpression: the [versionExpression](#version-expression), defaults to last if not defined
      - options:
          - bernoni: string (auto|manual) = auto. The mode to use when a [bernoni conflict](#the-bernoni-problem-what-happens-in-case-of-conflict) occurs.
      - flags:
          - keep-build: if set, the [build dir](#importing-to-the-build-dir) will not be automatically removed after a successful operation.
          - d: if set, enables the debug mode, in which all log levels messages are displayed
          - n: if set, doesn't update the **lpi file** when the **planetDefinition** parameter is defined
        - f: if set, forces the reimporting and reinstalling of the planet, even if it's already in your app and already installed
        
- **logic_install**: [logic installs](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary) the given planet. This command is used internally by the **install** command.
    This command assumes that the planet you want to **logic install** is already imported with assets/map.
    - Arguments:
        - parameters:
            - planetDotName: the [planetDotName](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) of the planet to logic install
      - flags:
          - d: whether to use debug mode
          - f: if set, forces the logic reinstalling of the planet, even if it's already logic installed
    

- **list**: lists all planets found in the current application, along with their current version numbers

- **remove $planetName**: 
        This command does the following:
            - [logic uninstalls](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/pages/conception-notes.md#the-logic-uninstall-procedure) the planet if it's [uninstallable](#the-difference-between-install-and-import) 
            - remove the [assets/map](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#the-planets-and-assetsmap) if any
            - removes the planet directory
            - updates the **lpi** file accordingly
  
    - Arguments:
        - parameters:
            - planetDotName: the [planetDotName](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) of the planet to remove 
        - flags:
            - n: if set, will not update the lpi file 
          

- **uninstall $planetName**: [logic uninstalls](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/pages/conception-notes.md#the-logic-uninstall-procedure) the plugin (if it's [uninstallable](#the-difference-between-install-and-import))
    - Arguments:
        - parameters:
            - planetDotName: the [planetDotName](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) of the planet to **logic uninstall**

- **conf**: opens the [global configuration file](#the-global-configuration) using macos "open" command
- **build**: creates/updates the **lpi.byml** file at the root of the application, based on the current planets found in the application.
    - Arguments:
        - flags:
            - n: if set, will only create the file if it doesn't exist already
- **reimport**: launch the **import** command for every planet found in the app.







The bernoni problem: what happens in case of conflict?
--------------
2020-12-22 -> 2021-01-11

Since we are handling version numbers, some conflict problem can occur.

Let me first expose the problem, and then explain how our plugin approaches the problem.

Imagine 4 plugins: P1, P2, PA and PB, and here their dependency graph:

- P1:
    - depends on: PA and PB

- PA:
    - depends on: P2 version 1.1.0

- PB:
    - depends on: P2 version 4.2.0

As you can see both plugins PA and PB depends on the P2 plugin, but with a different version number.

The problem is that when you call our plugin to import P1, since it's not really feasible to have both P2 versions in
the same app, we will have to choose what we want to do.

When this happens, we use modes to solve the problem.
We have two modes:

- manual
- auto


In **manual** mode, we prompt the user to decide which version he/she wants.
From experience, the manual mode get cumbersome for the user really quickly, as a typical installation might ask many bernoni questions to the user, which is annoying. But at least you've
total control over what's installed if you want to.

In **auto** mode, we always favor the version with the highest number.
So, in the example above, that would be P2 in version 4.2.0.




The **lpi-deps.byml** file
-----------
2020-12-04 -> 2021-01-11

Our system doesn't depend on a third service, such as a database, to resolve dependencies. Instead, dependencies are
declared by each planet, via a dependency file: **lpi-deps.byml**.

This takes the form of a **lpi-deps.byml** file to place at the root of your planet, and which looks like this:

```yaml
1.1.0:
    - Ling:Planet1:1.5.0
    - Ling:Planet2:1.1.0
1.2.0:
    - Ling:Planet1:1.5.0
    - Ling:Planet2:1.1.0

```

You get the idea. Each version of the planet is listed, along with its dependencies. Each dependency is a string, where
the colon symbol (:) is used as a separator between the [planet dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) and the [version expression](#version-expression).






The import algorithm
--------------
2020-12-22 -> 2021-01-11

In this section, I try to explain how our **import** algorithm works. 
A similar algorithm is also used by our **install** process.


At the heart of our algorithm is the idea that we want to be as atomic as possible, so that the user doesn't end up with half of the planets
imported, and an error message in the console with the other half not imported.

From there, our algorithm is divided in three steps:

- creating the **virtual bin**
- importing to the **build dir**
- copying to the target application


The last step, copying to the target application, is only executed if no error occurred during the previous two steps.
So if something fails during the first two steps, your application hasn't been touched yet, you're safe.
Plus, the third step is just copying files, so it's likely to be successful.


### Creating the virtual bin

Creating the **virtual bin** is the most challenging step, from a neuron burning's perspective.
The **virtual bin** is basically the final list of planets we wish to import, once all dependencies are resolved (recursively), 
and all [bernoni conflicts](#the-bernoni-problem-what-happens-in-case-of-conflict) solved.

We start by defining a **wishlist**, which represents what the user wants to install.
The **wishlist** is either a single **planetDotName:versionExpression** item, or a list of such items in case we use a [lpi.byml file](#the-lpibyml-file).

The important thing is that the **wishlist**, being defined by the user, always prevails when we have conflicts that occur.

So, armed with that wishlist, we create and resolve the **virtual bin**, I'll spare you the details, focusing on the general overview of the algo.


### Importing to the build dir

So at this point, we know exactly which planets and versions to install.

However, importing some of those planets might cause errors, for instance if the planet to import can't be found in the web.

So, again with respect to our atomic operation idea, we create a **build dir** which is a temporary directory in which we import every planet listed in the **virtual bin**.

The idea is that if we succeed to import all planets without errors, then what's left to do is just to copy those planets to the target application.

This step of importing planet is as straightforward as it sounds like.

The only thing we pay attention to is whether there were errors during the process.

If so, we stop the process and prompt the user, giving him/her the option to continue despite the errors, or to stop to fix the errors manually.


### Copying to the target application

This is about copying files from a directory to another.

However, since we are importing planets, we actually execute the [import procedure](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#the-import-procedure),
which is also just about copying files.




Related
============
2020-12-04

If your prefer, you can use the [uni tool](https://github.com/lingtalfi/universe-naive-importer), which doesn't care
about version numbers (it just imports the latest version every time), but the cli is more complex (too many commands),
and maybe not as cool as ours (because we have the **lpi.byml** file and **uni** doesn't).

