DirTransformer
=====================
2016-12-04


DirTransformer creates a modified copy of a given directory.




DirTransformer is part of the [universe](https://github.com/karayabin/universe-snapshot) framework.




Intent
------------


The **DirTransformer** can copy a source directory to a target directory, modifying files during the transfer.

This might be useful if you work with custom notations that need to be resolved later in time.


### Synopsis 1

I'm creating a documentation for a github project, using the markdown format, but I've noticed that I 
keep reorganizing the documentation files all the times. 
The problem is that every time I move a file, I have to change the files that links to it.

If only I could use abstract links, like <-this one-> for instance, and then when comes the moment to export the doc
I could press a button which would resolve those abstract links to concrete github links (using a mapping that I provide of course),
then I wouldn't have to worry about moving files around while I'm writing the documentation.

The DirTransformer can do that for me.




Design
---------------

The DirTransformer [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md)
contains two main objects:

- Scanner
- Transformer

Any number of Transformers (called transformer chain) can be attached to a Scanner.

The Scanner parses all the files in the **source directory**.

For each file, it parses the content C and passes it to the transformer chain.
 
Each Transformer is given the C content and outputs the new content, which is in turn passed to the next transformer in the chain, and so on...


When the last transformer returns the final content, the Scanner writes the final content to the corresponding file in the **destination directory**.



Examples
================



Using the RegexTransformer
----------------------------

Using the following code:

```php
<?php


use DirTransformer\Scanner\Scanner;
use DirTransformer\Transformer\RegexTransformer;

require "bigbang.php";


$srcDir = "/pathto/php/projects/nullos-admin/doc";
$dstDir = "/pathto/php/projects/nullos-admin/doc2";


$t = RegexTransformer::create()
    ->regex('!<-(.*)->!')  
    ->onMatch(function (array $matches) {
        return '[' . $matches[1] . ']';
    });
Scanner::create()
    ->allowedExtensions(['md'])
    // ->limit(1) // use this for debugging
    ->addTransformer($t)
    ->copy($srcDir, $dstDir);
```

A file aa.md containing the following:

```md
Nullos aliases
==================
2016-11-30



Here is <-another link->.

And here <-another again->...
```

will be converted to this (in the destination directory):


```md
Nullos aliases
==================
2016-11-30



Here is [another link].

And here [another again]...
```



Using the TrackingMapRegexTransformer
----------------------


Using the following code:

```php
<?php


use DirTransformer\Scanner\Scanner;
use DirTransformer\Transformer\TrackingMapRegexTransformer;

require "bigbang.php";


$srcDir = "/pathto/php/projects/nullos-admin/doc";
$dstDir = "/pathto/php/projects/nullos-admin/doc2";


$t = TrackingMapRegexTransformer::create()
    ->regex('!<-(.*)->!')
    ->map([
        'another link' => 'http://mydoc.com/another-link.md',
    ])
    ->onFound(function ($match, $value) {
        return '[' . $match . '](' . $value . ')';
    });
Scanner::create()
    ->allowedExtensions(['md'])
    ->limit(1)
    ->addTransformer($t)
    ->copy($srcDir, $dstDir);


a($t->getFoundList());
a($t->getUnfoundList());
```

A file aa.md containing the following:

```md
Nullos aliases
==================
2016-11-30



Here is <-another link->.

And here <-another again->...
```

will be converted to this (in the destination directory):


```md
Nullos aliases
==================
2016-11-30



Here is [another link](http://mydoc.com/another-link.md).

And here <-another again->...
```

And the output of the script will display the following dump:

```html
array(1) {
  ["/pathto/php/projects/nullos-admin/doc/bonus/aa.md"] => array(1) {
    [0] => array(4) {
      [0] => string(16) "<-another link->"
      [1] => string(12) "another link"
      [2] => string(32) "http://mydoc.com/another-link.md"
      [3] => string(48) "[another link](http://mydoc.com/another-link.md)"
    }
  }
}

array(1) {
  ["/pathto/php/projects/nullos-admin/doc/bonus/aa.md"] => array(1) {
    [0] => array(2) {
      [0] => string(17) "<-another again->"
      [1] => string(13) "another again"
    }
  }
}

```





Dependencies
------------------

- [Bat 1.33](https://github.com/lingtalfi/Bat)




History Log
------------------
    
- 1.1.0 -- 2016-12-04

    - added TrackingMapRegexTransformer
    - fix bug in RegexTransformer
    
- 1.0.0 -- 2016-12-04

    - initial commit
    
    
    
    