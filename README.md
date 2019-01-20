Universe
==============
2015-10-14 --> 2019-01-20





Welcome to the **universe** framework.


The **universe** is essentially a php library that you can use for your php projects.


THe **universe** is composed of **planets**, each **planet** representing a "package" containing some functionality.

For instance, the **[BabyYaml](https://github.com/karayabin/universe-snapshot/tree/master/planets/BabyYaml)** planet allows you to parse baby yaml files.


See the [list of all the planets here](https://github.com/karayabin/universe-snapshot/tree/master/universe).




Summary
-------
- How to install?
- How to use?
- Big bang: the beginning of the universe
    - The class directory
    - The a and az functions
- Uni tool: a manager to install planets



How to install?
---------------

If you're new to the universe, the simplest way of testing it is probably to download this repository into your application.

1. Create a directory on your machine. I will use **/path/to/my_app**.
2. Download this repository somewhere on your computer.
3. Copy the **universe** directory from step 2 into your app (so now **/path/to/my_app/universe** should exist)
4. That's it for the installation! You can now use the universe in your application. See how in the next section.


How to use?
-----------

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
az(ConvertTool::convertHumanSizeToBytes("2M")); // int(2097152)


```

As you can see, all we need to do to use the universe is include the **bigbang.php** script.

More details about the **bigbang.php** script and the hopefully mysterious **az** function in the
"Big bang: the beginning of the universe" section, later in this document.




- Now to test this application, open a terminal and type the following command:

```bash
php -f /path/to/my_app/app.php
```

The following result should appear:

```bash
int(2097152)
```


Congrats! You now know how to leverage the power of the universe in your applications.

The next step is to explore the universe's planets and grab the ones useful for your project.




Big bang: the beginning of the universe
-----------------------------------------

The universe started with a big bang...

...and so does the universe framework.

In order to use the universe's planets, one need to include the **bigbang.php** script.

This script will do the following:

- prepare the autoloader for the universe
- declare the "a" and "az" functions if they aren't defined already



The autoloader will allow you to call the planets of the universe.
In php, we use the "use" keyword followed by the class name that we want to include, like this:


```php
use Bat\ConvertTool;
```

After writing this line, we now can use the ConvertTool class.

Like this:

```php
echo ConvertTool::convertHumanSizeToBytes("2M"); // 2097152
```

More info about this on the [use keyword on the php documentation](http://php.net/manual/en/language.namespaces.importing.php).



### The class directory

We've just saw that the autoloader of the universe let you use classes inside the **universe** directory.

But what we've not seen yet is that it also parses the classes inside the **class** directory if you create it.


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

Notice the namespace: Demo. It basically maps the directory structure.
See the [bsr-0 convention](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) for more details
about the namespace.



Now you can use the ExampleClass in your code.

- open the **app.php** file and put the following code in it:

```php
<?php


use Demo\ExampleClass;

require_once __DIR__ . "/universe/bigbang.php"; // activate universe


ExampleClass::hello(); // will print "hello" to the output


```



So to recap the default autoloader (defined in the **bigbang.php** script) behaviour is to autoload classes in the following directories:

- universe
- class





### The a and az functions

The **bigbang.php** script also provides use with two debug functions: a and az.


- The a function dumps any argument passed to it (string, numbers, arrays, objects,...).

```php
a("coucou");  // pritns string(6) "coucou" on the screen
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




Uni tool: a manager to install planets
--------------------------------------

In the "How to install?" section, we have downloaded the whole universe into our app.

While this is a good idea when you just want to play with the universe, you might want to include only the planets your application needs in a production app (to save some disk space).

If this is the case, I wrote a tool to manage your planets, check out the [uni tool: manager of the universe's planets](https://github.com/lingtalfi/universe-naive-importer).