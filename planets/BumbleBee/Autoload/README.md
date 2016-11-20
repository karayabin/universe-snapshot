Butineur Autoloader
=========================
2015-10-05



This is a simple [BSR-0] (https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md)
autoloader for any php project.


How to use?
----------------


First, assuming that there is yet no autoloader in your application, 
we have to manually include the classes files for the Butineur autoloader.<br>
This should be done once at the beginning of your application's life (in a file like init.php for instance)


```php

use BumbleBee\Autoload\ButineurAutoloader;

// a good place for those lines would be the init script of your application
require_once __DIR__ . '/classes/BeeAutoloader.php';
require_once __DIR__ . '/classes/ButineurAutoloader.php';
```


Next, we need to tell where our classes will reside


```php
ButineurAutoLoader::getInst()
    ->addLocation(__DIR__ . "/modules")
    // ->addLocation(__DIR__ . "/myclasses") // we could use multiple directories if needed 
    ->start();
```

That's it!
Now you can use any "BSR-0" classes that you want in your application.

For instance, if you want to use a class named Batman/Weapons/Batarang.php,
just put the file in one of your location (if we take the example above, this would be **\_\_DIR\_\_ . "/modules/Batman/Weapons/Batarang.php"**).<br>
Then in your code, do this:


```php
use Batman\Weapons\Batarang;

$o = new Batarang(); 
```

So that's the power of BSR-0 convention combined with the ButineurAutoloader: any classes that you put in your location directories becomes available to your code
in a matter of **two lines of code!**.



For another concrete example, please look in the [BSR-0 convention file] (https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md).
