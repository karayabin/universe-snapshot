Dash2Array
==============
2017-06-21



Convert a dash tree to an array.





This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Dash2Array
```

Or just download it and place it where you want otherwise.




How does it work?
==================

Have you ever wanted to convert a dash tree like this:

```php
- home
-- about-us
-- products
---- product1
---- product2
-- contact
```

To a regular php array?


If so, then this class might help you, just use the following examples and play with the options:



```php
$f = '/category.txt';

$a = Dash2ArrayTool::parseFile($f, [
    'leavesAsArray' => false, // default=true
    'increment' => 2, // default=2
]);
a($a);
```








History Log
------------------

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2017-04-04

    - initial commit