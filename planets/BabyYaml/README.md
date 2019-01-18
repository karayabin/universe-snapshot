BabyYaml
============
2016-12-28


php implementation of a babyYaml reader.



BabyYaml is part of the [universe framework](https://github.com/karayabin/universe-snapshot).






Install
=============


Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import BabyYaml
```







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



BabyYaml syntax example
==============================
The following babyYaml code:

```yaml
- doo
- foo
-moo
key: value
key2: value2
"key:2": another value2
arr:
    one: 1
    - two
    three:
        poo: zoo
-
    doo: you don't need quotes, generally
    specialValues:
        true: true
        false: false
        null: null
        int: 64
        float: 6.4
        string: "6.4"
        emptyString: ""
    trueAsString: "true"
    trueAsString2: 'true'
inlineNotations:
    sequences: [one, two]
    map: {one: 1, two: 2}
    nomap: {one1, two2}
    recur: [a, b, {one: 1, "two": two, three: [again, again]}, c, [1,2]]
multiline: <
This is a multiline firstline
This is a multiline secondline
>
anotherNested:
    - multiline2: <
    Multiline always has the same indent as its key.
    As you can see here...
    >
# this is a comment
comments: null
emptyStringAgain: # this is not a comment
bla2: "this # is not a comment either"
bla2': 'this # is not a comment either'
bla"2': 'this # is not a comment either'
bla3: blabla # this is a comment
arrxx: [soo] # this is also a comment

```


Will give the following php array:

```php
array(18) {
  [0] => string(3) "doo"
  [1] => string(3) "foo"
  [2] => string(3) "moo"
  ["key"] => string(5) "value"
  ["key2"] => string(6) "value2"
  ["key:2"] => string(14) "another value2"
  ["arr"] => array(3) {
    ["one"] => int(1)
    [0] => string(3) "two"
    ["three"] => array(1) {
      ["poo"] => string(3) "zoo"
    }
  }
  [3] => array(4) {
    ["doo"] => string(32) "you don't need quotes, generally"
    ["specialValues"] => array(7) {
      ["true"] => bool(true)
      ["false"] => bool(false)
      ["null"] => NULL
      ["int"] => int(64)
      ["float"] => float(6.4)
      ["string"] => string(3) "6.4"
      ["emptyString"] => string(0) ""
    }
    ["trueAsString"] => string(4) "true"
    ["trueAsString2"] => string(4) "true"
  }
  ["inlineNotations"] => array(4) {
    ["sequences"] => array(2) {
      [0] => string(3) "one"
      [1] => string(3) "two"
    }
    ["map"] => array(2) {
      ["one"] => int(1)
      ["two"] => int(2)
    }
    ["nomap"] => string(12) "{one1, two2}"
    ["recur"] => array(5) {
      [0] => string(1) "a"
      [1] => string(1) "b"
      [2] => array(3) {
        ["one"] => int(1)
        ["two"] => string(3) "two"
        ["three"] => array(2) {
          [0] => string(5) "again"
          [1] => string(5) "again"
        }
      }
      [3] => string(1) "c"
      [4] => array(2) {
        [0] => int(1)
        [1] => int(2)
      }
    }
  }
  ["multiline"] => string(60) "This is a multiline firstline
This is a multiline secondline"
  ["anotherNested"] => array(1) {
    [0] => string(71) "Multiline always has the same indent as its key.
As you can see here..."
  }
  ["comments"] => NULL
  ["emptyStringAgain"] => string(0) ""
  ["bla2"] => string(30) "this # is not a comment either"
  ["bla2'"] => string(30) "this # is not a comment either"
  ["bla"2'"] => string(30) "this # is not a comment either"
  ["bla3"] => string(6) "blabla"
  ["arrxx"] => array(1) {
    [0] => string(3) "soo"
  }
}

```





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