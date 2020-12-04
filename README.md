Universe
==============
2015-10-14 --> 2020-12-04





Welcome to the **universe** framework.


The **universe** is essentially a php library that you can use in your php projects.


THe **universe** is composed of **planets**, each **planet** representing a "package" containing some functionality.

For instance, the **[BabyYaml](https://github.com/karayabin/universe-snapshot/tree/master/universe/BabyYaml)** planet allows you to parse baby yaml files.


See the [list of all the planets here](https://github.com/karayabin/universe-snapshot/tree/master/universe).




Summary
-------
2015-10-14 -> 2020-12-04


- [How to install?](#how-to-install)
- [How to use?](#how-to-use)
- [Big bang: the beginning of the universe](#big-bang-the-beginning-of-the-universe)
    - [The class directory](#the-class-directory)
    - [The a and az functions](#the-a-and-az-functions)
- [The planet identifier](#the-planet-identifier)
- [The planet dot name](#the-planet-dot-name)
- [The compressed planet name](#the-compressed-planet-name)
- [Uni tool: a manager to install planets](#uni-tool-a-manager-to-install-planets)
- [Related](#related)





How to install?
---------------
2015-10-14


If you're new to the universe, the simplest way of testing it is probably to download all the planets at once into your application.

1. Create a directory on your machine. I will use **/path/to/my_app**.
2. Download this repository somewhere on your computer, unzip it, and go inside its main directory. You should find a directory named **universe** (which contains all the planets).
3. Copy the **universe** directory (from step 2) into your app (so now **/path/to/my_app/universe** should exist)
4. That's it for the installation! You can now use the universe in your application. See how in the next section.


How to use?
-----------
2015-10-14


Now that you've successfully installed the universe in your application, you can start using its planets.
In the section below, I will demonstrate how to use my favorite planet: [Bat](https://github.com/karayabin/universe-snapshot/tree/master/universe/Bat).


- Create an **app.php** file at the root of your application.

So far, the application structure should look like this:

```txt
- /path/to/my_app/          # this is the root directory of the application
----- app.php
----- universe/
--------- ...all universe files...
```


- Now inside app.php, paste the following code:

```php
<?php


use Bat\ConvertTool;

require_once __DIR__ . "/universe/bigbang.php"; // activate universe

// converting 2 megabytes in octets
az(ConvertTool::convertHumanSizeToBytes("2M"));


```

As you can see, all we need to do to use the universe is include the **bigbang.php** script.

More details about the **bigbang.php** script and the hopefully mysterious **az** function in the
[Big bang: the beginning of the universe](#big-bang-the-beginning-of-the-universe) section, later in this document.



- Save the **app.php** file
- Now to test this application, open a terminal and type the following command:

```bash
php -f /path/to/my_app/app.php
```

The following result should appear:

```bash
int(2097152)
```


Congrats! You now know how to leverage the power of the universe in your applications.

The next step is to explore the [universe's planets](https://github.com/karayabin/universe-snapshot/tree/master/universe) and grab the ones useful for your project.




Big bang: the beginning of the universe
-----------------------------------------
2015-10-14


The universe started with a big bang...

...and so does the universe framework.

In order to use the universe's planets, one need to include the **bigbang.php** script.

This script will do the following:

- Prepare the autoloader for the universe
- Declare the "a" and "az" functions if they aren't defined already



The **autoloader** by default parses any ([bsr-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) compliant) classes from the following directories:

- universe
- class (if it exists)


To change this behaviour (add other directories to parse for instance), modify the **bigbang.php** script (not covered in this document, but should be fairly simple).


### The class directory
2015-10-14



The class directory contains application specific classes.

Consider the following structure:


```txt
- /path/to/my_app/                      # this is the root directory of the application
----- app.php                           # this is the entry point of this app
----- class/                            # this directory contains classes specific to your application
--------- Demo/
------------- ExampleClass.php
----- universe/                         # this directory contains the universe's planets
--------- ...all universe files...
```

- Create the file **class/Demo/ExampleClass.php** and put the following code in it:


```php
<?php


namespace Demo;


class ExampleClass
{
    public static function hello()
    {
        echo "hello";
    }
}
```




Now you can use the ExampleClass in your code.

- Open the **app.php** file and put the following code in it:

```php
<?php


use Demo\ExampleClass;

require_once __DIR__ . "/universe/bigbang.php"; // activate universe


ExampleClass::hello(); // will print "hello" to the output


```

- Now run your app by typing the following command in a terminal:


```bash
php -f /path/to/my_app/app.php
```

It should print hello.



### The a and az functions
2015-10-14



The **bigbang.php** script also provides two immensely useful debug functions: a and az.


- The a function dumps any argument passed to it (string, numbers, arrays, objects,...).

```php
a("coucou");  // prints string(6) "coucou" on the screen
```

- The az function is the same as the a function, but it exits the script afterward.

```php
az(["one", "two"]);

echo "three"; // this statement is never reached.
```

The output will look like this:

```txt
array(2) {
  [0] => string(3) "one"
  [1] => string(3) "two"
}

```




The planet identifier
--------------------------------------
2020-07-09


A possible way to organize planets is to use this convention:

- Galaxy/PlanetName


So for instance:

```txt
- /path/to/my_app/                      # this is the root directory of the application
----- universe/                         # this directory contains the universe's planets
--------- MyGalaxy/
------------- MyPlanet.php
```


If you do name your planets using this system, then you can use the **planet identifier**.

The **planet identifier** is the string identifying your planet in the universe, it looks like this:

- $GalaxyName/$PlanetName



The planet dot name
--------------------------------------
2020-12-04


To help developers, we provide the following term: **planet dot name**, which has the following format:

- $GalaxyName.$PlanetName


So for instance this is a planet dot name:

```txt
MyGalaxy.MyPlanet
```






The compressed planet name
--------------------------------------
2020-11-13 -> 2020-11-17


In order to help developers, we provide the **compressed planet name**, which can be useful to create class prefixes for instance, amongst other things.

The compressed planet name is basically the planet name, but with the underscores removed.

So for instance if the planet name is:

- MyPlanet_CityOne

Then the compressed planet name is:

- MyPlanetCityOne




Note: the **compressed planet name** is sometimes also referred as the [tight planet name](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md#tight-planet-name).





Uni tool: a manager to install planets
--------------------------------------
2015-10-14


In the [How to install?](#how-to-install) section, we've downloaded the whole universe into our app.

While this is a good idea when you just want to play with the universe, you might want to include only the planets that you need (for instance if you deploy your application in production
and want to save some disk space).

If this is the case, check out the [uni tool](https://github.com/lingtalfi/universe-naive-importer): a command line tool to import planets (and manage their dependencies) one by one.





Related
===========
2015-10-14


- [uni tool](https://github.com/lingtalfi/universe-naive-importer): a tool to import/manage the planets in your application
- [universe assets](https://github.com/lingtalfi/NotationFan/blob/master/universe-assets.md): a recommendation to organize the web assets in your planet
- [UniverseTools](https://github.com/lingtalfi/UniverseTools): some various tools to help with the universe dependencies and meta




