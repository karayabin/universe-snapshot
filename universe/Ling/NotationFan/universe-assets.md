Universe assets
================
2019-09-23



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



