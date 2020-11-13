Parenthesis mirror parser, conception notes
===========
2020-10-05



This is a simple parser utility which can replace stuff inside your strings.


The stuff to replace must be wrapped into a special notation called the **parenthesis wrapper**.

It's then replaced by the result of a **converter** function, which you define.



The **parenthesis wrapper** is composed of two parts: the beginning and the end.

By default, they are the following:

- beginning: pmp(
- end: )pmp


So for instance, you can pass a string like this:


- Hello pmp(firstName)pmp


Our parser will detect the **parenthesis wrapper**, and pass its content (i.e. firstName in this example)
to the **converter** function. Let's say that the converter function returns the number 5 for instance.

Then our parser will return the following string:

- Hello 5



You can have more than one **parenthesis wrapper** in the same string, each will be treated separately.

So for instance, this string can be parsed as expected:


- Hello pmp(firstName)pmp, is your name really pmp(firstName)pmp?


Will turn into: 

- Hello 5, is your name really 5?


The **converter** function can return non-scalar values, such as an array for instance.

However, this only makes sense if the **parenthesis wrapper** is a standalone value, and not part of a bigger string.


So, array conversion will work in this case:

- pmp(firstName)pmp

However, it will fail in this case  

- Hello pmp(firstName)pmp


That's because you can't insert an array into a string.



Custom parenthesis wrapper
-----------
2020-10-05


It's possible to customize some parts of the **parenthesis wrapper**.

A **parenthesis wrapper** is composed of two parts (beginning and end), which have the following structure:

The beginning:

- the **identifier**
- an opening parenthesis

The end:
- a closing parenthesis
- the reversed **identifier** (i.e. the identifier on which the php [strrev](https://www.php.net/manual/en/function.strrev.php) function was applied)


You can change the **identifier** to your likings, the default being "pmp", but it must contain only alpha-numerical characters (i.e. a-Z0-9).



So for instance, if you change the **identifier** to "rf", then the parser can parse things like:

- Hello rf(firstName)fr



The converter
--------
2020-10-05



By default, the converter will return the string wrapped by the **parenthesis wrapper** as is.

You can set your own converter, it's a callable which receives one argument: the string wrapped by the **parenthesis wrapper**,
and returns the value to replace it with.

The value can be anything, string, booleans, even arrays and/or objects when the context permits it.





Nesting parenthesis wrappers
---------
2020-10-05


As for now, it's not possible to nest **parenthesis wrapper**.
Instead, we suggest using one parser per nesting level, each parser with its own identifier(s).



Example
--------
2020-10-05



```php

<?php


use Ling\ParenthesisMirrorParser\ParenthesisMirrorParser;

require_once __DIR__ . "/init.inc.php";


$arr = [
    'boat' => 123,
    'fruit' => 'rf(array)fr',
    'machine' => [
        'gun' => 'rf(maurice)fr',
    ],
];


$pmp = new ParenthesisMirrorParser();
$pmp->setIdentifier("rf");
$pmp->setConverter(function (string $s) {
    if ('array' === $s) {
        return [1, 2, 3];
    }
    return "s: " . $s;
});

az($pmp->parseArray($arr));

/**
 * Output:
 * array(3) {
 * ["boat"] => string(3) "123"
 * ["fruit"] => array(3) {
 * [0] => int(1)
 * [1] => int(2)
 * [2] => int(3)
 * }
 * ["machine"] => array(1) {
 * ["gun"] => string(10) "s: maurice"
 * }
 * }
 */




```

