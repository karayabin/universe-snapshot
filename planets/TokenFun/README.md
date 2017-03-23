TokenFun
=================
2016-01-02




Tools for playing with php tokens.



TokenFun can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).





TokenFinder
-------------------

The TokenFinder reads a token stream (as returned by the [token_get_all](http://php.net/manual/en/function.token-get-all.php) php function)
and parse it linearly, from left to right, finding sets that match the conditions defined by the developer.

It is used to find typical patterns, like a method declaration in a class file for instance.

A few classes have already been implemented, and it's fairly simple to create your own classes.
This package comes with classes to find:

-  array reference
-  class name
-  function
-  method
-  namespace
-  new object
-  use statements
-  variable assignments



TokenFinderTool
------------------

It leverages the power of the TokenFinder to provide one liner methods for common tasks 
like finding all the "use statements" in a given code or folder.



Example:

```php
<?php


use TokenFun\TokenFinder\Tool\TokenFinderTool;

require_once "bigbang.php";



$modulesDir = __DIR__ . "/../planets";



$f = $modulesDir . "/Bat/FileSystemTool.php";
$tokens = token_get_all(file_get_contents($f));
a(TokenFinderTool::getUseDependencies($tokens));



$dir = $modulesDir . "/Bat";
a(TokenFinderTool::getUseDependenciesByFolder($dir));
```


The result of the above example would look like this:

```php
array (size=1)
  0 => string 'CopyDir\AuthorCopyDirUtil' (length=25)

array (size=9)
  0 => string 'Bat\CaseTool' (length=12)
  1 => string 'Bat\FileSystemTool' (length=18)
  2 => string 'Bat\StringTool' (length=14)
  3 => string 'Bat\ValidationTool' (length=18)
  4 => string 'CopyDir\AuthorCopyDirUtil' (length=25)
  5 => string 'PhpBeast\AuthorTestAggregator' (length=29)
  6 => string 'PhpBeast\PrettyTestInterpreter' (length=30)
  7 => string 'PhpBeast\Tool\ComparisonErrorTableTool' (length=38)
  8 => string 'Tiphaine\TiphaineTool' (length=21)

```



Some methods of the TokenFinderTool include the following.




### getInterfaces

```php
array    getInterfaces ( array:tokens, bool:fullName=true )
```

Return the names of the interfaces if any.

When fullName is true, it looks for a use statement matching
each interface class name, and returns it if it exists.
Otherwise, it just prepends the namespace (if no use statement matched the interface class name).



### getNamespace

```php
false|string    getNamespace ( array:tokens )
```

Return the namespace found in the given tokens, or false if no namespace was found.





### getParentClassName

```php
false|string    getParentClassName ( array:tokens, bool:fullName=true )
```

Return the parent class name if any, or false otherwise.

When fullName is true, it looks for a use statement matching
the parent class name, and returns it if it exists.
Otherwise, it just prepends the namespace (if no use statement matched the parent class name).







### getUseDependencies

```php
array    getUseDependencies ( array:tokens, bool:sort=true )
```

Return the dependencies imported via the php [use statement](http://php.net/manual/en/language.namespaces.importing.php) as an array.


### getUseDependencies

```php
array    getUseDependenciesByFolder ( str:dir )
```

Return the dependencies imported via the php [use statement](http://php.net/manual/en/language.namespaces.importing.php)
found in the php files under the given directory.





Dependencies
------------------

- [lingtalfi/Bat 1.23](https://github.com/lingtalfi/Bat)
- [lingtalfi/DirScanner 1.0.0](https://github.com/lingtalfi/DirScanner)




History Log
------------------
    
- 1.1.0 -- 2017-03-23

    - add TokenFinderTool::getInterfaces and TokenFinderTool::getParentClassName methods
    
- 1.0.0 -- 2016-01-02

    - initial commit
    
    



