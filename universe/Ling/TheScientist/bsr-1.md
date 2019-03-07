BSR-1
===============
2019-03-06


**BSR-1** is the php class organisation system for the [universe framework](https://github.com/karayabin/universe-snapshot).

The goal is that users implementing **BSR-1** benefit a simple [autoloading](http://php.net/manual/en/language.oop5.autoload.php) mechanism
provided by tools such as the [BumbleBee autoloader](https://github.com/lingtalfi/BumbleBee).





TLDR
-------

Class **MyGalaxy\MyPlanet\MyClass** will reside in **/my_app/universe/MyGalaxy/MyPlanet/MyClass.php**. 
One must choose a galaxy name and a planet name.

A galaxy name always starts with a capital letter!




BSR-1 extends BSR-0
-----------------

**BSR-1** is an extension of [BSR-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md)
So basically, **BSR-1** is like **BSR-0**, except that the first component of a namespace is called the galaxy,
and the second component is the planet name.


So for instance in the following class name: **Ling\Bat\FileSystemTool**,
the galaxy is **Ling**, and the planet name is **Bat**.



A galaxy name always starts with a capital letter!



Implementation
--------------
Implementation of the **BSR-1** is a multiple steps process.


### Step 1: Creating the planet


We first need to choose a planet namespace.

The planet namespace will be a logical namespace under which all our classes reside.


The planet namespace is composed of a galaxy name and a planet name separated by a backslash (\):

```txt
planet_namespace = <galaxy_name> <\> <planet_name>  
```

The galaxy name is the logical namespace for all our planets.

For instance, **Ling\Bat** is the planet namespace for the planet **Bat** from galaxy **Ling**.


Once we have chosen a planet namespace, we create the corresponding **planet directory**, which contains all our files.

The **planet directory** and all planet directories in general (including planets created by other persons) reside in a **universe root directory** that we can place anywhere (usually in an **universe** 
directory at the root of our application).


So for instance, for the **Ling\Bat** planet, the planet directory could be:

```txt
/my_app/universe/Ling/Bat
```

With **/my_app/universe** being the **universe root directory**.

Note: the backslashes of the planet namespace are replaced with forward slashes (/) (or whatever directory separator) to create the corresponding filesystem portion.



### Step2: Creating the classes

So now our planet **Ling\Bat** is created and resides in **/my_app/universe/Ling/Bat** on the filesystem.

The next step is to create the classes.


Choose a class name (I will pick **MyClass** for the rest of this example), and append it to your planet namespace to have your fully qualified class name.


So **Ling\Bat\MyClass** is my fully qualified class name.

Actually, **MyClass** is often referred to as the short class name, and **Ling\Bat\MyClass** as the class name, so pay attention to the context when reading those terms.

The **Ling\Bat\MyClass** php file intuitively resides in **/my_app/universe/Ling/Bat/MyClass.php** and contains a code similar to this:

```php
<?php


namespace Ling\Bat;

class MyClass {
    
}
``` 


### Step3: Calling the classes


Now our **Ling\Bat\MyClass** class from planet **Ling\Bat** is ready to be used.

Now we need to invoke a BSR-1 compliant autoloader, such as the [BumbleBee autoloader](https://github.com/lingtalfi/BumbleBee), and then 
we should be able to call our class like this:


```php
<?php 


use Ling\Bat\MyClass;

// invoke BSR-1 autoloader...


$o = new MyClass();


```









 









 