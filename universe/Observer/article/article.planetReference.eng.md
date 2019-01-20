Planet
==============
2015-10-27


This document is a work in progress.



This document is a non official documentation about planets.
It's non official because nobody owns the universe, and therefore nobody has the power to create an official documentation about planets.


I will try to have the approach of the php developer: pragmatic and straight to the point.





So what's a planet?
----------------------

A planet is a php package.

A universe contains planets.
THE multi-verse contains universes.
There is nothing bigger than THE multi-verse.



How do I use a planet?
---------------------------

- [Download it](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md#download-it)
- [Download the dependencies](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md#download-the-dependencies)
- [Install it](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md#install-it)






### Download it

Download the git repository of the planet of your choice.


### Download the dependencies


Planets might have dependencies.
Dependencies should/must be installed to, recursively (that's the painful part with the current system, unless you [download all planets at once](lingtalfi's universe snapshots here](https://github.com/karayabin/universe-snapshot)).
Dependencies, if any, are listed in the package-info.yml file of the planet, or alternatively in the README.md document 
of the planet on github.com.

As for now, there is no tool that automatically install all planets dependencies for you;
but don't despair, I heard rumors that a tool called Explorer will sooner or later do just that.

When you install a dependency manually, beware of the version number, which by default uses [semver](http://semver.org/) notation, unless otherwise
specified in the package-info.yml file (versionNamingSystem property).
Each version of a planet is accessible via the release tab (github.com).
    
    

### Install it

How you install a planet depends on its type.
The default type is a [BSR-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) compliant php code, since most planets are of this type.
If the type is not the default type, then it should be defined in the package-info.yml file, under the type property.

To install a BSR-0 package, please refer to the [instructions below](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md#install-bsr-0-packages)






Install BSR-0 packages
-------------------------

- Unzip the downloaded tarball
- Create the planets directory in your application if it doesn't exist yet, and put the unzipped planet in it, with its correct name (remove github's "-master" suffix if there is one).
- Now follow the steps of the [standard application workflow](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md#standard-application-workflow).
- If there is a www folder inside the planet, map it to your application web directory (the web server's root dir of your application)
- That's it

 



BSR-0 Workflows
--------------------

If you are interested in, here are differents workflows.

### THE FASTEST BSR-0 workflow (that I found so far)

- [Download all planets at once](https://github.com/karayabin/universe-snapshot) 
- Implement the [portable autoloader technique](https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md).
- Create a snippet with your IDE, so that when you type "bb" it writes 'require_once "bigbang.php"'.

I use it all the time for quick testing: just open any php file, and type bb, done (planets of your local machine's universe 
are available, plus you have a and az functions right away).
  
  

### standard application workflow 

This is what I use for my applications:

- create the planets folder at the root of your application's directory
- import the planets that you want, but at least the [BumbleBee planet](https://github.com/lingtalfi/BumbleBee)
- open the init file of your application, and paste/adapt the following code in it: 


```php

use BumbleBee\Autoload\ButineurAutoloader;


//------------------------------------------------------------------------------/
// INCLUDE FUNCTIONS AND AUTOLOADER CLASS
//------------------------------------------------------------------------------/
require_once __DIR__ . "/functions/az.php"; // not required, but huge time saver, you can find them in https://github.com/lingtalfi/TheScientist/blob/master/_bb_autoload/autoload.php (in the "BONUS FUNCTIONS" section)
require_once __DIR__ . "/vendor/autoload.php"; // if you use composer
require_once __DIR__ . '/planets/BumbleBee/Autoload/BeeAutoloader.php'; // you will need to download the BumbleBee planet 
require_once __DIR__ . '/planets/BumbleBee/Autoload/ButineurAutoloader.php';

//------------------------------------------------------------------------------/
// INIT THE AUTOLOADER
//------------------------------------------------------------------------------/
ButineurAutoloader::getInst()
    ->addLocation(__DIR__ . "/planets")
    ->addLocation(__DIR__ . "/modules") // create your application BSR-0 modules (classes) and put them here
    ->start();

```

- good job, you are done with the BSR-0 setup





Related
----------

Download all planets at once using [lingtalfi's universe snapshots here](https://github.com/karayabin/universe-snapshot)



















