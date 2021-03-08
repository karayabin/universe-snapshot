Universe assets
================
2019-09-23 -> 2021-02-26



This document describe one way of organizing assets in the planets of the [universe](https://github.com/karayabin/universe-snapshot).

This is the recommended way since 2019-09-23.

Planet authors are expected to be aware of this recommendation, and try to implement it whenever they can (sometimes it's not always possible
if they are using other naming conventions).




How does this work?
----------------


In this document, we are talking about web assets (css files, js files).


In the **universe framework**, some planets use web assets.

Since the arrival of the [uni tool](https://github.com/lingtalfi/universe-naive-importer) planet,
planet authors can easily install files in the target application upon the import command (which is the base command of the uni tool to import
a planet).

Therefore, the idea behind the **universe assets** is that all planets follow a simple naming convention, so that the web assets
are directly copied to the web folder when the planet is imported.



So, what are those naming conventions?


- **www** should be the name of the web root directory, and should reside at the root of the application directory.


Then, we should have the following structure for a planet named **MyPlanet** from galaxy **MyGalaxy**:


```txt 
- $application_root_dir/
----- www/
--------- libs/
------------- universe/
----------------- MyGalaxy/
--------------------- MyPlanet/
------------------------- ... the web assets here
------------------------- ... ?style.css
------------------------- ... ?my-car.js

```



The UniverseAssetDependencies trick
-----------------
2019-09-23 -> 2021-02-26



This is another way for me to declare dependencies.

Let's say I'm the author of the **Ling.MyBigPlanet** planet, which depends on the **Ling.JMyAssetPlanet** planet.

Using the **universe asset dependencies** trick, I will create the following structure:


```txt

- universe                                  # this is the universe directory
----- Ling/                                 # this is the galaxy for my planet
--------- MyBigPlanet/                      # this is my planet
--------- UniverseAssetDependencies/        # this is the directory where I define my "universe assets" dependencies
------------- Ling/                         # this is the galaxy name for one planet I depend on
----------------- JMyAssetPlanet/           # this is the planet name of a planet I depend on
----------------- ...
------------- ...

```


And that's it.
Then, when I publish a planet, my publishing tools (such as the [PushCommand](https://github.com/lingtalfi/LingTalfi/blob/master/Kaos/Command/PushCommand.php))
will parse the **UniverseAssetDependencies** directory if it exists, and automatically write the corresponding dependencies in the [dependencies.byml](https://github.com/lingtalfi/Uni2#dependenciesbyml) file.


I found myself in the need for that feature when my tools cannot guess the dependencies of the planet directly. So I help them by defining them manually
using this trick.
The cases when my tools cannot guess the dependencies are the following so far:


- if my planet depends on a planets with no service, such as all my "J" planets for instance, which are basically just containers for a javascript library.
        Those don't provide any service, and so there is no php code for my tools to parse, so they just don't know about this kind of dependency
  
- sometimes when I write a light service configuration, I reference a class that's outside my planet, thereby creating a dependency to that planet.
    My tools don't read the service configuration files, and therefore miss the dependency. This happens in the [Light_Kit](https://github.com/lingtalfi/Light_Kit) service conf for instance.
  
- when writing [kit pages](https://github.com/lingtalfi/Light_Kit#babyyaml-page-configuration-files), it's likely that I call widgets from other planets.
    When that happens, my tools don't know about it because they don't read those kit pages (yet), and so I use this trick in this case too to define
    the dependencies manually.
