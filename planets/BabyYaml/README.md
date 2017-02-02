BabyYaml
============
2016-12-28


php implementation of a babyYaml reader.


BabyYaml is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



Is BabyYaml same as Yaml?
===========================

Baby yaml is not yaml: it's a subset of yaml.

[Yaml](http://yaml.org/) has a tons of features, while babyyaml only cares about storing simple 
configuration values for a website.


In other words, baby yaml is easier than yaml.



How to use?
==============

There is only one class to use: BabyYamlUtil.
 
 

```php
<?php

use BabyYaml\BabyYamlUtil;

require_once "bigbang.php";


$f = __DIR__ . "/test.yml";
a(BabyYamlUtil::readFile($f)); // will display the array corresponding to the test.yml file
```

All other classes are private and their code might be modified at any moment so don't rely on them.



So what is the BabyYaml syntax?
=================================

I swear to god I knew you would ask that question.


So basically, a baby yaml file represents an array.




To write an entry, you must start with the dashes at the beginning of the lines (I will assume you know the basics of yaml).

```yaml
- doo 
- foo
```

Will result in:

```php
<?php


$defs = [
    'doo',
    'foo',
];
```

Note: all the examples I'm giving here are tested, look inside the btests directory
of this repository.


If you want you can stick the value to the dash it doesn't matter:

```yaml
-doo 
- foo
```

Will also result in:

```php
<?php


$defs = [
    'doo',
    'foo',
];
```


Keys
--------


Using dashes is useful to add values to the array.
But sometimes you want to control the key as well.

In that case, just drop the leading dash, and separate the
key and the value with a colon char.

```yaml
doo: soo
- foo
```


```php
<?php


$defs = [
    'doo' => 'soo',
    'foo',
];
```


You can quote your keys if you want.
This is mainly useful if your key contains the colon character. 


```yaml
"do:o": soo
- foo
```


```php
<?php


$defs = [
    'do:o' => 'soo',
    'foo',
];
```


Note: you can quote a key using the double quotes or the single quotes.


Nesting arrays
-----------------

To create an array inside another, instead of typing the value,
type a newline and indent it with 4 spaces.


```yaml
doo:
    one: 1
    - two
    three:
        poo: zoo
-
    - doo
    - foo
```


The above example is equivalent to:

```php
<?php


$defs = [
    'doo' => [
        'one' => 1,
        'two',
        'three' => [
            'poo' => 'zoo',
        ],
    ],
    [
        'doo',
        'foo',
    ],
];
```


Values
----------------

You can use spaces in the values, don't need to escape.

```yaml
doo: no worries
```

Corresponds to the following:

```php
<?php


$defs = [
    'doo' => 'no worries',
];
```


The only rule is actually: if you start with a quote, then you must end with the same quote (i.e. you have to finish the quoted string).


```yaml
doo: You don't need quotes, generally
but: "true"
that: "quotes can escape otherwise special values like null, true, ..."

```


```php
<?php


$defs = [
    'doo' => "You don't need quotes, generally",
    'but' => 'true',
    'that' => 'quotes can escape otherwise special values like null, true, ...',
];
```



Special Values and types
-----------------

Here are the special values and types used by babyYaml.


```yaml
doo: null
but:
true: true
false: false
int: 64
float: 6.4

```


```php
<?php


$defs = [
    'doo' => null,
    'but' => '',
    'true' => true,
    'false' => false,
    'int' => 64,
    'float' => 6.4,
];
```



Sequences and mappings
------------------------

You can also write arrays inline (on one line).

In that case we differentiate two types of arrays:

- those indexed numerically, called sequences
- those indexed associatively, called mappings

A sequence is a set of values wrapped with the square brackets.

A mapping is a set of key/value pairs wrapped with the curly brackets.

Both types can be mixed on the same line.

This notation is useful for small list.


```yaml
doo: [oi, foo]
map: {one: 1, two: 2}
nomap: {one1, two2}
recur: [a, b, {one: 1, "two": two, three: [again, again]}, c, [1, 2]]
```

Will be equivalent to:

```php
<?php


$defs = [
    'doo' => ['oi', 'foo'],
    'map' => [
        'one' => 1,
        'two' => 2
    ],
    'nomap' => '{one1, two2}',
    'recur' => [
        'a',
        'b',
        [
            'one' => 1,
            'two' => 'two',
            'three' => [
                "again",
                "again",
            ],
        ],
        'c',
        [1, 2]
    ],
];
```




Multiline
-------------

BabyYaml has its own multiline system.
You start the value with the opening angular bracket, and start 
your message on the next line.

When you are done, go to the next line and close the angular bracket.


```yaml
doo: null
roo: <
this is a multiline
this is a multiline
>
joo: eee


```

Is equivalent to:

```php
<?php


$defs = [
    'doo' => null,
    'roo' =>
        'this is a multiline' . PHP_EOL .
        'this is a multiline'
    ,
    'joo' => 'eee',
];
```




Comments
--------------

Comments start with the has symbol.

Comments can be written on their own line, or at the end of a value 
 
 
```yaml
# this is a comment
doo: null
but: # this is not a comment
true: true
false: "ji # not a comment"
dup: ji # is a comment
arr: [soo] # this is a comment


```
 

```php
<?php


$defs = [
    'doo' => null,
    'but' => '',
    'true' => true,
    'false' => "ji # not a comment",
    'dup' => "ji",
    'arr' => ['soo'],
];
```






The story nobody cares about except my ego
============================== 

I hate this implementation because it has so much classes.

It's an old implementation "stolen/quickly adapted" from my older framework [bee](https://github.com/lingtalfi/bee/tree/master/bee/modules/Bee/Notation/File/BabyYaml).

I wouldn't say that most of those classes are useless, and if I had to redo it, I would do all in one file,
as it was in my first implementation (that I obviously deleted somehow).

BUT, for now it does the job, and it's mine (=I will have less problems to extend it than someone else's code), 
so that's two reasons for me to use it.

If you are reading this, don't ever rely on the existing code, except for the BabyYamlUtil class,
which I won't change (but all the rest I might get rid off maybe one day...).




Dependencies
=================

- [Bat 1.38](https://github.com/lingtalfi/Bat)








History Log
===============
    
- 1.0.0 -- 2016-12-28

    - initial commit