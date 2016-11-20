UniqueNameGenerator
========================
2016-01-07



Tool to generate unique names.



UniqueNameGenerator can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).



Use cases
-------------

So far, the following use cases have been encountered:

- generate a unique filesystem name, to avoid file overwriting



Example
-----------

```php
<?php

use UniqueNameGenerator\Generator\SimpleFileSystemUniqueNameGenerator;

require_once "bigbang.php";


$f = "/tmp/newFile.txt";

/**
* assuming /tmp/newFile.txt exists and /tmp/newFile-1.txt doesn't exist yet
*/
a(SimpleFileSystemUniqueNameGenerator::create()->generate($f));  // /tmp/newFile-1.txt    
```



The SimpleFileSystemUniqueNameGenerator class 
----------------


Use this to generate names like this:

- fileName.jpg
- fileName - copy.jpg
- fileName - copy 2.jpg
- fileName - copy 3.jpg


or like this (default):

- fileName.jpg
- fileName-2.jpg
- fileName-3.jpg



Use the setGenerateAffixCb to generate the variable part, given an auto-incremented number.
For instance to emulate the first of the above examples, we can do this: 

```php
<?php

use UniqueNameGenerator\Generator\SimpleFileSystemUniqueNameGenerator;

require_once "bigbang.php";


$f = "/tmp/newFile.txt";


a(SimpleFileSystemUniqueNameGenerator::create()->setGenerateAffixCb(function ($n) { // n is auto-incremented and starts with 1
    if ($n === 1) {
        return ' - copy';
    }
    return ' - copy ' . $n;
})->generate($f));
```





Dependencies
------------------

- [lingtalfi/Bat 1.27](https://github.com/lingtalfi/Bat)


History Log
------------------
    
- 1.0.0 -- 2016-01-07

    - initial commit
    
    