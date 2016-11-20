BabyDash
=============
2015-12-19


BabyDash is a notation to write an array in a language independent manner.


BabyDash can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).


Examples
-------------- 


### The simplest example possible


```php
<?php


use BabyDash\BabyDashTool;

require_once "bigbang.php";

$s = <<<EEE
- apple
- banana
- cherry
EEE;

a(BabyDashTool::parse($s));  // [apple, banana, cherry]
```



### The complex example 

This example demonstrates how belongliness can be created with indentation, and how special values are treated/casted.


```php
<?php


use BabyDash\BabyDashTool;

require_once "bigbang.php";



$s = <<<EEE
- hi
- hay:no
- hay2: no
- "my:key": The value is raw: it can contain colon too
- ho:
----- bloom
----- doom:
--------- game
--------- word
--------- 78
--------- 78.4
--------- true
--------- 10: false
--------- 
--------- # this is also empty string
--------- null
----- zoom
- hue
- snif: # this is a comment
- snaf: This # is not a comment

EEE;

a(BabyDashTool::parse($s));
```

The result of the above code is the following array:

```php
array (size=8)
  0 => string 'hi' (length=2)
  'hay' => string 'no' (length=2)
  'hay2' => string 'no' (length=2)
  'my:key' => string 'The value is raw: it can contain colon too' (length=42)
  'ho' => 
    array (size=3)
      0 => string 'bloom' (length=5)
      'doom' => 
        array (size=9)
          0 => string 'game' (length=4)
          1 => string 'word' (length=4)
          2 => int 78
          3 => float 78.4
          4 => boolean true
          10 => boolean false
          11 => string '' (length=0)
          12 => string '' (length=0)
          13 => null
      1 => string 'zoom' (length=4)
  1 => string 'hue' (length=3)
  'snif' => string '' (length=0)
  'snaf' => string 'This # is not a comment' (length=23)

```




More about the baby dash notation
--------------------------------------

You always start with a leading dash.
To create a new array level, you must first write a key, then write the other lines below it.
The number of leading dashes is given with the formulae:
 
```
numberOfDashes = 1 + level * 4
```

With 0 being the root level.

A key is recognized as such only if it ends with a colon char (:).

You can also write the key and the value on the same line, like this:

```
- key: value
```

The value is casted by default to the following types: int, float, true, false, null.



If you need to write a literal colon in the key, you need to protect it using quotes (you can use either single quotes or double quotes).

For instance:

```
- "my:key": The value can contain the colon char (:), it doesn't matter
```


By default, baby dash notation use quoting for the key, but not the value: the value is raw, which is the desired behaviour
for some other tools.


The BabyDashTool tool let you use quotable values by turning on the acceptQuotableValue flag (since 1.1.0) though.
If you use this option, then the resulting value is always a string (it is not casted).
In other words, it is either casted, or quoted.





Dependencies
------------------

- [lingtalfi/IndentedLines 1.1.0](https://github.com/lingtalfi/IndentedLines)




History Log
------------------
    
- 1.1.8 -- 2016-01-11

    - fix bug, quoted value always return a string
    
- 1.1.0 -- 2015-12-19

    - add acceptedQuotableValue parameter to BabyDashTool::parse method
    
- 1.0.0 -- 2015-12-19

    - initial commit
    
    

