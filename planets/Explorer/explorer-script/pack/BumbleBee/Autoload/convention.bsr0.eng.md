BSR-0
=============
2015-10-05



Bsr0 is a convention of naming php classes, it eases [autoloading]( http://php.net/manual/en/language.oop5.autoload.php ) and 
helps organizing classes in your project.



It is inspired by PSR-0 notation, but is simpler.



Basically, it's like [PSR-0] ( https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md ), 
except that the underscore has no special meaning.
This means that your namespace has to match the tree structure exactly. Period.


The following section illustrates a complete example of how to use the BSR-0 autoloader in your application.



Example
-------------

Imagine we want to create a class called BatmanTranslator.php.
And we decide to put in a Batman57/Translator directory,
and that all our classes will be in a directory named classes.



The directory structure will look like this:

    - classes/                  # this is the top directory containing all classes
    ----- Batman57/
    --------- Translator/
    ------------- BatmanTranslator.php      # this is the class you want to create
    ----- MysqlTabular/
    --------- MysqlTabularAssocUtil         # this is another class that existed before we started


Here, I chose to put the BatmanTranslator.php in the Batman57/Translator sub-directory.<br>
We can create any sub-directory structure that we need, the only rule is that there must be 
**at least one subdirectory**  (you cannot put your class at the root of the classes' top directory).


Then inside your class, you need to declare a namespace at the first lines.
Your class should look like this:
 

```php 
<?php
 
// This is the BSR-0 convention right there
namespace Batman57\Translator; 
 
class BatmanTranslator {
    // blabla
} 
    
```
 
 
As you can see, the namespace is composed of the sub-directories of the tree structure.<br>
**That's the BSR-0 convention's main idea**.<br>
If you don't know much about namespaces in php, please note that the separator is the backslash (\\).

The className (BatmanTranslator) is the name of your file, without the .php extension.
If you understand that, you understand BSR-0.
  
  

Use BSR-0 in your application
----------

Now what we want to do is be able to call our BatmanTranslator class (or any class inside the classes directory) from our application.<br> 
The final code that we want looks like this:
 
```php 
<?php 
// ... 
 

// Note: most IDE will generate this line for you as you type the other line below...
use Batman57\BatmanTranslator\BatmanTranslator;


// ...therefore in most cases you just need to type this line (and this IDE mechanism is a huge time saver by the way)
$translator = new BatmanTranslator();
```
 
 
 
In the above example, we've used the "use" operator which tells php that BatmanTranslator class is actually 
an alias for Batman57\BatmanTranslator\BatmanTranslator class.

Therefore, when we type 

```php
$o = new BatmanTranslator();
```

Php will resolve the alias and interpret it as:


```php
$o = new Batman57\BatmanTranslator\BatmanTranslator();
```


That's good, but not enough yet.
The problem is that php doesn't know where the file for the class Batman57\BatmanTranslator\BatmanTranslator is.<br>

That's where the autoloader kicks in.

The autoloader maps a className like Batman57\BatmanTranslator\BatmanTranslator to a real 
file path like /path/to/classes/Batman57/BatmanTranslator/BatmanTranslator.php, 
using the logic that we tell him to.

In the case of BSR-0, the mapping logic is quite straight forward, we basically need to append 
the className (Batman57\BatmanTranslator\BatmanTranslator)
to the classes directory (/path/to/classes), 
then replace backslash (\\) with forward slashes (/), and eventually add the .php extension at the end
and we've got our full class file path.

The good news is that this mapping logic is already done for us in the ButineurAutoloader.<br>
So if we call the ButineurAutoloader, then we'll be able to call our classes with the method described earlier.<br>
Here is how we would call the ButineurAutoloader from our app (at the very beginning of our app actually):



```php
// we first need to include the autoloader class manually, since there is no autoloader class loaded yet
require_once __DIR__ . '/some/where/BeeAutoloader.php';
require_once __DIR__ . '/some/where/ButineurAutoloader.php';

// now that our autoloader class is loaded (known by php), we can use it to automatically import all other classes
ButineurAutoLoader::getInst()
    ->addLocation(__DIR__ . "/classes")  // now, we can call any class from the classes directory
    // ->addLocation(__DIR__ . "/modules") // Note: ButineurAutoloader allows us to use multiple root directories (it's sometimes useful) 
    ->start();
```


   
  
    
In this case, I used the ButineurAutoLoader autoloader, which is a BSR-0 autoloader.

Now on the internet you might find other autoloaders.
 
You can use them if you want, but ensure that they are BSR-0 compatible.<br>
You need to understand that BSR-0 is a subset of PSR-0, which means that you can use a PSR-0 autoloader to load any "BSR-0" classes,
but a BSR-0 autoloder will not be able to load all "PSR-0" classes.
 
The reason why I use a BSR-0 autoloader is that it's straight to the point, whereas 
PSR-0 autoloader tries to handle old (and obsolete) class naming schemes that I was sure I would never use.

Therefore BSR-0 autoloader's code is more concise and very focused on one thing, it tends to be simpler.<br>
For instance, if you have the ButineurAutoloader ready in your application, the only thing you need to import and start using a BSR-0 package 
is to drop the package in one of your locations, just like that.









 
 
 
 












