Universe snapshot
=====================
2016-01-02



What is this?
----------------

This is a compilation of lingtalfi's universe php classes.


Why would I need this?
----------------------------

[Lingtalfi's universe](https://github.com/lingtalfi/universe) has now expanded a little bit.
Rather than resolving the class dependencies manually, a better workflow is to download all the classes at once,
and then help yourself when needed.


How do I use it?
--------------------

There are many different ways to import the classes to your applications.
But if you don't have any idea, I suggest the following:

- Download the most recent version of the universe snapshot
- extract the zip 
- copy paste the folder named "planets" to your application
- go to your application init file, and add the following lines somewhere where it fits

```php
<?php

use BumbleBee\Autoload\ButineurAutoloader;


$planetsDir = __DIR__ . "/../planets"; // rename if you want (modules, classes, ...) 
require_once $planetsDir . '/BumbleBee/Autoload/BeeAutoloader.php';
require_once $planetsDir . '/BumbleBee/Autoload/ButineurAutoloader.php';


//------------------------------------------------------------------------------/
// INIT THE AUTOLOADER
//------------------------------------------------------------------------------/
ButineurAutoloader::getInst()
    ->addLocation($modulesDir)
    ->start();


//------------------------------------------------------------------------------/
// From now on you can use any BSR-0 class that resides in your planets (or modules...) directory
//------------------------------------------------------------------------------/
// ;)
```

And basically that's it, you can now use any classes from lingtalfi's universe from your application.


Don't forget a and az functions
------------------------------------

However, I would also suggest that you import the "a" and "az" debug functions, since they are used in a lot of 
examples from the lingtalfi universe classes documentation.

The "a" and "az" functions are found in different places, but here is the 
interesting excerpt from the [bee bash autoloader](https://github.com/lingtalfi/TheScientist/blob/master/convention.beeBashAutoloader.eng.md):

You can simply create an az.php file, put the following content inside, and include those in your application:


```php
// https://github.com/lingtalfi/TheScientist/blob/master/_bb_autoload/autoload.php
//------------------------------------------------------------------------------/
// BONUS FUNCTIONS, SO HANDFUL... (a huge time saver in the end)
//------------------------------------------------------------------------------/
if (!function_exists('a')) {
    function a()
    {
        foreach (func_get_args() as $arg) {
            ob_start();
            var_dump($arg);
            $output = ob_get_clean();
            if ('1' !== ini_get('xdebug.default_enable')) {
                $output = preg_replace("!\]\=\>\n(\s+)!m", "] => ", $output);
            }
            if ('cli' === PHP_SAPI) {
                echo $output;
            }
            else {
                echo '<pre>' . $output . '</pre>';
            }
        }
    }
    function az()
    {
        call_user_func_array('a', func_get_args());
        exit;
    }
}
```





