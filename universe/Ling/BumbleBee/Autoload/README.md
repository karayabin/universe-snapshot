Butineur Autoloader
=========================
2015-10-05



This is a simple [BSR-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) autoloader for any php project.



Summary
-----------
- [What's an autoloader?](#whats-an-autoloader)
- [How to use?](#how-to-use)
    - [Basic example](#basic-example)
    - [Multiple directories](#multiple-directories)
    - [Prefix](#prefix)




What's an autoloader?
-------------------

You'll find the definition of an autoloader on the [autoloader page from the php site](http://php.net/manual/en/language.oop5.autoload.php).




How to use?
----------------



### Basic example

When you use the Butineur autoloader, each component of the (fully-qualified) class name must represent a directory on the filesystem,
except for the last component which is the (short) name of the class itself.


What it means is that if your fully-qualified class name is this:

```txt
MyCompany\Math\ArithmeticUtils
```

Then by default the file containing this class must be the following:

```txt
/$root/MyCompany/Math/ArithmeticUtils.php
```

Note the **$root** directory.

The Butineur autoloader will search only in the **$root** directory(ies) that you have registered with the **addLocation** method.

So for instance if I write this php code:


```php
ButineurAutoLoader::getInst()
    ->addLocation("/path/to/class")
    ->start(); // the start method registers the autoloading function to php
```


Then we've just define the **$root** directory with the value of **/path/to/class**, and so now if we call the class like this:

```php
use MyCompany\Math\ArithmeticUtils;
ArithmeticUtils::add( 2, 3); // 5
```

Then the autoloader will search the ArithmeticUtils class here:

- /path/to/class/MyCompany/Math/ArithmeticUtils.php


And by the way, the source code of the ArithmeticUtils class would look like this:

```php
<?php

namespace MyCompany\Math;

class ArithmeticUtils {
    public static function add (int $number1, int $number2){
        return $number1 + $number2;
    }
}


```





Note: don't forget to call the **start** method to initialize the autoloader.






### Multiple directories

We can also add other **$root** directories if we want, and we can even register them after the call to the **start** method.

So for instance the following php code:

```php
ButineurAutoLoader::getInst()
    ->addLocation("/path/to/class")
    ->addLocation("/path/to/modules")
    ->start(); // the start method register the autoloading function to php

ButineurAutoLoader::getInst()->addLocation("/path/to/plugins");
```


Will register three root directories, or if you prefer three locations for the Butineur autoloader to search.





So now if I call my ArithmeticUtils class from the previous section, like so:

```php
use MyCompany\Math\ArithmeticUtils;
ArithmeticUtils::add( 2, 3); // 5
```

The autoloader will look in all three locations and return the first class that match:

- /path/to/class/MyCompany/Math/ArithmeticUtils.php
- /path/to/modules/MyCompany/Math/ArithmeticUtils.php
- /path/to/plugins/MyCompany/Math/ArithmeticUtils.php


You get the idea.



### Prefix

Another cool thing that the Butineur autoloader let us do is change the prefix for a given location (aka **root** directory).

The prefix is basically the first component of the fully-qualified class name, and its particularity is that it doesn't have a filesystem representation: it's just a virtual component.

So for instance if you define a **root** directory with the "Controller" prefix, like this for instance:

```php
ButineurAutoLoader::getInst()
    ->addLocation("/path/to/controller", "Controller") // notice the "Controller" prefix (second argument) 
    ->start();
```

Then you need to define your class like this (for instance):

```php
<?php

namespace Controller\MyCompany\Test;

class DemoController {

    public static function add (int $number1, int $number2){
        return $number1 + $number2;
    }
}

```

Notice that the first component of the namespace is still "Controller".

But then the Butineur autoloader will look in the following directory:

- /path/to/controller/MyCompany/Test/DemoController.php

And not:

- /path/to/controller/Controller/MyCompany/Test/DemoController.php


And to use your class:


```php
use Controller\MyCompany\Test\DemoController;
DemoController::add( 2, 3); // 5
```



That's it.

Hope this helps.








