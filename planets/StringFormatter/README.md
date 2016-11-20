StringFormatterTool
=====================
2015-12-11


Tool to format string.


This tool was originally designed to format log messages.
In other words, to be able to put any type of variables (typically arrays and exceptions) into a string.


StringFormatterTool can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).



How to use?
--------------

Just write your message as usual, and if you need to put a non string variable into your message,
use a tag.



### Example


```php
<?php


use StringFormatter\StringFormatterTool;

require_once "bigbang.php"; // start the local universe

$e = new \Exception("ooo");
$data = [
    "false" => false,
    "doom" => 789,
    "hash" => $e,
];
$fruit = "apple";
echo nl2br(StringFormatterTool::format("An exception occurred:\n {e},\n\nthe array was {a},\n\nthe fruit was {fruit}", [
    '{e}' => $e,
    '{a}' => $data,
    '{fruit}' => $fruit,
]));
```

The above example's output will look like this:

```html
An exception occurred:
exception 'Exception' with message 'ooo' in /Volumes/Macintosh HD 2/it/php/projects/universe/www/sandbox-pretest.php:8
Stack trace:
#0 {main},

the array was [
'false' => false,
'doom' => integer(789),
'hash' => object(Exception),
],

the fruit was apple
```






How to change the default formatting
------------------------------------------------

By default, the StringFormatterTool strives to make arrays and objects as concise as possible.
You can override the default functions by using the setArrayToStringCallable and setOtherToStringCallable methods.







Api
------


### format

Return a string with tags replaced.

```php
string      format ( str:format,  array:tags=[] )
```

### setArrayToStringCallable 

The closure takes an array as its sole argument and should return a string. 

```php
void      setArrayToStringCallable ( closure:f )
```


### setOtherToStringCallable 

The closure takes a mixed value as its sole argument and should return a string. 
The input mixed value is:

- not an array
- not a string
- not a numeric
- not an object with the __toString method


```php
void      setOtherToStringCallable ( closure:f )
```

















Dependencies
------------------

- [lingtalfi/ArrayToString 1.0.0](https://github.com/lingtalfi/ArrayToString)
- [lingtalfi/VariableToString 1.1.0](https://github.com/lingtalfi/VariableToString)



History Log
------------------
    
- 1.0.0 -- 2015-12-11

    - initial commit
    
    