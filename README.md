Universe
==============
2015-10-14 --> 2019-01-16





Welcome to the universe.


The **universe** is a php library that you can use for your projects.


THe **universe** is composed of **planets**, each **planet** representing a "package" containing some functionality.

For instance, the **BabyYaml** planet allows you to parse the baby yaml files (see more here: https://github.com/karayabin/universe-snapshot/tree/master/planets/BabyYaml).
You can find all the planets here: [https://github.com/karayabin/universe-snapshot](https://github.com/karayabin/universe-snapshot).

You can install one planet or many, it's up to you.


To install a planet, the preferred method is to use the [uni tool](https://github.com/lingtalfi/universe-naive-importer), which is a command line tool to ease the management of your planets.

With the **uni tool**, to import a planet is a one liner:

```bash
uni import BabyYaml
```

Note that the **uni tool** also takes care of dependencies that planets might have (some planets use other planets) recursively.


If you don't want to use the **uni tool**, you can always do the imports manually.




Structure
--------------
Since 2019, the modern way of using the universe is to create the following structure:


```txt
- /your_app/
----- class/
----- universe/
--------- bigbang.php		
--------- BumbleBee
--------- ...YourPlanet
```


Note that with the **uni tool** can create this structure (except for the **class** directory which is optional) for you with the following command:

```bash
cd /your_app
uni init
```



The **class** directory contains your app's classes.
The **universe** directory contains the planets that your app uses. From your app's point of view, those are external dependencies.


The **universe/bigbang.php** script defines the BumbleBee autoloader, which is the autoloader of the universe. It will look into the **class** dir and the **universe** dir
for classes which are named after the [bsr-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) convention.


Note that modifying the autoloader's directories is trivial (just open the **universe/bigbang.php** file and you should be able to understand without further indications. You can even leverage the BumbleBee autoloader to search into other directories by adding a line...).

The **universe/BumbleBee** is just a planet containing the autoloader class.


Setup
--------
Once the structure is in place, the last thing required to use the universe framework is to include the **universe/bigbang.php** script from your app's entry point(s).
For instance, if your main entry point is the **www/index.php** file, you would add a line like this towards the beginning of that file:

```php
require_once __DIR__ . "/../universe/bigbang.php"; // activate universe
```





Importing a planet manually
----------------------------
Once the setup is done, you can add a planet by downloading it from the [karayabin repository](https://github.com/karayabin/universe-snapshot),
then simply paste it into the universe directory. That's it!

