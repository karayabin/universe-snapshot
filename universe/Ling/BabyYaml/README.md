BabyYaml
============
2016-12-28 -> 2021-03-05


php implementation of a babyYaml reader.



BabyYaml is part of the [universe framework](https://github.com/karayabin/universe-snapshot).






Install
=============


Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.BabyYaml
```

Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import Ling/BabyYaml
```





Summary
============
2016-12-28 -> 2020-07-16


- [Is BabyYaml same as Yaml?](#is-babyyaml-same-as-yaml)
- [How to use?](#how-to-use)
- [BabyYaml syntax example](#babyyaml-syntax-example)
- [So what is the BabyYaml syntax?](#so-what-is-the-babyyaml-syntax)
    - [Keys](#Keys)
    - [Nesting arrays](#nesting-arrays)
    - [Values](#values)
    - [Special Values and types](#special-values-and-types)
    - [Sequences and mappings](#sequences-and-mappings)
    - [Multiline](#multiline)
    - [Comments](#comments)

- [Note](#note)
- Pages
    - [node-info-parser.md](https://github.com/lingtalfi/BabyYaml/blob/master/personal/mydoc/pages/node-info-parser.md)
- [History Log](#history-log)





Is BabyYaml same as Yaml?
===========================
2016-12-28


Baby yaml is not yaml: it's a subset of yaml.

[Yaml](http://yaml.org/) has a tons of features, while babyyaml only cares about storing simple 
configuration values for a website.


In other words, baby yaml is easier than yaml.



How to use?
==============
2016-12-28

There is only one class to use: BabyYamlUtil.

You can use it to read a babyYaml file, or write an array as BabyYaml.
 
 
Below is an example of how to read a babyYaml file.


```php
<?php

use Ling\BabyYaml\BabyYamlUtil;

require_once "bigbang.php";


$f = __DIR__ . "/test.yml";
a(BabyYamlUtil::readFile($f)); // will display the array corresponding to the test.yml file
```

And here is an example of how to write an array to a file:


```php

$array = ["test" => 67, "colors" => ["blue", "green"]];
$destFile = "/komin/jin_site_demo/tmp/test-output.byml";
BabyYamlUtil::writeFile($array, $destFile); // writing the array to the $destFile


```





BabyYaml syntax example
==============================
2016-12-28


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
        version: 1.2.0 # nah, that's just a string
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
    multiline2: <
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
bla4: blabla# this is not a comment because the sharp symbol doesn't have a preceding space
arrxx: [soo] # this is also a comment

```


Will give the following php array:

```php
array(19) {
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
    ["specialValues"] => array(8) {
      ["true"] => bool(true)
      ["false"] => bool(false)
      ["null"] => NULL
      ["int"] => int(64)
      ["float"] => float(6.4)
      ["version"] => string(5) "1.2.0"
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
    ["multiline2"] => string(71) "Multiline always has the same indent as its key.
As you can see here..."
  }
  ["comments"] => NULL
  ["emptyStringAgain"] => string(0) ""
  ["bla2"] => string(30) "this # is not a comment either"
  ["bla2'"] => string(30) "this # is not a comment either"
  ["bla"2'"] => string(30) "this # is not a comment either"
  ["bla3"] => string(6) "blabla"
  ["bla4"] => string(85) "blabla# this is not a comment because the sharp symbol doesn't have a preceding space"
  ["arrxx"] => array(1) {
    [0] => string(3) "soo"
  }
}

```





So what is the BabyYaml syntax?
=================================
2016-12-28


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
2016-12-28


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
2016-12-28


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
2016-12-28



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
2016-12-28 -> 2020-07-17



Here are the special values and types used by babyYaml.


```yaml
doo: null
true: true
false: false
int: 64
float: 6.4

```


```php
<?php


$defs = [
    'doo' => null,
    'true' => true,
    'false' => false,
    'int' => 64,
    'float' => 6.4,
];
```


Don't use the empty value like below, with the **mo** key):

```yaml
mo: 
mo2: some value
```

Although technically it might return an empty string, always use an explicit empty string
instead, like this:


```yaml
mo: "" 
mo2: some value
```

That's because the empty syntax is not fully supported by all the BabyYaml tools, namely
if you try to write a file back, a comment attached to an empty value is currently ignored (i.e. you will loose it).

Plus, semantically, it's confusing to have an empty value, so I have no plan to make it work, instead the
empty value is not a feature, it's an accidental side effect, and you should never use it.

 









Sequences and mappings
------------------------
2016-12-28


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
2016-12-28


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
2016-12-28 -> 2020-07-16


Comments start with the hash symbol (#).

Comments can be written on their own line, or at the end of a value.

If a comment is written at the end of a value, the hash symbol (#) must be preceded by a space.  
 
This yaml file:

 
```yaml
# this is a comment
doo: null
but: # this is a comment
true: true
false: "ji # not a comment"
dup: ji # is a comment
arr: [soo] # this is a comment
glued: this is#not a comment, because no space preceding the hash symbol


```

Converted to a php array would look like this: 

```php
<?php


$defs = [
    'doo' => null,
    'but' => '',
    'true' => true,
    'false' => "ji # not a comment",
    'dup' => "ji",
    'arr' => ['soo'],
    'glued' => "this is#not a comment",
];
```









Note
============
2016-12-28


It's an old implementation "stolen/quickly adapted" from my older framework [bee](https://github.com/lingtalfi/bee/tree/master/bee/modules/Bee/Notation/File/BabyYaml).
The implementation is messy and without too much documentation, but it works.








History Log
===============
   

- 1.7.8 -- 2021-03-05

    - update README.md, add install alternative

- 1.7.7 -- 2021-02-05
  
    - add BabyYamlUtil::updateProperty method

- 1.7.6 -- 2021-02-01
  
    - fix deprecation warning in php8
  
- 1.7.5 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.7.4 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.7.3 -- 2020-07-17

    - add comments option to BabyYamlUtil::writeFile, fix some bugs (test commit)
    
- 1.6.1 -- 2020-07-17

    - fake commit to test uni2 potential problem when uploading BabyYaml
    
- 1.6.0 -- 2020-07-17

    - add nodeInfo map system
    
- 1.5.1 -- 2020-07-16

    - fix doc links  
    
- 1.5.0 -- 2020-07-16

    - fix comment symbol not working properly when placed after multiline comment opening/closing symbols  
    - add tools for comments  
    
- 1.4.1 -- 2019-11-20

    - fix BabyYamlWriterValueAdaptor->getValue not handling properly strings with whitespace at the beginning or end   
    
- 1.4.0 -- 2019-08-27

    - add BabyYamlUtil::parseCsv method 
    
- 1.3.5 -- 2019-05-10

    - fix BabyYamlBuilder not handling nested multiline comments properly 
    
- 1.3.4 -- 2019-05-10

    - fix BabyYamlWriter wrong indent for multiline ending caret 
    
- 1.3.3 -- 2019-05-03

    - fix BabyYamlWriterValueAdaptor not protecting comments with double quotes
    
- 1.3.2 -- 2019-05-02

    - fix BabyYamlUtil::readFile interpreting the value of a multiline
    
- 1.3.1 -- 2019-04-03

    - fix FunctionExpressionDiscoverer declaration problem
    
- 1.3.0 -- 2019-04-03

    - update BabyYamlUtil::writeFile now returns bool
    
- 1.2.2 -- 2019-04-02

    - fix InlineArgsArrayExportUtilSymbolsManager not found

- 1.2.1 -- 2019-03-19

    - downgrade BabyYamlUtil::writeFile method, removing void return type (php7.1) so that it's compliant with php 7.0

- 1.2.0 -- 2019-02-27

    - add BabyYamlUtil::readBabyYamlString method
    
- 1.1.1 -- 2019-02-27

    - fix BabyYamlUtil::writeFile not escaping key with colon
    - update BabyYamlUtil::writeFile now tries to display numeric keys with the dash 
    
- 1.1.0 -- 2019-02-27

    - Add BabyYamlUtil::writeFile and getBabyYamlString methods
    
- 1.0.0 -- 2016-12-28

    - initial commit